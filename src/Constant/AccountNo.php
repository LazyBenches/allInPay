<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 11:32
 */

namespace LazyBench\AllInPay\Constant;


class AccountNo
{
    public const standardBalance = '100001';// => '标准余额账户集',
    public const standardDeposit = '100002';// => '标准保证金账户集',
    public const reserveAmount = '100003';// => '准备金额度账户集',
    public const intermediateAccountA = '100004';// => '中间账户集 A',
    public const intermediateAccountB = '100005';// => '中间账户集 B',
    public const prepaidCard = '100006';// => '预付卡账户集',
    public const standardMarketing = '2000000';// => '标准营销账户集',
    public const platConsume = '#yunBizUserId_B2C#';
}
