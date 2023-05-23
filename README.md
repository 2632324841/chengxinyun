# 橙薪云SDK
 Chengxinyun api
 [官方文档](https://chengxinyun.com/dev/)
 当前SDK已经集成所有接口可以直接调用
 其他接口直接同理调用
 建议使用php 7.2.5版本以上
 主要使用[guzzlehttp/guzzle](https://github.com/guzzle/guzzle)请求库
 ```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Chengxinyun\Factory;

$obj = Factory::Merchant('秘钥');
//以数组形式作为参数
//不需要参入时间戳和签名
//在请求前会自动生成数据
$res = $obj->merchants_list_info([
    'agentNumber'=>'',
    'pageNum'=>1,
    'pageSize'=>20,
]);
var_dump($obj);
 ```
 