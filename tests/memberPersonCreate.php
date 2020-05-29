<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:10
 */
include 'test.php';
echo PHP_EOL, '创建个人会员', PHP_EOL;
$param = [
    'bizUserId' => $bizUserId,
    'memberType' => \LazyBench\AllInPay\Constant\Member::personType,
    'source' => \LazyBench\AllInPay\Constant\Common::sourceMobile,
];
$response = $pay->request(new \LazyBench\AllInPay\Entity\MemberService\CreateMember($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo(), $pay->getSignValue());
    return;
}
var_export($value);