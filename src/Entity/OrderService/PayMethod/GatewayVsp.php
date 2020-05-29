<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 14:56
 */

namespace LazyBench\AllInPay\Entity\OrderService\PayMethod;


use LazyBench\AllInPay\Constant\Order;
use LazyBench\AllInPay\Entity\Entity;

class GatewayVsp extends Entity
{
    protected $amount;
    //    protected $gateid;
    protected $paytype = Order::payTypeB2B;

    //    protected $limitPay = 'no_credit';

    public function validateEmpty()
    {
        if (is_string($this->amount)) {
            return false;
        }
        return $this->amount && $this->paytype;
    }
}