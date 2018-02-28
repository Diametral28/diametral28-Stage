<?php 

/* Spotify Application Client ID and Secret Key */
$client_id     = 'a3366203ba294ef986732ad5431e56fa'; 
$client_secret = '4a054805a19b40f59c4d115aa08308ba'; 

/* Get Spotify Authorization Token */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

$result=curl_exec($ch);
$json = json_decode($result, true);

/* Get Spotify Artist Photo */
echo "<pre>";
exec('curl -i "https://api.spotify.com/v1/search?q=Maycon+%26+Vinicius+&limit=1&type=artist" -H "Accept: application/json" -H "Authorization: Bearer '.$json['access_token'].'" -H "Content-Type: application/json" 2>&1', $pp);
echo implode("\r\n", $pp);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<iframe src="https://open.spotify.com/embed/user/ivanvillavaz/playlist/2vJC9Jn7LPUGrrTZUFBGku" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
</body>
</html>