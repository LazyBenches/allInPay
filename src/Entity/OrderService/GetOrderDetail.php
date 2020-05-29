<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/29
 * Time: 16:40
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Entity\Entity;

class GetOrderDetail extends Entity
{
    protected $bizOrderNo;

    public function validateEmpty()
    {
        // TODO: Implement validateEmpty() method.
        return $this->bizOrderNo ? true : false;
    }
}
