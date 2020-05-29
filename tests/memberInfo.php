<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:13
 */
include 'test.php';
echo PHP_EOL, '获取会员信息', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
];
$response = $pay->request(new \LazyBench\AllInPay\Entity\MemberService\GetMemberInfo($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    return;
}
var_export($value);
