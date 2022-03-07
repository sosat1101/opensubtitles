<?php

include '../LoginOpenSubtitles.php';

$username = 'pipilu';
$password = 'dfcmbb977';
$loginOpenSubtitles1 = new LoginOpenSubtitles($username, $password);

$loginOpenSubtitles1->initCurl();
$loginOpenSubtitles1->getResponse();
var_dump($loginOpenSubtitles1->getResult());





