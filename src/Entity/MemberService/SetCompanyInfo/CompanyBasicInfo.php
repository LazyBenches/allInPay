<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/3
 * Time: 15:36
 */

namespace LazyBench\AllInPay\Entity\MemberService\SetCompanyInfo;


use LazyBench\AllInPay\Constant\AuthType;
use LazyBench\AllInPay\Constant\IdentityTpe;
use LazyBench\AllInPay\Entity\Entity;
use LazyBench\AllInPay\Util\AllInPayUtil;

class CompanyBasicInfo extends Entity
{
    protected $companyName;// 企业名称，如有括号，用中文格式（） 是
    protected $legalName;// 法人姓名 是
    protected $identityType = IdentityTpe::IdCard;// 法人证件类型 详细 是
    protected $legalIds;// 法人证件号码 RSA加密，详细 是
    protected $legalPhone;// 法人手机号码 是
    protected $accountNo;// 企业对公账户 RSA加密，详细 是
    protected $parentBankName;// 开户银行名称，详细，需严格按照银行列表上送， 部分银行支持多种上送方式，选其一上送即可。 注：测试环境仅支持工农中建交。 是
    protected $bankName;// 开户行支行名称 如：“中国工商银行股份有限公司北京樱桃园支行” 是
    protected $unionBank;// 支付行号，12位数字 是
    protected $authType = AuthType::OneCa;// 认证类型 1:三证 2:一证 默认1-三证 否
    protected $uniCredit;// 统一社会信用（一证） 认证类型为2时必传否

    //    protected $bankCityNo;// 开户行地区代码 根据中国地区代码表 详情 否
    //    protected $companyAddress;// 企业地址 否
    //    protected $businessLicense;// 营业执照号（三证） 认证类型为1时必传否
    //    protected $organizationCode;// 组织机构代码（三证） 认证类型为1时必传否
    //    protected $taxRegister;// 税务登记证（三证） 认证类型为1时必传否
    //    protected $expLicense;// 统一社会信用/营业执照号到期时间 格式：yyyy-MM-dd否
    //    protected $telephone;// 联系电话 否
    //    protected $province;// 开户行所在省 开户行所在市必须同时上送 根据中国省市表的“省份”内容填写。详情 否
    //    protected $city;// 开户行所在市 开户行所在省必须同时上送 根据中国省市表的“城市”内容填写。详情 否

    public function validateEmpty()
    {
        $this->accountNo = AllInPayUtil::rsaEncode($this->accountNo);
        $this->legalIds = AllInPayUtil::rsaEncode($this->legalIds);
        return $this->companyName && $this->legalName && $this->identityType && $this->legalIds && $this->legalPhone && $this->accountNo && $this->parentBankName && $this->bankName && $this->unionBank;
    }
}