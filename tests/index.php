<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/2
 * Time: 16:52
 */
$files = scandir('./');
foreach ($files as $file) {
    if (!in_array($file, ['.', '..','test.php','index.php','js','signContract.php'], true)) {
        echo "<p><a href='/{$file}'>{$file}</a></p>";
    }
}