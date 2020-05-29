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

class SendVerificationCode extends Entity
{
    /**
     * Author:LazyBench
     *
     * @var string
     */
    protected $bizUserId;

    /**
     * Author:LazyBench
     *
     * @var string
     */
    protected $phone;

    /**
     * Author:LazyBench
     *
     * @var string
     */
    protected $verificationCodeType;

    public function validateEmpty()
    {
        return $this->bizUserId && $this->phone && is_string($this->phone) && $this->verificationCodeType;
    }
}