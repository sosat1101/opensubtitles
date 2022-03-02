<?php
include "SearchOpenSubtitles.class.php";
use openSubtitles\SearchOpenSubtitles;

$searchOpenSubtitles = new SearchOpenSubtitles(['ffee', 'fefe']);
var_dump($searchOpenSubtitles);
