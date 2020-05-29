<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:17
 */
include 'test.php';
echo PHP_EOL, '确认绑卡', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
    'tranceNum' => $tranceNum,
    'phone' => $phone,
    'verificationCode' => $bindBankCardCode,
];
$response = $pay->request(new LazyBench\AllInPay\Entity\MemberService\BindBankCard($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    return;
}
var_export($value);