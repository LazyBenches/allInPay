<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 14:57
 */

namespace LazyBench\AllInPay\Entity\OrderService\PayMethod;


use LazyBench\AllInPay\Constant\AccountNo;
use LazyBench\AllInPay\Entity\Entity;

class Balance extends Entity
{
    protected $amount;
    protected $accountSetNo = AccountNo::standardBalance;

    public function validateEmpty()
    {
        if (is_string($this->amount)) {
            return false;
        }
        return $this->amount && $this->accountSetNo;
    }
}