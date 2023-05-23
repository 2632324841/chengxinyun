<?php
require_once __DIR__ . '/vendor/autoload.php';

use Chengxinyun\Factory;

$obj = Factory::Merchant('秘钥');
$res = $obj->merchants_list_info([
    'agentNumber'=>'',
    'pageNum'=>1,
    'pageSize'=>20,
]);
var_dump($obj);
var_dump($res);