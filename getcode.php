<?php
/**
 * @author: lion
 * @link: http://lionsay.com/codetoany.html
 */

require 'library/Authorize.php';

$appId = 'wxdc1a68r17g7a1235';
$authorize = new lion\weixin\library\Authorize($appId);
//$authorize->isHttps = true;
$redirectUrlConfig = [
	'demo1' => 'http://lionsay.com/?abc=123',
	'demo2' => 'https://www.baidu.com/s?wd=codetoany&ie=utf-8',
	'demo3' => 'http://www.qq.com',
];
$authorize->authorizeCodeToUrl($redirectUrlConfig, 'auk');
