<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/25
 * Time: 14:22
 */
include_once 'test.php';
echo '<pre>';
if (!$value = $pay->callBackRequest($_GET['rps'], $_GET['timestamp'], $_GET['sign'])) {
    exit('false');
}
var_dump($value);
exit('success');
