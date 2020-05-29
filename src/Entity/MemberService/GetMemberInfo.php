<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/19
 * Time: 14:42
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Entity\Entity;

class GetMemberInfo extends Entity
{
    protected $bizUserId;

    public function validateEmpty()
    {
        return true;
//        return $this->bizUserId && is_string($this->bizUserId);
    }
}