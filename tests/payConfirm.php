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
$bizOrderNo = $_REQUEST['bizOrderNo'] ?? '';
$verificationCode = $_REQUEST['verificationCode'] ?? '';
$response = $pay->setParam(new LazyBench\AllInPay\Entity\OrderService\Pay([
    'bizUserId' => $bizUserId,
    'bizOrderNo' => $bizOrderNo,
    'verificationCode' => $verificationCode,
    'consumerIp' => '110.184.217.138',//'222.209.241.109',
]));
$data = $pay->getParam();
$queryString = http_build_query([
    'sysid' => $data['sysid'],
    'v' => '2.0',
    'timestamp' => $data['timestamp'],
    'sign' => $data['sign'],
    'req' => $data['req'],
]);
//$url = $pay->getGateWayUrl().'?'.$queryString;
//echo '<a href="'.$url.'" target="_blank">'.$url.'</a>';
header("Location: {$pay->getGateWayUrl()}?{$queryString}");
exit;
