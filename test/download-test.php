<?php
include_once "../DownloadOpenSubtitles.php";
include_once "../LoginOpenSubtitles.php";
//$username = 'pipilu';
//$password = 'dfcmbb977';
//$loginOpenSubtitles1 = new LoginOpenSubtitles($username, $password);
//$loginOpenSubtitles1->initCurl();
//$loginOpenSubtitles1->getResponse();
//$loginOpenSubtitles1->getResult();
$access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIzYlYwRFNuTzJ5RWxwNFJPQ05CZDY5UVhBcGcwcUh5WiIsImV4cCI6MTY0NjcxMDUwMX0.4GVEV8EZZHY3l-H-eX03zObKC3yS-zL2Pwx598An3_M";

$downloadOpenSubtitles = new DownloadOpenSubtitles($access_token, ['file_id' => 784507]);

$downloadOpenSubtitles->initCurl();
$downloadOpenSubtitles->getResult();
$downloadOpenSubtitles->execDownload();



