<?php
/**
 * 网页授权获取用户信息类
 * >>从微信接口“网页授权获取用户信息”中获取到code参数后，再将其值通过GET方式跳转传递给任何url。有效解决了在微信公众平台开发者中心“网页授权回调页面域名”只能设置一个的问题；
 * >>“网页授权回调页面域名”支持https方式；
 *
 * @author: lion
 * @blog: 『一派良言』http://lionsay.com
 */

namespace lion\weixin\library;

class Authorize
{
	// string: 微信公众账号id
	private $_appId;

	// boolean: “网页授权回调页面域名”是否为https方式，默认为false
	private $_https;

	/**
	 * @param string $appId: 参见类属性$_appId
	 * @param boolean $https: 参见类属性$_https
	 */
	public function __construct($appId, $https = false)
	{
		$this->_appId = $appId;
		$this->_https = $https;
	}

	/**
	 * 构建url请求字符串
	 *
	 * @param array $param: 需要构建的参数，如array('a' => 123, 'b' => 'test')
	 * @return string: 如a=123&b=test
	 */
	public function buildQuery($param)
	{
		$query = '';
		foreach ($param as $k => $v) {
			$query .= "$k=$v&";
		}
		$query = rtrim($query, '&');
		return $query;
	}

	/**
	 * 从微信接口“网页授权获取用户信息”中获取到code参数后，再将其值通过GET方式跳转传递给任何url；
	 * >>GET参数名__r可自定义；
	 * >>支持微信接口“网页授权获取用户信息”中两个有特殊含义的GET参数scope和state；
	 * >>跳转过程GET参数不丢失（除__r外）；
	 *
	 * @param array $redirectUrl: 接收code参数的url，即元素的值。元素的键名应等于$redirectUrlGetParamName对应的GET参数的值，
	 * 	如$redirectUrl为array('lionsay' => 'http://lionsay.com?a=123&b=test')，则$_GET['__r']应为'lionsay'，接收code参数的url为http://lionsay.com?a=123&b=test
	 * @param string $redirectUrlGetParamName: 定位“接收code参数的url”时用到的GET参数名
	 */
	public function redirectWithCode($redirectUrl = array(), $redirectUrlGetParamName = '__r')
	{
		$finalRedirectUrl = '';
		if (isset($_GET['code'])) {
			if (!empty($redirectUrl[$_GET[$redirectUrlGetParamName]])) {
				$finalRedirectUrl = $redirectUrl[$_GET[$redirectUrlGetParamName]];
				$newGetParam = array();
				$filterParamName = array($redirectUrlGetParamName);
				foreach ($_GET as $k => $v) {
					if (!in_array($k, $filterParamName) && !preg_match("/\?.*{$k}\=/i", $finalRedirectUrl)) {
						$newGetParam[$k] = $v;
					}
				}
				if ($newGetParam) {
					$finalRedirectUrl .= (strpos($finalRedirectUrl, '?') === false ? '?' : '&') . $this->buildQuery($newGetParam);
				}
			}
		} else {
			$apiParam['appid'] = $this->_appId;
			$apiParamState = empty($_GET['state']) ? 'state' : $_GET['state'];
			unset($_GET['state']);
			$apiParamRedirectUrl = explode('?', $_SERVER['REQUEST_URI']);
			$apiParamRedirectUrl = $apiParamRedirectUrl[0];
			$apiParamRedirectUrl = 'http' . ($this->_https ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $apiParamRedirectUrl;
			$apiParamRedirectUrl .= $_GET ? '?' . $this->buildQuery($_GET) : '';
			$apiParam['redirect_uri'] = urlencode($apiParamRedirectUrl);
			$apiParam['response_type'] = 'code';
			$apiParam['scope'] = empty($_GET['scope']) ? 'snsapi_base' : $_GET['scope'];
			$apiParam['state'] = "{$apiParamState}#wechat_redirect";
			$finalRedirectUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?' . $this->buildQuery($apiParam);
		}

		if ($finalRedirectUrl) {
			header("Location: $finalRedirectUrl");
		}
	}
}
