<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 15:11
 */

include 'test.php';
$param = [
    'bizUserId' => $bizUserId,
    'accountSetNo' => \LazyBench\AllInPay\Util\AllInPayUtil::getEscrowAccount(),
];
$response = $pay->request(new LazyBench\AllInPay\Entity\OrderService\QueryBalance($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    var_export($pay->getParam());
    exit;
}
exit(json_encode($value));