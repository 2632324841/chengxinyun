<?php

namespace chengxinyun\api;
use chengxinyun\Core;
class Recharge extends Core
{

    /**
     * 资金账户信息列表
     * 接口说明：薪资发放异常数据
     */
    public function get_account(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/recharge/getAccount', $data);
        return $res;
    }

    /**
     * 获取充值二维码、银行子账户等信息
     * 接口说明：获取资金账户信息
     */
    public function get_recharge(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['accountId'] = $data['accountId'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/recharge/getRecharge', $data);
        return $res;
    }

    /**
     * 发起充值单
     * 接口说明：发起充值单
     */
    public function add_recharge_order(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['merchantsAccountId'] = $data['merchantsAccountId'];
        $sign_data['merchantsName'] = $data['merchantsName'];
        $sign_data['merchantsAccount'] = $data['merchantsAccount'];
        $sign_data['merchantsBank'] = $data['merchantsBank'];
        $sign_data['rechargeAmount'] = $data['rechargeAmount'];
        $sign_data['rechargeTime'] = $data['rechargeTime'];
        $sign_data['rechargeVoucher'] = $data['rechargeVoucher'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/recharge/addRechargeOrder', $data);
        return $res;
    }

    /**
     * 充值结果查询
     * 接口说明：充值结果查询
     */
    public function get_recharge_result(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['rechargeNumber'] = $data['rechargeNumber'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/recharge/getRechargeResult', $data);
        return $res;
    }

    /**
     * 充值列表查询
     * 接口说明：充值结果查询
     */
    public function list_recharge_result(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/recharge/listRechargeResult', $data);
        return $res;
    }
}
