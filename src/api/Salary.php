<?php

namespace Chengxinyun\api;
use Chengxinyun\Core;
class Salary extends Core
{

    /**
     * 创建薪资发放
     * 接口说明：薪资发放
     */
    public function add(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/salary/add', $data);
        return $res;
    }

    /**
     * 薪资发放-查询详情
     * 接口说明：创建商户
     */
    public function detail(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['batchId'] = $data['batchId'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/salary/detail', $data);
        return $res;
    }

    /**
     * 薪资发放-单笔明细查询详情
     * 接口说明：创建商户
     */
    public function order_dtl(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/salary/orderDtl', $data);
        return $res;
    }

    /**
     * 查询商户可用余额
     * 接口说明：创建商户
     */
    public function balance(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/salary/balance', $data);
        return $res;
    }

    /**
     * 退票-列表查询
     * 接口说明：薪资发放异常数据
     */
    public function refund_list(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/salary/refundList', $data);
        return $res;
    }
}
