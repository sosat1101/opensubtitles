<?php
include_once '../DownloadOpenSubtitles.class.php';

$downloadOpenSubtitles = new DownloadOpenSubtitles(['file_id' => 392830]);
var_dump($downloadOpenSubtitles->getResult());

