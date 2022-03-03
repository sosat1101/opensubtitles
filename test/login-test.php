<?php

include '../LoginOpenSubtitles.php';

$username = 'pipilu';
$password = 'dfcmbb977';
$apiKey = 'bCZDNxfGMhcVBtr5fAo7sqj9nmasEHLi';
$loginOpenSubtitles1 = new LoginOpenSubtitles($username, $password);

var_dump($loginOpenSubtitles1->getResult());





