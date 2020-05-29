<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * a) 调用充值申请接口，上送订单及支付信息。
 * b) 调用确认支付接口，进行交易验证。
 * c) 等待接收异步订单支付结果通知。
 * d) 接收到异步通知后，业务系统进行订单处理。
 * e) 订单完成。
 * Time: 14:18
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Constant\Common;
use LazyBench\AllInPay\Constant\IndustryCode;
use LazyBench\AllInPay\Constant\Order;
use LazyBench\AllInPay\Entity\Entity;

class DepositApply extends Entity
{
    protected $bizOrderNo; //商户订单号（支付订单） String 是
    protected $bizUserId;//商户系统用户标识，商户系统中唯一编号。String 支持个人会员、企业会员、平台。若平台，上送固定值： #yunBizUserId_B2C#是
    protected $accountSetNo;//账户集编号 String 个人会员、企业会员填写托管专用账户集编号若平台，填写平台对应账户集编号，详细注：不支持 100004/5 中间账户集是
    protected $amount;//订单金额 Long 单位：分。包含手续费 是
    protected $fee;//手续费 Long 内扣，如果不存在，则填 0。单位：分。如 amount 为 100，fee 为 2，则是充值实际到账为 98，平台手续费收入为 2。
    protected $validateType = Order::transferCheckNo;//交易验证方式 Long 详细如不填，默认为短信验证码确认否
    protected $frontUrl;//前台通知地址 String 前台交易时必填，支付后，跳转的前台页面；小通网关模式必传收银宝网关必传 否
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
    //微信正扫： SCAN_WEIXIN、
    //SCAN_WEIXIN_ORG
    //支付宝正扫： SCAN_ALIPAY、
    //否
    //SCAN_ALIPAY_ORG
    //银联正扫： SCAN_UNIONPAY、
    //SCAN_UNIONPAY_ORG
    //微信公众号：
    //WECHAT_PUBLIC、
    //WECHAT_PUBLIC_ORG
    //微信小程序：
    //WECHATPAY_MINIPROGRAM、
    //WECHATPAY_MINIPROGRAM_
    //ORG
    //微信原生 APP：
    //WECHATPAY_APP_OPEN
    protected $orderExpireDatetime;
    protected $payMethod;//支付方式 JSONObject详细 是
    protected $goodsName;//商品名称 String 注：符号不支持微信原生 APP 支付必传否
    protected $industryCode = IndustryCode::Other10;//行业代码 String 详细 是
    protected $industryName;//行业名称 String 详细 是
    protected $source = Common::sourcePc;//访问终端类型 Long 详细 是
    protected $summary;//摘要 String 交易内容最多 20 个字符否
    protected $extendInfo;

    public function validateEmpty()
    {
        if (!is_int($this->amount) || !is_int($this->fee)) {
            throw new \Exception('金额类型必须为int');
        }
        if(!$this->orderExpireDatetime){
            $this->orderExpireDatetime = date('Y-m-d H:i:s',strtotime('+ 30 min'));
        }
        $this->industryCode && $this->industryName = IndustryCode::map[$this->industryCode];
        return $this->bizOrderNo && $this->amount && $this->backUrl;
    }
}
