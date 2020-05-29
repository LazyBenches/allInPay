<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:12
 */
include 'test.php';
echo PHP_EOL, '会员实名认证', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
    'name' => $realName,
    'identityNo' => $idCard,
];
$response = $pay->request(new \LazyBench\AllInPay\Entity\MemberService\SetRealName($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo(), $pay->getSignValue());
    return;
}
var_export($value);