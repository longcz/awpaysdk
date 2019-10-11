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

// 支付参数
$options = [
    'out_trade_no'     => '3412', // 订单号
    'total_fee'        => '1', // 订单金额，**单位：分**
    'body'             => '', // 订单描述
    'spbill_create_ip' => '', // 支付人的 IP
    'auth_code'        => '', // 授权码
];

// 实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('wechat')->gateway('pos')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


