<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 15:09
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Entity\Entity;

class QueryBalance extends Entity
{
    protected $bizUserId;
    protected $accountSetNo;

    public function validateEmpty()
    {
        return $this->accountSetNo ? true : false;
    }
}