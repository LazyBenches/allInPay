<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/2
 * Time: 16:57
 */

namespace LazyBench\AllInPay\Util;

class Curl
{
    private $ch;
    private $httpParams;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    /**
     * 设置http header
     * @param $header
     * @return $this
     */
    public function setHeader($header)
    {
        if (is_array($header)) {
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
        }
        return $this;
    }

    /**
     * Author:LazyBench
     * 设定 HTTP 请求中"Cookie: "部分的内容。多个 cookie 用分号分隔，分号后带一个空格
     * @param $cookie
     * @return $this
     */
    public function setCookie($cookie): Curl
    {
        if (is_string($cookie)) {
            curl_setopt($this->ch, CURLOPT_COOKIEFILE, $cookie);
        }
        return $this;
    }

    /**
     * Author:LazyBench
     * 保存cookie到文件
     * @param $cookieFile
     * @return Curl
     */
    public function saveCookie($cookieFile): Curl
    {
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $cookieFile);
        return $this;
    }

    /**
     * 设置http 超时
     * @param int $time
     * @return $this
     */
    public function setTimeout($time = 5): Curl
    {
        $time = $time <= 0 ? $time : 5;
        curl_setopt($this->ch, CURLOPT_TIMEOUT, $time);
        return $this;
    }


    /**
     * 设置http 代理
     * @param string $proxy
     * @return $this
     */
    public function setProxy($proxy): Curl
    {
        if ($proxy) {
            curl_setopt($this->ch, CURLOPT_PROXY, $proxy);
        }
        return $this;
    }

    /**
     * 设置端口
     * @param $port
     * @return $this
     */
    public function setPort($port): Curl
    {
        if ($port) {
            curl_setopt($this->ch, CURLOPT_PORT, $port);
        }
        return $this;
    }

    /**
     * 设置http 代理端口
     * @param int $port
     * @return $this
     */
    public function setProxyPort($port): Curl
    {
        if (is_int($port)) {
            curl_setopt($this->ch, CURLOPT_PROXYPORT, $port);
        }
        return $this;
    }

    /**
     * 设置来源页面
     * @param string $referer
     * @return $this
     */
    public function setReferer($referer = ''): Curl
    {
        if (!empty($referer)) {
            curl_setopt($this->ch, CURLOPT_REFERER, $referer);
        }
        return $this;
    }

    /**
     * 设置用户代理
     * @param string $agent
     * @return $this
     */
    public function setUserAgent($agent = 'yunjinwuheng'): Curl
    {
        if ($agent) {
            // 模拟用户使用的浏览器
            curl_setopt($this->ch, CURLOPT_USERAGENT, $agent);
        }
        return $this;
    }

    /**
     * http响应中是否显示header，1表示显示
     * @param $show
     * @return $this
     */
    public function showResponseHeader($show): Curl
    {
        curl_setopt($this->ch, CURLOPT_HEADER, $show);
        return $this;
    }


    /**
     * 设置http请求的参数,get或post
     * @param array $params
     * @return $this
     */
    public function setParams($params): Curl
    {
        $this->httpParams = $params;
        return $this;
    }

    /**
     * Author:LazyBench
     * 设置证书路径
     * @param $file
     * @return Curl
     */
    public function setCaInfo($file): Curl
    {
        curl_setopt($this->ch, CURLOPT_CAINFO, $file);
        return $this;
    }


    /**
     * 模拟GET请求
     * @param string $url
     * @param string $dataType
     * @return bool|mixed
     */
    public function get($url, $dataType = 'text')
    {
        if (!empty($this->httpParams) && is_array($this->httpParams)) {
            if (strpos($url, '?') !== false) {
                $url .= http_build_query($this->httpParams);
            } else {
                $url .= '?'.http_build_query($this->httpParams);
            }
        }
        $this->requestPrepare($url);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        return $this->handleResponse($dataType);
    }


    /**
     * 模拟POST请求
     *
     * @param string $url
     * @param string $dataType
     * @return mixed
     */
    public function post($url, $dataType = 'text')
    {
        $this->requestPrepare($url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        if (!empty($this->httpParams)) {
            if (is_string($this->httpParams)) {
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->httpParams);
            }
            if (is_array($this->httpParams)) {
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($this->httpParams));
            }
        }
        return $this->handleResponse($dataType);
    }

    protected function requestPrepare($url)
    {
        if (stripos($url, 'https://') !== false) {
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($this->ch, CURLOPT_SSLVERSION, 1);
        }
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * Author:LazyBench
     *
     * @param string $dataType
     * @return array
     */
    protected function handleResponse($dataType = 'text'): array
    {
        $content = curl_exec($this->ch);
        $status = curl_getinfo($this->ch);
        $error = curl_error($this->ch);
        $errorNo = curl_errno($this->ch);
        curl_close($this->ch);
        $httpCode = (string)($status['http_code'] ?? '500');
        $dataType === 'json' && $content && $content = json_decode($content, true);
        return [
            'httpCode' => $httpCode,
            'error' => $error,
            'errNo' => $errorNo,
            'content' => $content,
        ];
    }
}
