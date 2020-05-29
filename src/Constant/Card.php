<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 11:41
 */

namespace LazyBench\AllInPay\Constant;


class Card
{

    /**
     * 绑定状态
     */
    public const bindState = 1;
    public const unbindState = 2;
    /**
     * 银行卡类型
     */
    public const bankCardTypeDebit = 1;
    public const bankCardTypeCredit = 2;

    /**
     * 卡状态
     */
    public const cardStateInvalid = 0;
    public const cardStateEffective = 1;


    public const bankCodeICBC = 1;
    public const bankCodeABC = 2;
    public const bankCodeBOC = 3;
    public const bankCodeCCB = 4;
    public const bankCodePSBC = 5;
    public const bankCodeBCM = 6;
    public const bankCodeCITIC = 7;
    public const bankCodeCEB = 8;
    public const bankCodeCIB = 9;
    public const bankCodeSPDB = 10;
    public const bankCodeCMBC = 11;
    public const bankCodePINGAN = 12;
    public const bankCodeCMB = 13;
    public const bankCodeBOSC = 14;
    /**
     * 银行代码
     */
    public const bankCode = [
        self::bankCodeICBC => 102,//工商银行
        self::bankCodeABC => 103,//农业银行
        self::bankCodeBOC => 104,//中国银行
        self::bankCodeCCB => 105,//建设银行
        self::bankCodePSBC => 100,//邮储银行
        self::bankCodeBCM => 301,//交通银行
        self::bankCodeCITIC => 302,//中信银行
        self::bankCodeCEB => 303,//光大银行
        self::bankCodeCIB => 309,//兴业银行
        self::bankCodeSPDB => 310,//浦发银行
        self::bankCodeCMBC => 305,//民生银行
        self::bankCodePINGAN => 307,//平安银行
        self::bankCodeCMB => 308,//招商银行
        self::bankCodeBOSC => 401290,//上海银行
    ];


    //绑卡方式

    public const bindTypeAuthNameCheckThree = 1;//通联通账户实名验证(三要素)无需调用【确认绑定银行卡】，不支持贷记卡
    //短信验证码为 11111。
    //测试环境手机号 13616515002
    public const bindTypeAuthName = 3;//需调【确认绑定银行卡】完成绑卡。不支持绑贷记卡测试环境下绑卡时，
    //账户名：通商云
    //卡号：6228481234567898346
    //手机号：18019823456
    //身份证：310226123456745676
    //银行代码：01030000
    public const bindTypeAuthNameCheckFour = 5;// 无需调用【确认绑定银行卡】，不支持贷记卡

    //需调【确认绑定银行卡】完成绑卡。支持绑借记和贷记卡；
    //测试环境下绑卡要求：
    //证件：身份证
    //手机号：11 位
    //短信验证码：111111
    //验证码有效时间：10 分钟
    //卡号：符合卡 BIN 规则
    //卡号 00 结尾模拟为贷记卡，为贷记卡时有效期和 CVV 至少输入一个
    //卡号 01 结尾模拟为手机号不一致
    //卡号 02 结尾模拟为身份证不一致
    //卡号 03 结尾模拟为卡号异常
    //卡号 04 结尾模拟为账号户名不一致
    //其余情况为模拟成功
    public const bindTypeAgreePaySign = 6;//通联通协议支付签约

    //需调【确认绑定银行卡】完成绑卡。支持绑借记和贷记卡；
    //测试环境下使用真实银行卡进行绑卡
    public const bindTypeQuickPaySign = 7;//收银宝快捷支付签约

    //无需调用【确认绑定银行卡】，支持绑借记和贷记卡；
    //测试环境请使用以下信息：
    //银行卡号：6228480402637874214（农业银行）
    //姓名：王小二
    //身份证号：61042219860000000
    public const bindTypeFour = 8;//银行卡四要素验证
    
    public const bindTypeBackEnd = 99;//后台绑定银行卡

}