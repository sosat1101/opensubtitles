<?php
include_once "initCurl.php";
class LoginOpenSubtitles
{

    private mixed $ch;
    private string $username;
    private string $password;
    const URL = 'https://api.opensubtitles.com/api/v1/login';
    public array $loginResult;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getResult(): array
    {
        $initCurl = new initCurl(self::URL);
        $this->loginResult = $initCurl->login($this->username, $this->password)->getResponse();
        return $this->loginResult;
    }

    public function getAccessToken()
    {
        return $this->loginResult['token'];
    }
}