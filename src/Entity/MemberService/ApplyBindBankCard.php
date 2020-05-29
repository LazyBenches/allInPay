<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 12:23
 * 请求绑定银行卡
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Constant\Card;
use LazyBench\AllInPay\Constant\IdentityTpe;
use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class ApplyBindBankCard extends Entity
{
    protected $bizUserId;//bizUserId 商户系统用户标识，商户系统中唯一编号。String 是
    protected $cardNo;//银行卡号 String RSA 加密。详细 是
    protected $name;//姓名 String 如果是企业会员，请填写法人姓名 是
    protected $cardCheck = Card::bindTypeQuickPaySign;//绑卡方式 Long 详细 ，默认绑卡方式-7 否
    protected $identityType = IdentityTpe::IdCard;//证件类型 Long 详细目前只支持身份证。是
    protected $identityNo;//证件号码 String RSA 加密详细 是
    protected $validate;//有效期 String 格式为月年；如 0321，2 位月 2 位年， RSA 加密, 详细。使用万鉴通 4 要素绑信用卡可以不上送此字段 否
    protected $cvv2;//CVV2 String 3 位数字，RSA 加密, 详细。使用万鉴通 4 要素绑信用卡可以不上送此字段 否
    protected $isSafeCard;//是否安全卡 boolean 信用卡时不能填写：true:设置为安全卡，false:不设置。默认为 false 否
    protected $phone;//银行预留手机 String 绑卡方式1-通联通三要素绑卡，手机号可不上送其他绑卡方式必须上送 否
    protected $unionBank;

    public function validateEmpty()
    {
        $this->cardNo && $this->cardNo = AllInPayUtil::rsaEncode($this->cardNo);
        $this->identityNo && $this->identityNo = AllInPayUtil::rsaEncode($this->identityNo);
        $this->validate && $this->validate = AllInPayUtil::rsaEncode($this->validate);
        $this->cvv2 && $this->cvv2 = AllInPayUtil::rsaEncode($this->cvv2);
        return $this->cardNo && $this->identityNo && $this->name;
    }
}
