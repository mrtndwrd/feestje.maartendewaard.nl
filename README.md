## Setting up the site

To set up this site you will need 

- A webserver that serves the static HTML pages as well as the PHP-based "API"
- A MySQL database

The API is responsible for keeping a list of who is in which room. The code for
it lives in `/api/roommembers.php` and it saves data into a MySQL database.
You'll need to set up a database table as described in
`api/bbnc_room_members.sql`. Copy `/api/credentials.php.example` to
`api/credentials.php` and enter your database credentials.

The other thing you need to do is to change the `url:` in `_config.yml` to the
place where you want to serve the website.

## Building the site

Once you have done this, build the site by running:

```
$ bundle install
$ bundle exec jekyll build
```

This generates the static site and inserts it in the `_site` folder.

## Deploying

Assuming you have some kind of [managed
webhosting](https://greenhost.net/products/hosting/) you only need to copy the
files in `_site` to your webhosting provider and configure your server to be
able to serve it.
