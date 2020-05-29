<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 14:18
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Constant\IndustryCode;
use LazyBench\AllInPay\Constant\Order;
use LazyBench\AllInPay\Entity\Entity;

class Refund extends Entity
{

    protected $bizOrderNo;// 商户订单号（支付订单） String 是
    protected $oriBizOrderNo;//商户原订单号 String 需要退款的原交易订单号 是
    protected $bizUserId;//商户系统用户标识，商户系统中唯一编号。退款收款人。String 必须是原订单中的付款方如果是平台，参数值为：#yunBizUserId_B2C#。是
    //退款方式 String 默认 D1D1：D+1 14:30 向渠道发起退款D0：D+0 实时向渠道发起退款说明（1）此参数仅对支持退款金额原路返回否的支付订单有效（接口说明 3）（2）不支持退款的渠道及内部账户，实时退款至余额（接口说明 4）
    //托管代收订单中的收款人的退款金额JSONArray 此字段总金额 = amount-feeAmount。
    //（1）原订单为消费接口，不填
    //（2）原订单为简化校验版代收接口A -未代付，refundList 无需上送，从中间账户至原代收订单付款方B-全部代付, refundList 必须上送，从已代付收款人，指定托管专用账户集，上送退款列表会员 bizUserId 及金额
    //退款至原代收订单付款方；C-部分代付，分别退款，未代付金额按A 规则，已代付金额按 B 规则退款；
    //（3）原订单为标准版托管代收接口全额退款不填，部分退款必填；A-全额退款，refundList 无需上送，原路径返回（未代付-从中间账户至原代
    //收订单付款方，已代付-从已代付收款
    //人至原代收订单付款方）；
    //B-部分退款，refundList 必须上送，已
    //代付-填写账户集编号，明确托管专用
    //否
    //账户集，从退款列表会员 bizUserId 及
    //金额 amount 退款至代收订单付款方，
    //未代付-账户集不上送，默认从中间账
    //户退至代收订单付款方；支持
    //指定既从中间账户退款，又
    //从指定已代付收款人账户退款；
    //注：最多支持 100 个
    //详细
    protected $refundType = Order::withDrawD0Type;
    protected $refundList;
    //后台通知地址 String 如果不填，则不通知。退款成功时，才会通知。否
    protected $backUrl;
    //本次退款总金额 Long 单位：分。不得超过原订单金额。是
    protected $amount;
    //代金券退款金额 Long 单位：分
    //不得超过退款总金额，支持部分退款。
    //如不填，则默认为 0。
    //如为 0，则不退代金券。
    //否
    protected $couponAmount;
    //手续费退款金额 Long 单位：分
    //不得超过退款总金额。
    //如不填，则默认为 0。
    //如为 0，则不退手续费。
    //否
    protected $feeAmount;
    //扩展信息 String 接口将原样返回，最多 50 个字符，不
    //可包含“|”特殊字符
    protected $extendInfo;


    public function validateEmpty()
    {
        if (is_string($this->amount) || is_string($this->feeAmount)) {
            throw new \Exception('金额格式为int型，只能是分');
        }
        return $this->bizOrderNo && $this->amount && $this->oriBizOrderNo && $this->refundType && $this->backUrl;
    }
}
