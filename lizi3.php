<?php

include_once 'DownloadOpenSubtitles.class.php';

$downloadOpenSubtitles = new DownloadOpenSubtitles(['file_id' => 392830]);
$downloadOpenSubtitles->getResult();
$url = $downloadOpenSubtitles->getLink();
$aaa = $url;
$fopen = fopen($aaa, 'rb') or die('Cannot open file:' . $aaa);
$i = 0;
if ($fopen) {
    while (($buffer = fgets($fopen, 1024)) !== false) {
        echo '------->'.$i.$buffer."\n";
        $i++;
    }
    if (!feof($fopen)) {
        echo "Error unpect fgets() fail\n";
    }
    fclose($fopen);
}



