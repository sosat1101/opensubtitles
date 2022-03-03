<?php

class initCurl
{
    private mixed $ch;
    const ApiKey = 'bCZDNxfGMhcVBtr5fAo7sqj9nmasEHLi';
    public array $result;

    public function __construct($url)
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false,);
    }

    public function login($username, $password)
    {
        $httpHeader = ['Api-Key:' . self::ApiKey, 'Content-Type:application/json; charset=utf-8'];
        $body = json_encode(["username" => $username, "password" => $password]);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $httpHeader);
        return $this;
    }

    public function search(array $field): static
    {
        $httpHeader = ['Api-Key:' . self::ApiKey, 'Content-Type:application/json; charset=utf-8'];
        curl_setopt($this->ch, CURLOPT_POST, false);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $httpHeader);
        return $this;
    }

    public function download(array $body, $access_token): static
    {
        $httpHeader = ['Authorization:' . $access_token, 'Api-Key:' . self::ApiKey, 'Content-Type:application/json; charset=utf-8'];
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $httpHeader);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($body));
        return $this;
    }

    public function getResponse(): Exception|array|string
    {

        $result = curl_exec($this->ch);
        if (curl_exec($this->ch) === false) {
            return 'Curl error: ' . curl_error($this->ch);
        }
        if (200 !== curl_getinfo($this->ch, CURLINFO_HTTP_CODE)) {
            return 'Response ERROR: httpCode:' . curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        }
        curl_close($this->ch);
        return $this->toArray($result);
    }

    private function toArray(string $json): array
    {
        return json_decode($json, true);
    }

}