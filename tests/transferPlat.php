<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/26
 * Time: 14:15
 */

include 'test.php';

$amount = $_POST['amount'] ?? 1;
$amount = (int)$amount;
$bizOrderNo = md5(time());
$param = [
    'bizTransferNo' => $bizOrderNo,
    'amount' => $amount,
    'targetBizUserId' => $bizUserId,
    'sourceAccountSetNo' => \LazyBench\AllInPay\Constant\AccountNo::standardBalance,
    'targetAccountSetNo' => \LazyBench\AllInPay\Util\AllInPayUtil::getEscrowAccount(),
];
$response = $pay->request(new LazyBench\AllInPay\Entity\OrderService\ApplicationTransfer($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    var_export($pay->getParam());
    exit;
}
var_dump($value);
