<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/4
 * Time: 10:54
 */

namespace LazyBench\AllInPay\Entity;


interface EntityInterface
{

    public function toArray();

    public function validateEmpty();
}