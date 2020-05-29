<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:15
 */

include 'test.php';

echo PHP_EOL, '查询card bin', PHP_EOL;
$param = [
    'cardNo' => substr($bankCard, 0, 9),
];
$response = $pay->request(new LazyBench\AllInPay\Entity\MemberService\GetBankCardBin($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo(), $pay->getSignValue());
    return;
}
var_export($value);