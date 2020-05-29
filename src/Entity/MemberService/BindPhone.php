<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/3
 * Time: 15:31
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Entity\Entity;

class BindPhone extends Entity
{
    protected $bizUserId;
    protected $phone;
    protected $verificationCode;

    public function validateEmpty()
    {
        return $this->bizUserId && $this->phone && is_string($this->phone) && $this->verificationCode;
        // TODO: Implement validateEmpty() method.
    }
}