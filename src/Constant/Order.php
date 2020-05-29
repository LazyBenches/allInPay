<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 10:50
 */

namespace LazyBench\AllInPay\Constant;


class Order
{
    public const waitState = 1;
    public const failState = 3;
    public const paidState = 4;
    public const paidBackState = 5;
    public const closedState = 6;
    public const payingState = 99;

    public const withDrawD0Type = 'D0';
    public const withDrawD1Type = 'D1';
    public const withDrawT1CustomizedType = 'T1customized';
    public const withDrawD0CustomizedType = 'D0customized';

    public const depositApply = 1;
    public const consumeApply = 2;
    public const withdrawApply = 3;
    public const agentCollectApply = 4;
    public const signalAgentPay = 5;
    public const batchAgentPay = 6;
    public const platformPositionAllocation = 7;
    public const refund = 10;
    public const applicationTransfer = 12;
    public const conductFinancialTransactions = 14;
    public const agreementConsumption = 15;
    public const agreementCollection = 16;
    public const crossBorderWithdrawal = 17;
    public const refundFundTransfer = 18;

    public const transferCheckNo = 0;
    public const transferCheckSms = 1;
    public const transferCheckPassword = 2;

    public const payTypeB2B = 'B2B';
    public const payTypeB2C = 'B2C';
    public const payType2BC = 'B2C,B2B';
    public const personWithdraw = 0;
    public const companyWithdraw = 1;
}
