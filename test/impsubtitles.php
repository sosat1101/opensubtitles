<?php
include_once "../OpenSubtitlesImp.php";
$openSubtitlesImp = new OpenSubtitlesImp();
//var_dump($openSubtitlesImp->search("let bullet fly"));
$openSubtitlesImp->download(784507);