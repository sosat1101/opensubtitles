<?php

class initCurl
{
    private mixed $ch;
    private string $username;
    private string $password;
    private string $apiKey;
    public static array $reResult;

    public function execCurl(string $type, string $header,string $url, string $body) {
        switch ($type) {
            case 'login':
                $httpHeader = ['Api-Key:' . $this->apiKey, 'Content-Type:application/json; charset=utf-8'];
                $curlBody = json_encode(["username" => $this->username, "password" => $this->password]);
                $this->ch = curl_init();
                curl_setopt($this->ch, CURLOPT_URL, "https://api.opensubtitles.com/api/v1/login");
                curl_setopt($this->ch, CURLOPT_POST, true);
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, $curlBody);
                curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false,);
                curl_setopt($this->ch, CURLOPT_HTTPHEADER, $httpHeader);
                break;
            case 'search':
                break;


        }

    }
}