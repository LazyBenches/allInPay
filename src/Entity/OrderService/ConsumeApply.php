<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 13:42
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Constant\Common;
use LazyBench\AllInPay\Constant\IndustryCode;
use LazyBench\AllInPay\Constant\Order;
use LazyBench\AllInPay\Entity\Entity;

class ConsumeApply extends Entity
{
    protected $payerId;// 商户系统用户标识，商户系统中唯一编号。付款方String 消费用户的 bizUserId，支持个人会员、企业会员是
    protected $recieverId;//商户系统用户标识，商户系统中唯一编号。收款方String 消费商户的 bizUserId，支持个人会员、企业会员、平台。如果是平台 ， 参 数 值 为 ：#yunBizUserId_B2C#。是
    protected $bizOrderNo;//商户订单号（支付订单） String 是
    protected $amount;//订单金额 Long 单位：分。 是
    protected $fee;//手续费 Long 内扣，如果不存在，则填 0。单位：分。如 amount 为 100， fee为 2，实际到账金额为 98，平台手续费收入为 2。是
    protected $validateType = Order::transferCheckSms;//交易验证方式 Long 详细如不填，默认为短信验证码确认否
    protected $splitRule;//分账规则 JSONArray 内扣。详细支持分账到会员或者平台账户。分账规则：分账层级数<=3，分账总会员数<=10否
    protected $frontUrl;//前台通知地址 String 前台交易时必填，支付后，跳转的前台页面小通网关模式必传收银宝网关必传否
    protected $backUrl;//后台通知地址 String 是
    //订单过期时间 String yyyy-MM-dd HH:mm:ss
    //控制订单可支付时间，订单最长时
    //效为 24 小时，即过期时间不能大
    //于订单创建时间 24 小时；
    //1） 需确认支付情况-确认支付
    //时间不能大于订单过期时间；
    //2） 无需确认支付情况-透传至
    //渠道方， 最大不超过60分钟，
    //控制订单支付时间范围，下述
    //支付方式有效：
    protected $orderExpireDatetime;
    protected $payMethod;//支付方式 JSONObject详细 是
    protected $goodsType;//商品类型 Long 详细 否
    protected $bizGoodsNo;//商户系统商品编号 String 商家录入商品后，发起交易时可上送商品编号否
    protected $goodsName;//商品名称 String 注：符号不支持微信原生 APP 支付必传否
    protected $goodsDesc;//商品描述 String 否
    protected $industryCode = IndustryCode::Other10;//行业代码 String 详细 是
    protected $industryName;//行业名称 String 详细 是
    protected $source = Common::sourcePc;//访问终端类型 Long 详细 是
    protected $summary;//摘要 String 交易内容摘要最多 20 个字符否
    protected $extendInfo;//扩展参数 String 接口将原样返回， 最多50个字符， 否

    public function validateEmpty()
    {
        if (is_string($this->amount) || is_string($this->fee)) {
            return false;
        }
        if ($this->splitRule && !is_array($this->splitRule)) {
            throw new \Exception('分账格式错误');
        }
        $this->industryCode && $this->industryName = IndustryCode::map[$this->industryCode];
        return $this->bizOrderNo && $this->amount && $this->backUrl && $this->industryCode && $this->backUrl;
    }
}
