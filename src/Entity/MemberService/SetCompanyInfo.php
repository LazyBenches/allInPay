<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/3
 * Time: 15:34
 */

namespace LazyBench\AllInPay\Entity\MemberService;


use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Entity\MemberService\SetCompanyInfo\CompanyBasicInfo;

class SetCompanyInfo extends Entity
{
    protected $bizUserId;
    protected $backUrl;
    /**
     * Author:LazyBench
     *
     * @var CompanyBasicInfo
     */
    protected $companyBasicInfo;
    //    protected $companyExtendInfo;
    protected $isAuth = MEMBER_IS_AUTH;

    public function validateEmpty()
    {
        return $this->bizUserId && $this->backUrl;
    }
}