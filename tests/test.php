<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 10:02
 */

include realpath('./').'/../vendor/autoload.php';
include realpath('./').'/../src/Defines.php';
$sysId = '1907011117454446144';
$config = [
    'serverUrl' => 'http://116.228.64.55:6900/service/soa',
    'privateKeyPath' => realpath('./')."/../config/cert/{$sysId}.pfx",
    'publicKeyPath' => realpath('./')."/../config/cert/{$sysId}.cer",
    'sysId' => $sysId,
    'password' => '123456',
    'gateWayUrl' => 'http://116.228.64.55:6900/yungateway/frontTrans.do',
    'gateWaySignUrl' => 'http://116.228.64.55:6900/yungateway/member/signContract.html',
    'escrowAccount' => '200135',
];
$pay = new \LazyBench\AllInPay\Pay($config);
$realName = '蒋万勇';
$idCard = '51062319860226901X';
$bizUserId = '202004020000001';
$companyBizUserId = '#yunBizUserId_B2C#';
$bankCard = '6228480469074720076';
$companyName = $legalName = '6217003810036672445';
$phone = '18908047474';
$publicAccountNo = '6217003810036672445';
$parentBankName = '农业银行';
$bankName = '农业银行';
$unionBank = '103651091138';
$uniCredit = '123465987981';
$bindCode = '371769';
$bindBankCardCode = '558623';
$tranceNum = '716660603513';
