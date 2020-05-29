<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:15
 */
include 'test.php';

echo PHP_EOL, '绑定手机', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
    'phone' => $phone,
    'verificationCode' => $bindCode,
];
$response = $pay->request(new LazyBench\AllInPay\Entity\MemberService\BindPhone($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo(), $pay->getSignValue());
    return;
}
var_export($value);