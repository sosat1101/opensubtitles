<?php
include_once "../OpenSubtitlesImp.php";
$openSubtitlesImp = new OpenSubtitlesImp();
//var_dump($openSubtitlesImp->search("let bullet fly"));
//$openSubtitlesImp->download(784507);
$login = $openSubtitlesImp->login("pipilu", "dfcmbb977");
var_dump($login);