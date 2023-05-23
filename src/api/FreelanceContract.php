<?php

namespace Chengxinyun\api;
use Chengxinyun\Core;
class FreelanceContract extends Core
{

    /**
     * 自由职业者签约
     * 接口说明：创建自由职业者
     */
    public function sign_contract(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/freelanceContract/signContract', $data);
        return $res;
    }

    /**
     * 自由职业者列表
     * 接口说明：查询商户下自由职业者信息
     */
    public function list_info(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/cxy/freelanceContract/listInfo', $data);
        return $res;
    }
}
