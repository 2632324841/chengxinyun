<?php

namespace Chengxinyun\api;
use Chengxinyun\Core;
class Invoice extends Core
{

    /**
     * 获取发票信息
     * 接口说明：充值结果查询
     */
    public function get_invoice_type(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/invoice/getInvoiceType', $data);
        return $res;
    }

    /**
     * 发起开票
     * 接口说明：获取发票所需信息
     */
    public function add_invoice(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['invoiceType'] = $data['invoiceType'];
        $sign_data['categoryOfInvoice'] = $data['categoryOfInvoice'];
        $sign_data['shippingAddress'] = $data['shippingAddress'];
        $sign_data['nameOfRecipient'] = $data['nameOfRecipient'];
        $sign_data['contactNumber'] = $data['contactNumber'];
        $sign_data['amountOfApply'] = $data['amountOfApply'];
        $sign_data['email'] = $data['email'];

        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/invoice/addInvoice', $data);
        return $res;
    }

    /**
     * 开票结果查询
     * 接口说明：发起开票
     */
    public function get_invoice_result(array $data = [])
    {
        $data['timestamp'] = $this->getCurrentMilliseconds();
        $sign_data['partnerCode'] = $data['partnerCode'];
        $sign_data['timestamp'] = $data['timestamp'];
        $sign_data['invoiceOrderNumber'] = $data['invoiceOrderNumber'];
        $sign = $this->generateSignature($sign_data);
        $data['sign'] = $sign;
        $res = $this->request('POST', '/invoice/getInvoiceResult', $data);
        return $res;
    }
}
