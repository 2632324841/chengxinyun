<?php
namespace Chengxinyun\api;
use Chengxinyun\Core;
class Callback extends Core{
    
    /**
    * 充值结果回调
    */
    public function recharge(){
        $msgMethod = $this->post_data('msgMethod');
        if($msgMethod != 'recharge'){
            return false;
        }
        $bizContent = $this->post_data('bizContent');
        if(empty($bizContent) && !is_array($bizContent)){
            return false;
        }
        return $bizContent;
    }

    /**
    * 开票结果回调
    */
    public function invoicing(){
        $msgMethod = $this->post_data('msgMethod');
        if($msgMethod != 'recharge'){
            return false;
        }
        $bizContent = $this->post_data('bizContent');
        if(empty($bizContent) && !is_array($bizContent)){
            return false;
        }
        return $bizContent;
    }

    /**
    * 薪资发放回调
    */
    public function salary(){
        $msgMethod = $this->post_data('msgMethod');
        if($msgMethod != 'recharge'){
            return false;
        }
        $bizContent = $this->post_data('bizContent');
        if(empty($bizContent) && !is_array($bizContent)){
            return false;
        }
        return $bizContent;
    }

    /**
    * 退票回调
    */
    public function return_invoice(){
        $msgMethod = $this->post_data('msgMethod');
        if($msgMethod != 'recharge'){
            return false;
        }
        $bizContent = $this->post_data('bizContent');
        if(empty($bizContent) && !is_array($bizContent)){
            return false;
        }
        return $bizContent;
    }

    /**
    * 商户状态变更
    */
    public function merchant_change(){
        $msgMethod = $this->post_data('msgMethod');
        if($msgMethod != 'recharge'){
            return false;
        }
        $bizContent = $this->post_data('bizContent');
        if(empty($bizContent) && !is_array($bizContent)){
            return false;
        }
        return $bizContent;
    }
}