<?php
include "initCurl.php";
class LoginOpenSubtitles
{

    private mixed $ch;
    private string $username;
    private string $password;
    const URL = 'https://api.opensubtitles.com/api/v1/login';
    public static array $loginResult;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getResult(): array
    {
        $initCurl = new initCurl(self::URL);
        self::$loginResult = $initCurl->login($this->username, $this->password)->getResponse();
        return self::$loginResult;
    }

    public function getAccessToken()
    {
        return self::$loginResult['token'];
    }
}