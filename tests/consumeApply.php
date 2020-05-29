<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/26
 * Time: 13:56
 */

use LazyBench\AllInPay\Constant\AccountNo;
use LazyBench\AllInPay\Entity\OrderService\Pay;

include 'test.php';

$amount = $_POST['amount'] ?? 1;
$amount = (int)$amount;
$bizOrderNo = md5(time());
$param = [
    'payerId' => $bizUserId,
    'recieverId' => $companyBizUserId,
    'bizOrderNo' => $bizOrderNo,
    'amount' => $amount,
    'fee' => 0,
    //    'frontUrl' => 'http://allinpay.club/response.php',
    'backUrl' => 'http://allinpay.club/response.php',
    'validateType' => \LazyBench\AllInPay\Constant\Order::transferCheckSms,
    'bankCardNo' => $bankCard,
    'payMethod' => [
        'BALANCE' => [
            (new \LazyBench\AllInPay\Entity\OrderService\PayMethod\Balance([
                'amount' => $amount,
                'accountSetNo' => \LazyBench\AllInPay\Util\AllInPayUtil::getEscrowAccount(),
            ]))->toArray(),
        ],
    ],
];
$response = $pay->request(new LazyBench\AllInPay\Entity\OrderService\ConsumeApply($param));
if (!$value = $pay->handle($response)) {
    echo '<pre>';
    var_dump($pay->getError(), $pay->getErrNo());
    var_export($pay->getParam());
    exit;
}
echo '<a href="./payConfirm.html?bizOrderNo='.$value['bizOrderNo'].'&tradeNo='.$value['orderNo'].' " target="_blank">去确认</a>';
exit;
