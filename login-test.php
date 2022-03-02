<?php

include 'LoginOpenSubtitles.php';

$username = 'pipilu';
$password = 'dfcmbb977';
$apiKey = 'bCZDNxfGMhcVBtr5fAo7sqj9nmasEHLi';
$loginOpenSubtitles1 = new LoginOpenSubtitles($username, $password, $apiKey);



   $a1 =  $loginOpenSubtitles1->getLoginResult()->getAccessToken();
   var_dump($a1);



//try {
//    $accessToken1 = ($loginOpenSubtitles1->getLoginResult()->getAccessToken());
//    var_dump($accessToken1);



//    $loginOpenSubtitles2 = new LoginOpenSubtitles('pipilu', 'dfcmbb977');
//    $loginOpenSubtitles2

