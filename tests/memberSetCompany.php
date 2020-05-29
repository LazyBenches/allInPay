<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:10
 */
include 'test.php';
echo PHP_EOL, '企业认证', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
    'backUrl' => 'http://test.com',
    'isAuth' => false,
    'companyBasicInfo' => (new \LazyBench\AllInPay\Entity\MemberService\SetCompanyInfo\CompanyBasicInfo([
        'companyName' => $companyName,
        'legalName' => $legalName,
        'legalIds' => $idCard,//RSA加密
        'legalPhone' => $phone,
        'accountNo' => $publicAccountNo,//RSA加密
        'parentBankName' => $parentBankName,
        'bankName' => $bankName,
        'unionBank' => $unionBank,
        'uniCredit' => $uniCredit,//社会统一信用代码
    ]))->toArray(),
];
$response = $pay->request(new \LazyBench\AllInPay\Entity\MemberService\SetCompanyInfo($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    return;
}
var_export($value);