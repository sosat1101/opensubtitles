<?php

include '../SearchOpenSubtitles.php';

$searchOpenSubtitles = new SearchOpenSubtitles(['query' => 'let bullet fly', 'languages' => 'zh-cn']);
$searchOpenSubtitles->initCurl();
var_dump($searchOpenSubtitles->getResult());
