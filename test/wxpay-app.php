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
    'out_trade_no'     => time(), // 订单号
    'total_fee'        => '101', // 订单金额，**单位：分**
    'body'             => '测试', // 订单描述
    'spbill_create_ip' => '127.0.0.1', // 支付人的 IP
    'notify_url'       => 'http://localhost/notify.php', // 定义通知URL
];

// 实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('wechat')->gateway('app')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


