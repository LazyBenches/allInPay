<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:16
 */
include 'test.php';


echo PHP_EOL, '绑卡申请', PHP_EOL;
$param = [
    'cardNo' => $bankCard,
    'bizUserId' => $bizUserId,
    'name' => $realName,
    'identityNo' => $idCard,
    'phone' => $phone,
    'isSafeCard' => true,
];
$response = $pay->request(new LazyBench\AllInPay\Entity\MemberService\ApplyBindBankCard($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    return;
}
var_export($value);