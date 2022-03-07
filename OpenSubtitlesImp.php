<?php

include_once "Subtitles.php";
include_once "SearchOpenSubtitles.php";
include_once "DownloadOpenSubtitles.php";

class OpenSubtitlesImp implements Subtitles
{

    public function search(string $name, string $language = "en"): array
    {
        $searchOpenSubtitles = new SearchOpenSubtitles(['query' => $name, 'languages' => $language]);
        $searchOpenSubtitles->initCurl();
        $searchOpenSubtitles->getResponse();
        return $searchOpenSubtitles->getResult();
    }

    public function download(int $subtitleId, string $language = "en")
    {
        // access_token 需要从缓存中读取
        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIzYlYwRFNuTzJ5RWxwNFJPQ05CZDY5UVhBcGcwcUh5WiIsImV4cCI6MTY0NjcxMDUwMX0.4GVEV8EZZHY3l-H-eX03zObKC3yS-zL2Pwx598An3_M";
        $downloadOpenSubtitles = new DownloadOpenSubtitles($access_token, ['file_id' => $subtitleId]);
        $downloadOpenSubtitles->initCurl();
        $downloadOpenSubtitles->getResponse();
        $downloadOpenSubtitles->getResult();
        try {
            $downloadOpenSubtitles->execDownload();
        } catch (Exception $e) {
            return $e;
        }
        return null;
    }
}