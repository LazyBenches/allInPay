<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/26
 * Time: 14:09
 */

namespace LazyBench\AllInPay\Entity\OrderService;


use LazyBench\AllInPay\Entity\Entity;

class ApplicationTransfer extends Entity
{
    protected $bizTransferNo;// 商户系统转账订单号，商户系统唯一String 是
    protected $sourceAccountSetNo;//源账户集编号 String 通商云统一的标准账户集合的编号。详细是
    protected $targetBizUserId;//目标商户系统用户标识，商户系统中唯一编号。String 收款会员的 BizUserId 是
    protected $targetAccountSetNo;//目标账户集编号 String 通商云分配的托管专用账户集的编号是
    protected $amount;//金额 Long 单位：分。 是

    //    protected $extendInfo;//扩展信息 String 最多 200 个字符，商户拓展参数，用于透传给商户，不可包含“|”特殊字符否

    public function validateEmpty()
    {
        if (is_string($this->amount)) {
            return false;
        }
        return $this->bizTransferNo && $this->amount && $this->sourceAccountSetNo && $this->targetBizUserId && $this->targetAccountSetNo;
    }
}