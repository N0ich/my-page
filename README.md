My Page
=======

A person page generator, with twitter API

![Screenshot](http://s29.postimg.org/g9ssufsx3/my_page.png "Dat Co dude")

This project is proudly inspired by [this one](https://github.com/jlord/person-page)

All the flowers goes to [Jessica Lord](https://github.com/jlord) :)

## Requirements
php5-curl
Debian systems
```sh
sudo apt-get install php5-curl
```

This project used the Twitter API in PHP, see more [here](https://github.com/J7mbo/twitter-api-php.git)

## Installation
```sh
git clone http://github.com/ne02ptzero/my-page.git my/awesome/directory
```

## Configuration

You have to make an app in twitter for API credentials

Follow [these](http://stackoverflow.com/a/15314662) instructions.

Now, you can configure the php :
(generate.php:14)
```php
$oauth_access_token = ""; // Access Token
$oauth_access_token_secret = ""; // Access token secret
$consumer_key = ""; // API key
$consumer_secret = ""; // API key Secret
$username = ""; // Twitter Username
$github_user = ""; // Github username
$mail = ""; // Your email
```
And... that's it.

Now, there is a problem:

Twitter API limit request in an hour, so at a point, the page generate.php shall not work temporarly.

See more [here](https://dev.twitter.com/rest/public/rate-limiting)

So, you have to do this:
```sh
php generate.php > my-page.html
```

If you have a server with ssh, why not a cron for this ?
```
5 * * * * php generate.php > my-page.html
```

## Style

The style is in style.css, feel free to change it !
