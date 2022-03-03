<?php
include_once "initCurl.php";
include_once 'LoginOpenSubtitles.class.php';

class DownloadOpenSubtitles
{
    private array $defaultParameters = [
        'file_id' => 0,      // integer    file_id from /subtitles search results
        'sub_format' => '',
        'file_name' => '',
        'in_fps' => '',
        'out_fps' => '',
        'timeshift' => '',
        'force_download' => '',

    ];
    const URL = 'https://api.opensubtitles.com/api/v1/download';
    private array $downloadResult;

    public function __construct(array $fields)
    {
        foreach ($fields as $key => $field) {
            if (array_key_exists($key, $this->defaultParameters)) {
                $this->defaultParameters[$key] = $field;
            }
        }
    }

    public function getResult(): array
    {
        $presentParameters = [];
        foreach ($this->defaultParameters as $key => $value) {
            if ($key == 'force_download') {
                $presentParameters[$key] = $value;
            }
            if (!empty($value)) {
                $presentParameters[$key] = $value;
            }
        }

        $loginOpenSubtitles = new LoginOpenSubtitles('pipilu', 'dfcmbb977');
        $loginOpenSubtitles->getResult();
        $access_token = $loginOpenSubtitles->getAccessToken();
        $initCurl = new initCurl(self::URL);
        $this->downloadResult = $initCurl->download($presentParameters, $access_token)->getResponse();
        return $this->downloadResult;
    }

    public function getFile()
    {
        $url = $this->downloadResult['link'];
        $handle = fopen($url, 'r');

    }
}
