<?php

include '../LoginOpenSubtitles.class.php';

$username = 'pipilu';
$password = 'dfcmbb977';
$apiKey = 'bCZDNxfGMhcVBtr5fAo7sqj9nmasEHLi';
$loginOpenSubtitles1 = new LoginOpenSubtitles($username, $password);

$loginOpenSubtitles1->getResult();
var_dump($loginOpenSubtitles1->getAccessToken());





