<?php

class LoginOpenSubtitles
{

    private mixed $ch;
    private string $username;
    private string $password;
    private string $apiKey;
    public static array $loginResult;

    public function __construct(string $username, string $password, string $apiKey)
    {
        $this->username = $username;
        $this->password = $password;
        $this->apiKey = $apiKey;
        $this->initCurl();
    }

    private function initCurl()
    {
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
    }


    /**
     * @throws Exception
     */
    public function login(): string|array|static
    {
        $result = curl_exec($this->ch);
        if (curl_exec($this->ch) === false) {
            return 'Curl error: ' . curl_error($this->ch);
        }
        if (200 !== curl_getinfo($this->ch, CURLINFO_HTTP_CODE)) {
            return new Exception('Response ERROR: httpCode:' . curl_getinfo($this->ch, CURLINFO_HTTP_CODE));
        }
        curl_close($this->ch);
        self::$loginResult = $this->toArray($result);
        return $this;
    }

    public function getLoginResult(): array
    {
        return self::$loginResult;
    }

    public function getAccessToken() {
        return self::$loginResult['token'];
    }

    private function toArray(string $json): array
    {
        return json_decode($json, true);
    }

}