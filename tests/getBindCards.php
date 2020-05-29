<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/26
 * Time: 14:15
 */

include 'test.php';

$param = [
    'bizUserId' => $bizUserId,
];
$response = $pay->request(new LazyBench\AllInPay\Entity\MemberService\QueryBankCard($param));
if (!$value = $pay->handle($response)) {
    var_dump($pay->getError(), $pay->getErrNo());
    var_export($pay->getParam());
    exit;
}
foreach($value['bindCardList'] as $list){
    var_dump(\LazyBench\AllInPay\Util\AllInPayUtil::rsaDecode($list['bankCardNo']));
}
