<?php
namespace app\services;

class Tlgrm
{
    const DOMAIN = 'https://api.telegram.org/';
    const BOT = 'bot';

    private $client;
    private $token;

    public function __construct($token)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->token = $token;
    }

    public function getMe()
    {
        $res = $this->client->request('GET', self::DOMAIN.self::BOT.$this->token.'/getMe')->getStatusCode();
        if($res==200) return true;
        return false;
    }
}