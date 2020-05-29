<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/26
 * Time: 13:56
 */

include 'test.php';

$amount = $_POST['amount'] ?? 1;
$amount = (int)$amount;
$bizOrderNo = md5(time());
$param = [
    'bizUserId' => $bizUserId,
    'bizOrderNo' => $bizOrderNo,
    'amount' => $amount,
    'accountSetNo' => \LazyBench\AllInPay\Util\AllInPayUtil::getEscrowAccount(),
    'fee' => 0,
    'frontUrl' => 'http://allinpay.club/response.php',
    'backUrl' => 'http://allinpay.club/response.php',
    'validateType' => \LazyBench\AllInPay\Constant\Order::transferCheckNo,
    'bankCardNo' => $bankCard,
];
$response = $pay->request(new LazyBench\AllInPay\Entity\OrderService\WithdrawApply($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    var_export($pay->getParam());
    exit;
}
var_dump($value);
exit;
