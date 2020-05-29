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
use LazyBench\AllInPay\Util\AllInPayUtil;

class QuickPayVsp extends Entity
{
    protected $amount;
    protected $bankCardNo;

    public function validateEmpty()
    {
        if (is_string($this->amount)) {
            return false;
        }
        $this->bankCardNo && $this->bankCardNo = AllInPayUtil::rsaEncode($this->bankCardNo);
        return $this->amount && $this->bankCardNo;
    }
}
