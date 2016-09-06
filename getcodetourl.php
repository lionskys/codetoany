<?php
/**
 * 从微信公众号接口“网页授权获取用户信息”中获取GET参数code后，再将其通过GET方式跳转传递给其他url。
 *
 * @author: lion
 * @blog: http://lionsay.com
 */

require 'library/Authorize.php';

$appId = 'wxdc1a68r17g7a1235';
$authorize = new lion\weixin\library\Authorize($appId);
$redirectUrl = ['lionsay' => 'http://lionsay.com/?a=123&b=test', 'a' => 'http://www.a.com/'];
$authorize->getCodeToUrl($redirectUrl);
