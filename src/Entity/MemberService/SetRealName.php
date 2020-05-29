<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 16:08
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Constant\IdentityTpe;
use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class SetRealName extends Entity
{
    protected $bizUserId;// 商户系统用户标识，商户系统中唯一编号。String 是
    protected $isAuth = MEMBER_IS_AUTH;//是否由通商云进行认证 Boolean true/false默认为 true目前必须通过通商云认证 否
    protected $name;//姓名 String 是
    protected $identityType = IdentityTpe::IdCard;//证件类型 Long 详细目前只支持身份证。是
    protected $identityNo;//证件号码 String RSA 加密详细

    public function validateEmpty()
    {
        $this->identityNo && $this->identityNo = AllInPayUtil::rsaEncode($this->identityNo);

        return $this->identityNo && $this->name;
    }
}