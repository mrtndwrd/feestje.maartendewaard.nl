<!-- Jitsi integratie -->
<script src='https://talk.greenhost.net/external_api.js'></script>
<script type="text/javascript">
api = new JitsiMeetExternalAPI("talk.greenhost.net", {
    'roomName': 'MaartenEnErikaWoonkamer'
})
console.log(api);
console.log(api.getNumberOfParticipants());
users = api['participants']
console.log(users)
api.executeCommand('hangup');
</script>

