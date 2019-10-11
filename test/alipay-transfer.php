<?php

// +----------------------------------------------------------------------
// | awpaysdk
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/longcz/awpaysdk
// +----------------------------------------------------------------------


include '../init.php';

// 加载配置参数
$config = require(__DIR__ . '/config.php');

// 实例支付对象
$pay = new \Pay\Pay($config);

// 支付宝转账参数
$options = [
    'out_biz_no'      => '', // 订单号
    'payee_type'      => 'ALIPAY_LOGONID', // 收款方账户类型(ALIPAY_LOGONID | ALIPAY_USERID)
    'payee_account'   => 'demo@sandbox.com', // 收款方账户
    'amount'          => '10', // 转账金额
    'payer_show_name' => '未寒', // 付款方姓名
    'payee_real_name' => '张三', // 收款方真实姓名
    'remark'          => '张三', // 转账备注
];

try {
    $result = $pay->driver('alipay')->gateway('transfer')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}

