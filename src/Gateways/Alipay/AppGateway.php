<?php

// +----------------------------------------------------------------------
// | awpaysdk
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/longcz/awpaysdk
// +----------------------------------------------------------------------


namespace Pay\Gateways\Alipay;

use Pay\Gateways\Alipay;

/**
 * 支付宝App支付网关
 * Class AppGateway
 * @package Pay\Gateways\Alipay
 */
class AppGateway extends Alipay
{

    /**
     * 当前接口方法
     * @return string
     */
    protected function getMethod()
    {
        return 'alipay.trade.app.pay';
    }

    /**
     * 当前接口产品码
     * @return string
     */
    protected function getProductCode()
    {
        return 'QUICK_MSECURITY_PAY';
    }

    /**
     * 应用并返回参数
     * @param array $options
     * @return string
     */
    public function apply(array $options = [])
    {
        parent::apply($options);
        return http_build_query($this->config);
    }
}
