<?php
	/*
	 * My-Page
	 * By: Louis <louis@ne02ptzero.me>
	*/

	/* PHP CODE */

		/* Includes */
			include "./twitter-api-php/TwitterAPIExchange.php";

		/* Settings */
			/* Set your value here ! */
				$oauth_access_token = "";
				$oauth_access_token_secret = "";
				$consumer_key = "";
				$consumer_secret = "";
				$username = "";
				$github_user = "";
				$mail = "";

			$settings = array(
				'oauth_access_token' => $oauth_access_token,
				'oauth_access_token_secret' => $oauth_access_token_secret,
				'consumer_key' => $consumer_key,
				'consumer_secret' => $consumer_secret
			);

			$url = 'https://api.twitter.com/1.1/account/verify_credentials.json';
			$getfield = '?username='.$username."&screen=big";
			$requestMethod = 'GET';
			$twitter = new TwitterAPIExchange($settings);
			$result = $twitter->setGetfield($getfield)
						->buildOauth($url, $requestMethod)
						->performRequest();
			$result = json_decode($result, true);
			$result["profile_image_url"] = str_replace("_normal", "", $result["profile_image_url"]);
	/* HTML CODE */
?>
<html>
	<head>
			<title><?php echo $result["name"] ?></title>
			 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,900' rel='stylesheet' type='text/css'>
			 <link href="style.css" rel='stylesheet' type='text/css'>
			 <link href='http://fonts.googleapis.com/css?family=Playfair+Display:900' rel='stylesheet' type='text/css'>
			 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
			 <meta charset="utf8">
	</head>
	<body>
		<div class='page'>
			<img src="<?php echo $result["profile_image_url"] ?>">
			<h1><?php echo $result["name"] ?></h1>
			<p><?php echo $result["description"] ?></p>
			<ul class='infos'>
				<li>
					<i class='fa fa-plane'></i><?php echo $result["location"] ?>
				</li>
				<li>
					<i class='fa fa-at'></i><?php echo $mail ?>
				</li>
			</ul>
			<a href="http://github.com/<?php echo $github_user?>"><button>GITHUB</button></a>
			<a href="http://twitter.com/<?php echo $username ?>"><button>TWITTER</button></a>
			<div class='last_tweet'>
				<i class='fa fa-quote-left'></i>
				<?php echo $result["status"]["text"] ?>
				<i class='fa fa-quote-right'></i>
			</div>
		</div>
	</body>
</html>
