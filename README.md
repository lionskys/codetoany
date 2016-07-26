# codetoany
从微信接口“网页授权获取用户信息”中获取到code参数后，再将其值通过GET方式跳转传递给任何url。有效解决了在微信公众平台开发者中心“网页授权回调页面域名”只能设置一个的问题。


# 更多功能
* GET参数名`__r`可自定义；
* 支持微信接口“网页授权获取用户信息”中两个有特殊含义的GET参数scope和state；
* 跳转过程GET参数不丢失（除`__r`外）；
* “网页授权回调页面域名”支持https方式；


# 使用帮助

#### **一些假设**
* 微信公众平台开发者中心将“网页授权回调页面域名”设置为`www.example.com`这个域名；
* codetoany代码部署到`http://www.example.com/weixin/`这个目录；
* 将code参数值传递给`http://www.lionsay.com/?a=123&b=value1`这个url；
* 使用“微信web开发者工具”进行调试，工具地址为`https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1455784140&token=&lang=zh_CN`；

#### **快速使用**
1. demo.php中将变量`$appId`修改成您自己的微信公众号id；
2. “微信web开发者工具”内访问`http://www.example.com/weixin/demo.php?__r=test`；
3. 注意观察页面地址的变化；

#### **其他设置**
* GET参数名`__r`可自定义，如demo.php中`$authorize->redirectWithCode($redirectUrl, 'redirectkey')`将第二个参数将设置成`redirectkey`，访问地址就变成了`http://www.example.com/weixin/demo.php?redirectkey=test`；
* `__r`的取值以及接收code参数的url可自定义，如demo.php中将`$redirectUrl`设置为`array('abc' => 'finalUrl')`，则`__r=abc`，接收code参数的url为`finalUrl`；
* 当“网页授权回调页面域名”为https方式时，在实例化类`\lion\weixin\library\Authorize`的时候，请将第二个参数设为`true`，如demo.php中`new \lion\weixin\library\Authorize($appId, true)`；
* 支持微信接口“网页授权获取用户信息”中两个有特殊含义的GET参数scope和state。例如以下url都是合法的：

	`http://www.example.com/weixin/demo.php?__r=test&scope=snsapi_userinfo`

	`http://www.example.com/weixin/demo.php?__r=test&state=codetest`

	`http://www.example.com/weixin/demo.php?__r=test&scope=snsapi_userinfo&state=codetest`


# 问题反馈
* 在一派良言`http://lionsay.com`留言；
* 发邮件至`lionskys[at]126.com`；
