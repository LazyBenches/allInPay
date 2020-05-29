<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/26
 * Time: 13:43
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Constant\Common;
use LazyBench\AllInPay\Constant\IndustryCode;
use LazyBench\AllInPay\Constant\Order;
use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class WithdrawApply extends Entity
{
    // 商户订单号（支付订单） String 是
    protected $bizOrderNo;
    // 商户系统用户标识，商户系
    //统中唯一编号。
    //String 支持个人会员、企业会员、平台。
    //若平台，上送固定值：
    //    #yunBizUserId_B2C#
    //是
    protected $bizUserId;
    //账户集编号 String 个人会员、企业会员填写托管专用
    //账户集编号
    //若平台，填写平台对应账户集编号，
    //详细
    //注：不支持 100002-标准保护金账
    //户集，100003-准备金额度账户集、
    //100004/5 中间账户集
    //是
    protected $accountSetNo;
    protected $amount;//订单金额 Long 单位：分，包含手续费 是
    //手续费 Long 内扣，如果不存在，则填 0。
    //单位：分。
    //如 amount 为 100，fee 为 2，实际
    //到账金额为 98，平台手续费收入为
    //2。
    //是
    protected $fee;
    //交易验证方式 Long 详细
    //如不填，默认为短信验证码确认
    //平台提现，只支持无验证和短线验
    //证
    //否
    protected $validateType = Order::transferCheckNo;
    //后台通知地址 String 是
    //订单过期时间 String yyyy-MM-dd HH:mm:ss
    //控制订单可支付时间，订单最长时
    //效为 24 小时，即过期时间不能大于
    //订单创建时间 24 小时；
    //1） 需确认支付情况-确认支付时
    //间不能大于订单过期时间；
    //2） 无需确认支付情况-透传至渠
    //道方，最大不超过 60 分钟，控
    //制订单支付时间范围，下述支
    //付方式有效：
    protected $backUrl;
    protected $orderExpireDatetime;
    protected $payMethod;//支付方式 JSONObject详细如不传，则默认为通联通代付否
    protected $bankCardNo;//银行卡号/账号 String 绑定的银行卡号/账号RAS 加密，详细是
    protected $bankCardPro;//银行卡/账户属性 Long 0：个人银行卡1：企业对公账户如果不传默认为 0 平台提现，必填 1否
    protected $withdrawType;//提现方式 String D0：D+0 到账D1：D+1 到账T1customized：T+1 到账，仅工作日代付D0customized：D+0 到账，根据平台资金头寸付款默认为 D0 否
    protected $industryCode = IndustryCode::Other10;//行业代码 String 详细 是
    protected $industryName;//行业名称 String 详细 是
    protected $source = Common::sourcePc;//访问终端类型 Long 详细 是
    protected $summary;//摘要 String 摘要最多 20 个字符否
    protected $extendInfo;// 扩展信息 String 最多 50 个字符，商户拓展参数，用于透传给商户，不可包含“|”特殊字符


    public function validateEmpty()
    {
        if (!$this->amount) {
            throw new \Exception('提现金额不能为空');
        }
        if (!is_int($this->amount)) {
            throw new \Exception('提现金额格式错误');
        }
        $this->bankCardNo && $this->bankCardNo = AllInPayUtil::rsaEncode($this->bankCardNo);
        $this->industryCode && $this->industryName = IndustryCode::map[$this->industryCode];
        return $this->bizOrderNo && $this->amount && $this->backUrl && $this->industryCode && $this->bankCardNo && $this->backUrl;
    }
}
