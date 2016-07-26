<?php
/**
 * 此文件为演示用，实际使用时可以自由修改；
 *
 * @author: lion
 * @blog: 『一派良言』http://lionsay.com
 */

include realpath(dirname(__FILE__)) . '/library/authorize.php';

$appId = 'wxdc2357941bd63782';
$redirectUrl = array('test' => 'http://www.lionsay.com/?a=123&b=value1');

$authorize = new \lion\weixin\library\Authorize($appId, false);
$authorize->redirectWithCode($redirectUrl, '__r');
