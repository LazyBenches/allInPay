<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/2
 * Time: 11:12
 * 注：
 * 1.调用支付方式前请与通商云业务人员确认是否已经开通了这些支付权限。
 * 2.充值、提现订单不支持组合支付。
 * 3.订单 POS、微信支付（APP 支付、扫码支付、刷卡支付、公众号）、支付宝支付（扫码支付、刷卡支付、生
 * 活号）、收银宝快捷不支持组合支付。
 * 110/163
 * 4.消费订单、托管代收订单支持组合支付，即“一种渠道类入金支付方式 + N种明细账目余额类支付方式”的组
 * 合支付，例如网关支付+账户余额、实名付+账户余额+代金券、账户余额+代金券
 *
 *
 *
 */

namespace LazyBench\AllInPay\Constant;

class Common
{
    /**
     *
     * {
     * "BALANCE":[{"accountSetNo":"3","amount":100},],
     * "GATEWAY_VSP":{"gateid":"0103","payType":"B2C","amount":600},
     * "COUPON":{"amount":200}
     * }
     */
    public const paymentTypes = [
        'in' => [
            'GATEWAY_VSP',//网关支付
            'QUICKPAY_VSP',//快捷支付
        ],
        'inner' => [
            'BALANCE',//余额
            'COUPON',//代金卷
        ],
        'out' => [
            'WITHDRAW_SD',//山东代付
            'WITHDRAW_HTBANK',//华通代付
            'TRANSFER_HTBANK',//华通头寸调拨
        ],
    ];

    /**
     * 网管支付方式
     */
    public const gateWayPaymentTypes = [
        Order::payTypeB2C => 'B2C',
        Order::payTypeB2B => 'B2B',
        Order::payType2BC => 'B2C,B2B',
    ];


    /**
     * 企业会员 2 ,
     * 个人会员 3 ,
     */
    public const memberType = [
        Member::companyType => 'company',
        Member::personType => 'person',
    ];


    /**
     * 绑定编号
     */
    public const bindType = [
        SendVerificationCode::typeBind => 'bind',
        SendVerificationCode::typeUnBind => 'unBind',
    ];


    /**
     * 来源
     */
    public const source = [
        self::sourcePc => 'pc',
        self::sourceMobile => 'mobile',
    ];

    public const sourcePc = 2;
    public const sourceMobile = 1;


    /**
     * 证件类型
     */
    public const identityType = [
        IdentityTpe::IdCard => 'idCard',//身份证
        IdentityTpe::Passport => 'passport',//护照
        IdentityTpe::Officer => 'officer',//军官证
        IdentityTpe::Hometown => 'hometown',//回乡证
        IdentityTpe::Taiwan => 'taiwan',//台胞证
        IdentityTpe::Police => 'police',//警官证
        IdentityTpe::Soldier => 'soldier',//士兵证
        IdentityTpe::Other => 'other',//其它证件
    ];

    public const withdrawType = [
        Order::withDrawD0Type => 'D0',//D+0 到账
        Order::withDrawD1Type => 'D1',//D+1 日 15:00 后到账
        Order::withDrawT1CustomizedType => 'T1customized',//T+1 到账，仅工作日代付需配置 12:00 后时间点，默认14:00
        Order::withDrawD0CustomizedType => 'D0customized',//D+0 到账，根据平台资金头寸付款
    ];


    /**
     * 商品类型
     */
    public const goodType = [
        '2' => '虚拟商品',
        '3' => '实物商品',
        '4' => '线下服务',
        '5' => '跨境商品',
        '90' => '营销活动',
        '99' => '其他',
    ];

    /**
     * 用户状态
     */
    public const userState = [
        Member::userStateActive => '有效',
        Member::userStateFail => '审核失败',
        Member::userStateLocked => '已锁',
        Member::userStateWait => '待审核',
    ];

    public const companyState = [
        Member::companyStateWait => '待审核',
        Member::companyStateSuccess => '审核成功',
        Member::companyStateFail => '审核失败',
    ];

    public const orderState = [
        Order::waitState => '未支付',
        Order::failState => '交易失败',
        Order::paidState => '交易成功',
        Order::paidBackState => '交易成功-发生退款',
        Order::closedState => '关闭',
        Order::payingState => '进行中',
    ];

    /**
     * 订单类型
     */
    public const orderType = [
        Order::depositApply => '充值',
        Order::consumeApply => '消费',
        Order::withdrawApply => '提现',
        Order::agentCollectApply => '代收',
        Order::signalAgentPay => '代付',
        Order::batchAgentPay => '批量代付',
        Order::platformPositionAllocation => '平台头寸调拨',
        Order::refund => '退款',
        Order::applicationTransfer => '平台转账',
        Order::conductFinancialTransactions => '理财',
        Order::agreementConsumption => '协议消费',
        Order::agreementCollection => '协议代收',
        Order::crossBorderWithdrawal => '跨境提现',
        Order::refundFundTransfer => '退款资金调拨',
    ];

    /**
     * 绑定状态
     */
    public const bindState = [
        Card::bindState => '已绑定',
        Card::unbindState => '已解除',
    ];
    /**
     * 银行卡类型
     */
    public const bankCardType = [
        Card::bankCardTypeDebit => '借记卡',
        Card::bankCardTypeCredit => '信用卡',
    ];
    /**
     * 卡状态
     */
    public const cardState = [
        Card::cardStateInvalid => '无效',
        Card::cardStateEffective => '有效',
    ];


    /**
     * 交易验证方式
     */

    public const transferType = [
        Order::transferCheckNo => '无验证',
        Order::transferCheckSms => '短信验证码',
        Order::transferCheckPassword => '支付密码',
    ];

    /**
     * 帐户集编号
     */
    public const accountNo = [
        AccountNo::standardBalance => '标准余额账户集',
        AccountNo::standardDeposit => '标准保证金账户集',
        AccountNo::reserveAmount => '准备金额度账户集',
        AccountNo::intermediateAccountA => '中间账户集 A',
        AccountNo::intermediateAccountB => '中间账户集 B',
        AccountNo::prepaidCard => '预付卡账户集',
        AccountNo::standardMarketing => '标准营销账户集',
    ];


}