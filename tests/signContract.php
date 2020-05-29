<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/2
 * Time: 16:52
 */

include 'test.php';
//echo PHP_EOL, '签约', PHP_EOL;
if (isset($_POST['method']) && $_POST['method'] === 'signContract') {
    $param = [
        'bizUserId' => $bizUserId,
        'jumpUrl' => 'http://allinpay.club/signContract.php',
        'backUrl' => 'http://allinpay.club/signContract.php',
    ];
    $response = $pay->setParam(new LazyBench\AllInPay\Entity\MemberService\SignContract($param));
    $data = $pay->getParam();
    $data['gateWayUrl'] = $pay->getGateWaySignUrl();
    exit(json_encode($data));
}
include 'response.php';
