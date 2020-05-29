<?php
/**
 * 查询账户收支明细
 */

namespace LazyBench\AllInPay\Entity\OrderService;

use LazyBench\AllInPay\Entity\Entity;

class QueryInExpDetail extends Entity
{
    /**
     * 商户系统用户标识
     * @var string
     */
    protected $bizUserId;
    
    /**
     * 开始日期
     * @var string
     */
    protected $dateStart;

    /**
     * 结束日期
     * @var string
     */
    protected $dateEnd;

    /**
     * 起始位置
     * @var int
     */
    protected $startPosition;

    /**
     * 查询条数
     * @var int
     */
    protected $queryNum;

    public function validateEmpty()
    {
        return $this->bizUserId && $this->dateStart && $this->dateEnd && $this->startPosition && $this->queryNum;
    }
}