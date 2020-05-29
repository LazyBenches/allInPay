<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 12:16
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class GetBankCardBin extends Entity
{
    protected $cardNo;

    public function validateEmpty()
    {
        $this->cardNo && $this->cardNo = AllInPayUtil::rsaEncode($this->cardNo);
        return $this->cardNo ? true : false;
    }
}