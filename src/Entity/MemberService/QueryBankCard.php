<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/4/7
 * Time: 13:38
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class QueryBankCard extends Entity
{
    protected $bizUserId;
    protected $cardNo;

    public function validateEmpty()
    {
        $this->cardNo && $this->cardNo = AllInPayUtil::rsaEncode($this->cardNo);
        return true;
    }
}
