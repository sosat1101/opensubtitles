<?php

include "SearchOpenSubtitles.class.php";
include "DownloadOpenSubtitles.class.php";

use openSubtitles\SearchOpenSubtitles;

class ImpSubTitles
{
    private array $searchResultArray;

    public function search(array $parameters, string $language = "eng"): array
    {
        $searchOpenSubtitles = new SearchOpenSubtitles($parameters);
        $this->searchResultArray = $searchOpenSubtitles->getCurlResult();
        return $this->searchResultArray;
    }

    public function download(int $subtitleId, string $language = "eng")
    {
        foreach ($this->searchResultArray as $value) {
            if ($value['IDSubtitleFile'] == $subtitleId) {
                return $value['SubDownloadLink'];
            }
        }
        return new Exception("没有匹配的subtitleId");
    }

}

$defaultParameters = [
//    'episode' => 20,
//    'imdbid' => 4145054,
//    'moviebytesize' => 750005572,
    'moviehash' => "f8f22ab22fca9f35",
//    'season' => 2,
//    'sublanguageid' => "eng",
];

$impSubTitles = new ImpSubTitles();

var_dump($impSubTitles->search($defaultParameters));

