<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 12:17
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
    'validateType' => \LazyBench\AllInPay\Constant\Order::transferCheckSms,
    'payMethod' => [
        'GATEWAY_VSP' => (new \LazyBench\AllInPay\Entity\OrderService\PayMethod\GatewayVsp([
            'amount' => $amount,
        ]))->toArray(),
    ],
];
$response = $pay->request(new LazyBench\AllInPay\Entity\OrderService\DepositApply($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    var_export($pay->getParam());
    exit;
}
echo '<a href="./payConfirm.html?bizOrderNo='.$value['bizOrderNo'].'&tradeNo='.$value['orderNo'].' " target="_blank">去确认</a>';
exit;
