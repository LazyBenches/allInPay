<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/27
 * Time: 16:44
 */

use LazyBench\AllInPay\Entity\OrderService\QueryBalance;

include 'test.php';
$bizOrderNo = $_REQUEST['bizOrderNo'];
$param = [
    'bizOrderNo' => $bizOrderNo,
];
$response = $pay->request(new LazyBench\AllInPay\Entity\OrderService\ResendPaySMS($param));
if (!$value = $pay->handle($response)) {
    exit(json_encode([
        'msg'=>$pay->getError()
    ]));
}
exit(json_encode($value));
