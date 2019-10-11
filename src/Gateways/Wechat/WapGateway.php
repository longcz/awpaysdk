<?php

// +----------------------------------------------------------------------
// | awpaysdk
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/longcz/awpaysdk
// +----------------------------------------------------------------------


namespace Pay\Gateways\Wechat;

use Pay\Gateways\Wechat;

/**
 * 微信WAP网页支付网关
 * Class WapGateway
 * @package Pay\Gateways\Wechat
 */
class WapGateway extends Wechat
{

    /**
     * 当前操作类型
     * @return string
     */
    protected function getTradeType()
    {
        return 'MWEB';
    }

    /**
     * 应用并生成参数
     * @param array $options
     * @param string $return_url
     * @return string
     * @throws \Pay\Exceptions\GatewayException
     */
    public function apply(array $options = [], $return_url = '')
    {
        $data = $this->preOrder($options);
        $data['mweb_url'] = isset($data['mweb_url']) ? $data['mweb_url'] : '';
        if (empty($return_url)) {
            $return_url = $this->userConfig->get('return_url');
        }
        return $data['mweb_url'] . "&redirect_url=" . urlencode($return_url);
    }
}
