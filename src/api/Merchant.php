<?php

namespace chengxinyun\api;

use chengxinyun\Core;

class Merchant extends Core
{

    /**
     * 接口说明：获取商户签约所需税源地列表
     */
    public function merchants_list_tax(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['agentNumber'] = $data['agentNumber'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/merchantsSign/listTax', $data);
        return $res;
    }

    /**
     * 接口说明：获取商户签约所需税源地列表
     */
    public function merchants_sign(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['agentNumber'] = $data['agentNumber'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['merchantsName'] = $data['merchantsName'];
        $sign_data['enterpriseIdNumber'] = $data['enterpriseIdNumber'];
        $sign_data['typeOfTaxpayer'] = $data['typeOfTaxpayer'];
        $sign_data['businessLicenseAddress'] = $data['businessLicenseAddress'];
        $sign_data['taxSourcesId'] = $data['taxSourcesId'];
        $sign_data['feeRates'] = $data['feeRates'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/merchantsSign/merchantsSign', $data);
        return $res;
    }

    /**
     * 接口说明：创建商户
     */
    public function merchants_list_info(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['agentNumber'] = $data['agentNumber'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/merchantsSign/listInfo', $data);
        return $res;
    }
}
