<?php
/**
 * @author: lion
 * @link: http://lionsay.com/codetoany.html
 */

require 'library/Authorize.php';

$appId = 'wx899b56734536e64g';
$authorize = new lion\weixin\library\Authorize($appId);
//$authorize->isHttps = true;
$redirectUrlConfig = [
	'demo1' => 'http://lionsay.com/?abc=123',
	'demo2' => 'https://www.baidu.com/s?wd=codetoany&ie=utf-8',
	'demo3' => 'http://www.lionsay.com',
];
$authorize->authorizeCodeToUrl($redirectUrlConfig, 'auk');
