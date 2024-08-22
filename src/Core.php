<?php

namespace Chengxinyun;

class Core
{

    protected $secretKey;
    protected $testingApi = 'https://demo.chengxinyun.vip/api';
    protected $productionApi = 'https://www.chengxinyun.com/api';
    protected $isTest = false;

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function setTset($isTest = true){
        $this->isTest = $isTest;
    }

    public function generateSignature($params)
    {
        // 对参数名ASCII码从小到大排序
        ksort($params);

        $signStr = '';
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                // 如果参数值是数组，则递归处理
                $value = $this->generateSignature($value, $this->secretKey);
            }
            $signStr .= $key . '=' . $value . '&';
        }

        // 拼接签名密钥
        $signStr .= $this->secretKey;

        // 计算MD5签名
        $signature = md5($signStr);

        return $signature;
    }

    public function request($method, $url, $data = [])
    {
        if($this->isTest){
            $url = $this->testingApi . $url;
        }else{
            $url = $this->productionApi . $url;
        }
       
        if ($method == 'POST') {
            $options['body'] = json_encode($data);
            $options['headers']['Content-Type'] = 'application/json';
        }
        $res = HttpClient::getInstance()->sendRequest($method, $url, $options);
        $data = json_decode($res, true);
        if (is_array($data)) {
            return $data;
        }
        throw new \Exception($data);
    }

    protected function postData($property)
    {
        // 获取JSON请求数据
        $jsonData = file_get_contents('php://input');
        // 解析JSON数据为PHP关联数组
        $dataArray = json_decode($jsonData, true);

        // 使用递归函数获取属性值
        $value = $this->getPropertyValue($property, $dataArray);

        return $value;
    }

    protected function getPropertyValue($property, $dataArray)
    {
        $keys = explode('.', $property);
        $value = $dataArray;
        foreach ($keys as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                // 如果属性不存在，则返回默认值或抛出异常，取决于你的需求
                return null; // 或者抛出异常
            }
        }
        return $value;
    }

    // 获取当前的毫秒数
    protected function getCurrentMilliseconds()
    {
        $time = microtime(true); // 获取当前时间戳，包含微秒部分
        $milliseconds = floor($time  * 1000); // 提取微秒部分并转换为毫秒
        return (int)$milliseconds;
    }
}
