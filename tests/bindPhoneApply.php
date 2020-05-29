<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:14
 */
include 'test.php';

echo PHP_EOL, '发送验证码', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
    'phone' => $phone,
    'verificationCodeType' => \LazyBench\AllInPay\Constant\SendVerificationCode::typeBind,
];
$response = $pay->request(new \LazyBench\AllInPay\Entity\MemberService\SendVerificationCode($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo(), $pay->getSignValue());
    return;
}
var_export($value);