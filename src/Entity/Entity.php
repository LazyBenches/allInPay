<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/3
 * Time: 15:27
 */

namespace LazyBench\AllInPay\Entity;

use LazyBench\AllInPay\Util\AllInPayUtil;

abstract class Entity implements EntityInterface
{

    public function __construct($param)
    {
        $class = get_class($this);
        $explode = explode('\\', $class);
        AllInPayUtil::setMethod(lcfirst(array_pop($explode)));
        AllInPayUtil::setService(array_pop($explode));
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            isset($param[$key]) && !in_array($param[$key], [null, false, ''], true) && $this->{$key} = $param[$key];
        }
        if (property_exists($this, 'bizUserId') && !is_string($param['bizUserId'])) {
            throw new \Exception($class.':bizUserId 只能为字符串类型');
        }
        if (!$this->validateEmpty()) {
            throw new \Exception($class.':参数不能为空');
        }
    }


    public function toArray(): array
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $var) {
            if ($var === null) {
                unset($vars[$key]);
            }
        }
        return $vars;
    }
}
