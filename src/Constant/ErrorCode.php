<?php
/**
 * Created by PhpStorm.
 * Email:jwy226@qq.com
 * User: LazyBench
 * Date: 2020/3/24
 * Time: 11:58
 */

namespace LazyBench\AllInPay\Constant;


class ErrorCode
{
    public const codes = [
        10000 => '参数错误',
        10001 => '参数不能为空',
        10002 => '参数 service 错误',
        10003 => '参数 method 错误',
        10004 => '参数长度超长',
        //应用类错误
        20000 => '应用不存在',
        20001 => '应用没有开通 B2C 模式',
        20002 => '应用没有开通跨应用转账',
        20003 => '应用没有权限使用此接口',
        20004 => '用户没有开通密码确认支付',
        20005 => '用户没有开通三要素绑卡',
        20006 => '解码错误',
        20007 => '超了个人绑卡设置的数量',
        20008 => '小 B 绑个人卡权限没有开启或设置',
        20009 => '渠道商户信息错误',
        20010 => '密码错误',
        20011 => '验证码错误',
        20012 => '不支持的证件类型',
        20013 => '不支持的请求来源（如手机、PC）',
        20014 => '银行代码错误',
        20015 => '过期时间设置错误',
        20016 => '加密失败',
        20017 => '解密失败',
        20018 => '签名失败',
        20019 => '签名验证失败',
        20020 => '该银行卡不支持提现或代付/解码错误',
        20021 => '缓存操作错误',
        20022 => '请求流水重复',
        20023 => '商户系统用户标识错误',
        //用户类错误
        30000 => '用户已经存在',
        30001 => '用户不存在',
        30002 => '用户已经被锁',
        30003 => '用户已经激活',
        30004 => '用户已经是开发者',
        30005 => '用户不是开发者',
        30006 => '用户类型不正确',
        30007 => '用户已经实名认证',
        30008 => '用户还未实名认证',
        30009 => '验证实名信息失败',
        30010 => '用户已经设置登录短信通知',
        30011 => '用户已经设置登录邮箱通知',
        30012 => '身份证验证失败',
        30013 => '模板类型错误',
        30014 => '绑定银行卡失败',
        30015 => '解绑银行卡失败',
        30016 => '银行卡绑定记录不存在',
        30017 => '该银行卡已绑定',
        30018 => '账户集错误',
        30019 => '账户集不存在',
        30020 => '邮箱已经存在',
        30021 => '未绑定手机',
        30022 => '用户不可用',
        30023 => '企业会员已审核',
        30024 => '已绑定手机',
        30025 => '安全卡必需是借记卡',
        30026 => '安全卡已存在',
        30027 => '安全卡不可解绑',
        30028 => '设置安全卡失败',
        30029 => '未设置安全卡不能提现',
        30030 => '未设置企业信息',
        30031 => '支付密码已设置',
        30032 => '支付密码未设置',
        30033 => '支付密码错误超限制',
        30034 => '银行卡未完成签约认证',
        30035 => '已进行实名认证',
        30036 => '未设置会员安全等级',
        30037 => '会员安全等级低，不支持当前操作',
        30038 => '该条实名付记录不存在或者已经确认',
        30039 => '银行卡未完成实名付验证',
        30040 => '卡类型不正确',
        30041 => '银行卡未绑定手机号',
        30042 => '企业认证失败',
        30043 => '会员已签订电子协议',
        30044 => '该银行卡不存在',
        30045 => '该银行卡未绑定',
        30046 => '会员未签订电子协议',
        30047 => '暂不支持该银行卡',
        30048 => '会员未开通理财账户',
        30049 => '卡 bin 在卡 bin 表中不存在',
        30050 => '企业会员未审核',
        30051 => '账户集不支持查询',
        30052 => '余额转账协议已签约',
        30053 => '余额支付协议不存在',
        30054 => '协议信息不匹配',
        30055 => '协议为解约状态，无需解约',
        30056 => '协议状态错误',
        30057 => '用户应用不匹配',
        30058 => '收款人不存在',
        30059 => '收款人不能为平台',
        30060 => '该特权会员没有调用权限',
        //订单类错误
        40000 => '订单不存在',
        40001 => '商品类型不匹配',
        40002 => '订单错误',
        40003 => '订单已过期',
        40004 => '订单不是未支付状态',
        40005 => '订单金额和支付金额不一致',
        40006 => '支付失败',
        40007 => '商品已存在',
        40008 => '商品类型不存在',
        40009 => '没有可用的支付通道',
        40010 => '交易类型不存在',
        40011 => '准备金账户手续费不足',
        40012 => '不支持信用卡',
        40013 => '商品录入失败',
        40014 => '账户余额不足',
        40015 => '交易规则限制',
        40016 => '手续费大于金额',
        40017 => '订单已经存在',
        40018 => '订单类型错误',
        40019 => '订单状态错误',
        40020 => '订单金额错误',
        40021 => '强实名认证错误',
        40022 => '订单和用户不匹配',
        40023 => '退款类型 refundType 取值有误',
        40025 => '应用的支付通道配置不存在',
        40026 => '没有支付权限',
        40027 => '没有设置提现支付方式',
        40028 => '交易验证方式错误',
        40029 => 'URL 格式错误',
        40030 => '出金支付通道会计科目未配置',
        40031 => '手续费未设置',
        40032 => '通道银行未设置',
        40033 => '订单确认重复',
        40034 => '支付通道属性不匹配',
        40035 => '提现只支持 T0T1',
        40036 => '缺少支付行号',
        40037 => '支付行号格式错误',
        40039 => '原订单不支持退款，请联系商户处理',
        40040 => '代收订单金额不足',
        40041 => '原订单未完成支付，无法发起退款',
        40042 => '该提现方式不支持',
        40043 => '该提现方式没有权限',
        40044 => '日期格式有误',
        40045 => '风控超限单日累计笔数',
        40046 => '风控限制订单单笔金额',
        40047 => '风控超限单日累计金额',
        //账户类错误
        50001 => '账户余额不足',
        50002 => '账户已冻结',
        50003 => '冻结余额不足',
        50004 => '冻结记录不存在',
        50005 => '内部账户对应的会员或账户类型不一致',
        50006 => '账户不存在',
        9000 => '其他错误',
        9100 => '未知错误',
        9200 => '数据库错误',
        9300 => '外部错误',
        9400 => '请求超时',
        9500 => 'http 通信错误(通信过程出错或返回码不为 200)',
        9501 => '万小宝外部接口 http 通信过程出错',
        9502 => '万小宝外部接口 http 返回码不为 200',
        9600 => '万小宝文件下载失败',
        9999 => '系统错误',
    ];
}