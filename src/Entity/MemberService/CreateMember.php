<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/3
 * Time: 15:26
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Constant\Common;
use LazyBench\AllInPay\Constant\Member;
use LazyBench\AllInPay\Entity\Entity;

class CreateMember extends Entity
{
    protected $bizUserId;
    protected $memberType = Member::companyType;
    protected $source = Common::sourcePc;
//    protected $extendParam = [];

    public function validateEmpty()
    {
        return $this->bizUserId ? true : false;
    }
}