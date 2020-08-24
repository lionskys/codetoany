<?php
/**
 * @author: lion
 */

require 'library/Authorize.php';

$appId = 'wx506a80282805f83c';
$authorize = new lion\weixin\library\Authorize($appId);
$redirectUrlConfig = [
	'demo1' => 'http://lionsay.com/?abc=123',
	'demo2' => 'https://www.baidu.com/s?wd=codetoany&ie=utf-8',
	'demo3' => 'http://www.lionsay.com',
];
$authorize->authorizeCodeToUrl($redirectUrlConfig);
