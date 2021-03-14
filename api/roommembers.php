<?php
require('credentials.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $sql = "SELECT * FROM bbnc_room_members";
// $result = mysqli_query($conn, $sql);
// 
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["id"]. " - room : " . $row["room"]. " - members: " . $row["members"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
// 

// For testing:
// $_GET = ['function' => 'getmembers', 'room' => 'woonkamer'];
// $_GET = ['function' => 'setmembers', 'room' => 'woonkamer'];
// $_GET = ['function' => 'getrooms', 'room' => 'woonkamer'];

if ($_GET['function'] == 'getmembers') {
    $room = $_GET['room'];
    getMembers($conn, $room);
} elseif ($_GET['function'] == 'setmembers') {
    $room = $_GET['room'];
    $request_body = file_get_contents('php://input');

    // Uncomment this for testing:
    // $request_body = '{"members":{"ac3d9f4a":{"displayName":"erika","formattedDisplayName":"erika (me)"}}}';
    $data = json_decode($request_body);
    setMembers($conn, $room, $data->members);
} elseif ($_GET['function'] == 'getrooms') {
    getRooms($conn);
} else {
    echo "Function not known";
}

function setMembers($conn, $room, $members) {
    $room = mysqli_real_escape_string($conn, strtolower($room));

    $safe_members = [];
    foreach ($members as $memberHash => $memberData) {
        if (isset($memberData->displayName))
            $safe_members[] = $memberData->displayName;
        else 
            $safe_members[] = $memberHash;
        var_dump($safe_members);
    }
    $safe_members =  preg_replace('/[^a-zA-Z\d\s:]/', '', $safe_members);
    $safe_members = json_encode($safe_members);
    if (count($safe_members) > 0) {
        $query = "UPDATE bbnc_room_members SET members = '$safe_members' WHERE room = '$room'";
        if (mysqli_query($conn, $query)) {
            echo "success";
        } else {
            echo "setMembers failed";
        }
    } else {
        echo "not emptying room";
    }
}

function getMembers($conn, $room) {
    $room = mysqli_real_escape_string($conn, strtolower($room));
    $query = "SELECT members FROM bbnc_room_members WHERE room = '$room'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // output first data row
        $row = mysqli_fetch_assoc($result);
        echo $row['members'];
    } else {
        echo "['SOMETHING WENT WRONG']";
    }
}

function getRooms($conn) {
    cleanRooms($conn);
    $query = "SELECT room FROM bbnc_room_members";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // output first data row
        while ($row = mysqli_fetch_assoc($result)) {
            $rooms[] = $row['room'];
        }
        echo json_encode($rooms);
    } else {
        echo "['SOMETHING WENT WRONG']";
    }

}

function cleanRooms($conn) {
    $query = 'UPDATE `bbnc_room_members` SET members = "[]" WHERE updated < NOW() - INTERVAL 20 SECOND AND members != "[]"';
    mysqli_query($conn, $query);
}

mysqli_close($conn);
