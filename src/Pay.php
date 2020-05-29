<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/2
 * Time: 17:14
 */

namespace LazyBench\AllInPay;

use LazyBench\AllInPay\Entity\EntityInterface;
use LazyBench\AllInPay\Util\AllInPayUtil;
use LazyBench\AllInPay\Util\Curl;

class Pay
{
    protected $appKey = '';
    protected $appId = '';
    protected $serverUrl = '';//后台接口地址
    protected $gateWayUrl = '';//网关接口地址
    protected $gateWaySignUrl = '';
    protected $version = '2.0';
    protected $error;
    protected $errNo;
    protected $signValue;
    protected $param;

    public function getError()
    {
        return $this->error;
    }

    public function getErrNo()
    {
        return $this->errNo;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function setErrorNo($code)
    {
        $this->errNo = $code;
    }

    public function getSignValue()
    {
        return $this->signValue;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function getGateWayUrl()
    {
        return $this->gateWayUrl;
    }

    public function getGateWaySignUrl()
    {
        return $this->gateWaySignUrl;
    }


    public function __construct(array $config)
    {
        isset($config['version']) && $this->version = $config['version'];
        $this->serverUrl = $config['serverUrl'];
        $this->gateWayUrl = $config['gateWayUrl'];
        $this->gateWaySignUrl = $config['gateWaySignUrl'];
        !AllInPayUtil::getEscrowAccount() && AllInPayUtil::setEscrowAccount($config['escrowAccount']);
        !AllInPayUtil::getSysId() && AllInPayUtil::setSysId($config['sysId']);
        !AllInPayUtil::getPrivateKey() && AllInPayUtil::setPrivateKey($config['privateKeyPath'], $config['password']);
        !AllInPayUtil::getPublicKey() && AllInPayUtil::setPublicKey(file_get_contents($config['publicKeyPath']));
        !AllInPayUtil::getUUID() && AllInPayUtil::setUUID($config['uuid']);
        $this->appKey = $config['appKey'] ?? '';
        $this->appId = $config['appId'] ?? '';
    }

    /**
     * Author:LazyBench
     *
     * @param EntityInterface $entity
     * @return bool|mixed
     */
    public function request(EntityInterface $entity)
    {
        $this->setParam($entity);
        $url = "{$this->serverUrl}?".AllInPayUtil::toUrlParams($this->param);
        $response = (new Curl())->setHeader(['Content-Type:application/json'])->get($url);
        return $response;
    }

    public function setParam(EntityInterface $entity)
    {
        //所有地址参数不要包含“#”涉及字段 jumpUrl、frontUrl、backUrl；
        //注：#是用来指导浏览器动作的， 对服务器端完全无用；
        //所有 HTTP 请求中不包括#。
        //        ：sysid + req + timestamp
        AllInPayUtil::setTimestamp();
        $this->param = [
            'req' => str_replace("\r\n", '', json_encode([
                'service' => AllInPayUtil::getService(),
                'method' => AllInPayUtil::getMethod(),
                'param' => $entity->toArray(),
            ])),
            'sysid' => AllInPayUtil::getSysId(),
            'timestamp' => AllInPayUtil::getTimestamp(),
        ];
        $this->param['sign'] = AllInPayUtil::sign($this->param['req']);
        $this->param['v'] = $this->version;
        return $this;
    }

    public function handle($response)
    {
        if ($response['httpCode'] !== '200') {
            throw new \Exception($response['error'] ?: '未返回错误信息');
        }
        if (!$content = json_decode($response['content'], true)) {
            throw new \Exception(json_last_error_msg());
        }
        if ($content['status'] === 'error') {
            throw new \Exception($content['message'], $content['errorCode'] ?? 0);
        }
        if ($content['status'] !== 'OK') {
            throw new \Exception('未知错误', $content['errorCode'] ?? 0);
        }
        if (!$content['signedValue']) {
            throw new \Exception('获取返回数据为空');
        }
        if (!$content['sign']) {
            throw new \Exception('获取返回签名数据为空');
        }
        if (!AllInPayUtil::validSign($content['signedValue'], $content['sign'])) {
            throw new \Exception('验签失败');
        }
        return json_decode($content['signedValue'], true);
    }

    /**
     * Author:LazyBench
     *
     * @param $rps
     * @param $timestamp
     * @param $sign
     * @return array | mixed
     * @throws \Exception
     */
    public function callBackRequest($rps, $timestamp, $sign)
    {
        if (!$rps) {
            throw new \Exception('rps 不能为空');
        }
        if (!$return = json_decode($rps, true)) {
            throw new \Exception(json_last_error_msg());
        }
        $value = AllInPayUtil::getSysId().$rps.$timestamp;
        if (!AllInPayUtil::validSign($value, $sign)) {
            throw new \Exception('验签失败');
        }
        return $return;
    }
}
