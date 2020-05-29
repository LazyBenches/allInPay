<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 17:08
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Entity\Entity;

class Pay extends Entity
{
    protected $bizUserId;// 商户系统用户标识，商户系统中唯一编号。String 若 平 台 ， 上 送 固 定 值 ：#yunBizUserId_B2C#
    protected $bizOrderNo;//订单申请的商户订单号（支付订单）String 是
    protected $verificationCode;//短信验证码 String 交易验证方式为1-短信验证码1、网关支付，不填，不验短信验证码。2、组合支付含网关支付，必填，验证短信验证码。否
    protected $consumerIp;// ip 地址 String 用户公网 IP 用于分控校验注：不能使用“127.0.0.1”“localhost”是


    public function validateEmpty()
    {
        return $this->bizOrderNo && $this->consumerIp;
    }
}