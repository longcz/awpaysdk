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

// 参考请求参数  https://docs.open.alipay.com/203/107090/
$options = [
    'out_trade_no' => time(), // 商户订单号
    'total_amount' => '1', // 支付金额
    'subject'      => '支付订单描述', // 支付订单描述
];

// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = 'http://pay.thinkadmin.top/test/alipay-notify.php';
$config['return_url'] = 'http://pay.thinkadmin.top/test/alipay-success.php';

// 实例支付对象
$pay = new \Pay\Pay($config);

try {
    echo $pay->driver('alipay')->gateway('web')->apply($options);
} catch (Exception $e) {
    echo $e->getMessage();
}


