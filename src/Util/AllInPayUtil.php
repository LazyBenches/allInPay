<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/2
 * Time: 14:04
 * 签名算法：SHA1WithRSA、MD5
 * 签名密钥：商户私钥。
 * 签名源串：sysid + req + timestamp。
 * 签名步骤：
 * 步骤1：先对签名源串用 MD5 算法进行摘要计算；
 * 步骤2：对步骤 1的返回数据进行 Base64 编码；
 * 步骤3：对步骤 2的返回数据使用商户私钥进行 SHA1WithRSA 算法签名；
 * 步骤4：对步骤 3的返回数据进行 Base64 编码
 *
 *
 */

namespace LazyBench\AllInPay\Util;

use LazyBench\AllInPay\Util\Crypt\Crypt_RSA;
use LazyBench\AllInPay\Util\File\File_X509;

class AllInPayUtil
{
    /**
     * Author:LazyBench
     * 将参数数组签名
     * 签名算法：SHA1WithRSA、MD5
     * 签名密钥：商户私钥。
     * @param array $array
     * @param $privateKey
     * @return string
     */
    protected static $publicKey = '';
    protected static $privateKey = '';
    protected static $sysId = '';
    protected static $timestamp = '';
    protected static $service = '';
    protected static $method = '';
    protected static $escrowAccount = '';
    protected static $uuid = '';

    public static function getService(): string
    {
        return self::$service;
    }

    public static function getMethod(): string
    {
        return self::$method;
    }

    public static function setService($service)
    {
        return self::$service = $service;
    }

    public static function setMethod($method)
    {
        return self::$method = $method;
    }


    public static function getPublicKey()
    {
        return self::$publicKey;
    }

    public static function setPublicKey($publicKey)
    {
        self::$publicKey = $publicKey;
    }

    public static function getPrivateKey()
    {
        return self::$privateKey;
    }

    /**
     * Author:LazyBench
     *
     * @param string $privateKeyPath
     * @param $password
     */
    public static function setPrivateKey(string $privateKeyPath, $password)
    {
        self::$privateKey = self::loadPrivateKey($privateKeyPath, $password);
    }

    public static function getSysId()
    {
        return self::$sysId;
    }

    public static function setSysId($sysId)
    {
        self::$sysId = $sysId;
    }

    public static function setTimestamp($timestamp = null)
    {
        self::$timestamp = $timestamp ?: date('Y-m-d H:i:s');
    }

    public static function getTimestamp()
    {
        return self::$timestamp;
    }

    public static function setEscrowAccount($escrowAccount)
    {
        self::$escrowAccount = $escrowAccount;
    }

    public static function getEscrowAccount()
    {
        return self::$escrowAccount;
    }

    public static function setUUID(string $uuid)
    {
        return self::$uuid = $uuid;
    }

    public static function getUUID()
    {
        return self::$uuid;
    }

    /**
     * Author:LazyBench
     *
     * 签名源串：sysid + req + timestamp
     * 签名步骤：
     * 步骤1：先对签名源串用 MD5 算法进行摘要计算；
     * 步骤2：对步骤 1的返回数据进行 Base64 编码；
     * 步骤3：对步骤 2的返回数据使用商户私钥进行 SHA1WithRSA 算法签名；
     * 步骤4：对步骤 3的返回数据进行 Base64 编码
     * @param $req
     * @return string
     */
    public static function sign(string $req)
    {
        $sign = base64_encode(self::getSignature(base64_encode(hash('md5', self::sourceString($req), true))));
        return $sign;
    }

    /**
     * Author:LazyBench
     *
     * @param $sign
     * @return mixed
     */
    public static function getSignature(string $sign)
    {

        $privateKey = openssl_pkey_get_private(self::$privateKey);
        openssl_sign($sign, $signature, $privateKey);
        openssl_free_key($privateKey);
        return $signature;
    }

    public static function verifySign($newSign, $oldSign)
    {
        $x509 = new File_X509();//请自行去github下载;
        $x509->loadX509(self::$publicKey);
        $publicKey = $x509->getPublicKey();
        $rsa = new Crypt_RSA();
        $rsa->loadKey($publicKey); // public key
        $rsa->setSignatureMode(CRYPT_RSA_SIGNATURE_PKCS1);
        return $rsa->verify($newSign, $oldSign);
    }

    /**
     * Author:LazyBench
     *
     * @param $value
     * @return string
     */
    public static function sourceString(string $value)
    {
        return self::$sysId.$value.self::$timestamp;
    }

    /**
     * Author:LazyBench
     *
     * @param array $array
     * @return string
     */
    public static function toUrlParams(array $array)
    {
        $buffer = '';
        foreach ($array as $k => $v) {
            if ($v !== '' && !is_array($v)) {
                $buffer .= $k.'='.urlencode($v).'&';
            }
        }
        return trim($buffer, '&');
    }

    /**
     * Author:LazyBench
     *
     * sysid + rps + timestamp
     * 步骤1：先对签名源串用 MD5 算法进行摘要计算；
     * 步骤2：对步骤 1的返回数据进行 Base64 编码；
     * 步骤3：对响应报文中的签名串 sign进行 Base64 解码；
     * 步骤4：对步骤 2、3的返回数据使用通联公钥进行 SHA1WithRSA 算法验签。
     * @param string $value
     * @param string $oldSign
     * @return bool
     */
    public static function validSign(string $value, string $oldSign)
    {
        return self::verifySign(base64_encode(hash('md5', $value, true)), base64_decode(trim($oldSign)));
    }

    /**
     * Author:LazyBench
     * 从证书文件中装入私钥 pem格式;
     * @param $path
     * @param $password
     * @return bool|mixed|resource
     */
    protected static function loadPrivateKey($path, $password)
    {
        //        $str = explode('.', $path);
        //        $suffix = $str[count($str) - 1];
        $suffix = pathinfo($path, PATHINFO_EXTENSION);
        if ($suffix === 'pfx') {
            return self::loadPrivateKeyByPfx($path, $password);
        }
        if ($suffix === 'pem') {
            return self::loadPrivateKeyByPem($path, $password);
        }
        return false;
    }

    /**
     * Author:LazyBench
     * 从证书文件中装入私钥 Pfx 文件格式
     * @param $path
     * @param $password
     * @return mixed
     */
    private static function loadPrivateKeyByPfx($path, $password)
    {
        if (file_exists($path)) {
            $priKey = file_get_contents($path);
            if (openssl_pkcs12_read($priKey, $certs, $password)) {
                return $certs['pkey'];
            }
            return false;
        }
        return false;
    }


    protected static function loadPrivateKeyByPem($path, $password)
    {
        $res = openssl_get_privatekey(file_get_contents($path), $password);
        if (!$res) {
            return false;
        }
        return $res;
    }

    /**
     * Author:LazyBench
     *
     * @param $value
     * @return string
     */
    public static function rsaEncode($value)
    {
        $x509 = new File_X509();
        $x509->loadX509(self::$publicKey);
        $publicKey = $x509->getPublicKey();
        $encrypted = '';
        openssl_public_encrypt($value, $encrypted, $publicKey);
        return strtoupper(bin2hex($encrypted));
    }

    /**
     * Author:LazyBench
     *
     * @param $value
     * @return bool
     */
    public static function rsaDecode($value)
    {
        $data = self::hex2String($value);
        $privateKey = self::getPrivateKey();
        if (!openssl_private_decrypt($data, $decrypt_data, $privateKey, OPENSSL_PKCS1_PADDING)) {
            //            echo "<br/>ErrorMsg====".openssl_error_string()."<br/>";
            return false;
        }
        return $decrypt_data;
    }

    /**
     * Author:LazyBench
     *
     * @param $hex
     * @return string
     */
    public static function hex2String($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i].$hex[$i + 1]));
        }
        return $string;
    }
}
