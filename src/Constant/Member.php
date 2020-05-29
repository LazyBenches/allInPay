<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 10:36
 */

namespace LazyBench\AllInPay\Constant;


class Member
{
    public const personType = 3;
    public const companyType = 2;

    public const companyStateWait = 1;
    public const companyStateSuccess = 2;
    public const companyStateFail = 3;

    public const userStateActive = 1;
    public const userStateFail = 3;
    public const userStateLocked = 5;
    public const userStateWait = 7;

    public const resultFail = 3;//审核失败
    public const resultSuccess = 2;//审核成功

    public const accountType = [
        self::personType,
        self::companyType,
    ];
}
