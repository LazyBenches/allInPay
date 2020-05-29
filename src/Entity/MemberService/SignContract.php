<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 16:58
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Constant\Common;
use LazyBench\AllInPay\Entity\Entity;

class SignContract extends Entity
{
    protected $bizUserId;// 商户系统用户标识，商户系统中唯一编号String 是
    protected $jumpUrl;//签订之后，跳转返回的页面地址String 是
    protected $backUrl;//后台通知地址 String 是
    protected $source = Common::sourceMobile;

    public function validateEmpty()
    {
        return $this->jumpUrl && $this->backUrl;
    }
}