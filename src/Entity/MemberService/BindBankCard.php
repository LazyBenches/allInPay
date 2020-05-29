<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 16:39
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class BindBankCard extends Entity
{
    protected $bizUserId;// 商户系统用户标识，商户系统中唯一编号。String 是
    protected $tranceNum;//  流水号 String 请求绑定银行卡接口返回 否（绑卡方式 6、7 必传）
    protected $transDate;//  申请时间 String 请求绑定银行卡接口返回 否
    protected $phone;//  银行预留手机 String 是
    protected $validate;//  格式为月年；如 0321，2位月2位年， RSA加密, 详细。String 否
    protected $cvv2;// CVV2, RSA 加密, 详细。 String 否
    protected $verificationCode;

    public function validateEmpty()
    {
        $this->cvv2 && $this->cvv2 = AllInPayUtil::rsaEncode($this->cvv2);

        return $this->phone ? true : false;
    }
}