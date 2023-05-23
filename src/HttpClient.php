<?php
namespace Chengxinyun;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
    private static $instance;
    private $client;

    private function __construct()
    {
        $this->client = new Client();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function sendRequest($method, $url, $options = [])
    {
        try {
            $response = $this->client->request($method, $url, $options);
            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            // 处理请求异常
            return $e->getMessage();
        }
    }
}