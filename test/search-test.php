<?php
include '../SearchOpenSubtitles.class.php';

$searchOpenSubtitles = new SearchOpenSubtitles(['query' => 'grand blue']);
var_dump($searchOpenSubtitles->getResult());
