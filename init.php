<?php

// +----------------------------------------------------------------------
// | awpaysdk
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/longcz/awpaysdk
// +----------------------------------------------------------------------

// 注册类库自动加载, 适用于普通加载
spl_autoload_register(function ($class) {
    if (stripos($class, 'Pay\\') === 0) {
        list($search, $replace) = [['\\', 'Pay/'], ['/', 'src/']];
        $filename = __DIR__ . DIRECTORY_SEPARATOR . str_replace($search, $replace, $class) . '.php';
        file_exists($filename) && include $filename;
    }
});