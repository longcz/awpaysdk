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
    'partner_trade_no' => time(),
    'enc_bank_no'      => '6212263602037318102',
    'enc_true_name'    => '邹景立',
    'bank_code'        => '1002',
    'amount'           => '100',
    'desc'             => '打款测试',
];

// 实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('wechat')->gateway('bank')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// 查询打款状态
try {
    $reuslt = $pay->driver('wechat')->gateway('bank')->find($options['partner_trade_no']);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}


