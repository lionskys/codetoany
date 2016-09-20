# **codetoany**
从微信公众号接口“网页授权获取用户信息”中获取`get参数code`后，再将其通过get方式跳转传递给**任何域名**下的url。解决了在微信公众平台只能设置一个“网页授权回调页面域名”造成的不能将`get参数code`传递给其他多个域名的问题。

## **环境需求**
* php >= 5.4.0；

## 快速使用
1. 假设将微信公众平台中“网页授权回调页面域名”设置为`www.example.com`；
2. 打开`codetoany/getcodetourl.php`，将变量`$appId`的值改成自己的*微信公众号id*；
3. 将codetoany中的所有文件部署到`http://www.example.com/codetoany/`；
4. 微信内或使用<a href="https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1455784140&token=&lang=zh_CN" target="_blank">微信web开发者工具</a>访问`http://www.example.com/codetoany/getcodetourl.php?rk=lionsay`。顺利的话，页面将跳转到类似这样的url：`http://lionsay.com/?a=123&b=test&code=0318PVx00bTFzB1JOny00YMRx008PVxS&state=STATE`。这样就实现了将`get参数code`传递给了**自定义设置的url**：`http://lionsay.com/?a=123&b=test`；

## 深度理解
1. **跳转url**：在`codetoany/getcodetourl.php`中，变量`$redirectUrl`就是跳转url的配置，是一维数组，元素的键作为get参数rk的值，元素的值即为具体的跳转url，`get参数code`将附加到该url中进行跳转。具体跳转到哪一个url由其对应的键决定，而该键将从`get参数rk`中获取。可以设置一个或多个元素；
2. **特殊get参数**：
	* `rk`：rk值的作用是确定具体跳转的url。可以自定义rk这个名称，在`codetoany/getcodetourl.php`中调用类方法`\lion\weixin\library::getCodeToUrl()`时，为其第二个参数传递一个字符串，这个参数的默认值为`rk`；
	* `scope`和`state`：微信公众号接口“网页授权获取用户信息”中的参数scope和state可以作为get参数传递给`codetoany/getcodetourl.php`，进而再传递给该接口。`get参数scope`的默认值为`snsapi_base`，`get参数state`的默认值为`STATE`。参数的含义请参考<a href="http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html" target="_blank">微信公众平台开发者文档</a>；
	* `__lion_from_weixin=yes`：如果不跳转或跳转不合法，url中就会出现此参数，这是程序内部使用的，用户无需关心；
3. **get参数的保持和覆盖**：除了`get参数rk`外，传递给`codetoany/getcodetourl.php`的任何get参数都将继续传递给跳转url。当传递给`codetoany/getcodetourl.php`的get参数与跳转url中的get参数有同名参数时，可以选择是否覆盖，在`codetoany/getcodetourl.php`中调用类方法`\lion\weixin\library::getCodeToUrl()`时，为其第三个参数传递一个布尔值，这个参数的默认值为`false`即不覆盖，但无论如何这三个`get参数code、scope和state`总是强制覆盖；
4. **https**：如果微信公众平台“网页授权回调页面域名”使用**https**方式访问，在`codetoany/getcodetourl.php`中实例化类`\lion\weixin\library\Authorize`时，请务必为其构造函数的第二个参数传递布尔值`true`，这个参数的默认值为`false`即不使用**https**；

## 问题反馈
* 在<a href="https://github.com/weixin-lion/codetoany/issues/" target="_blank" title="github上的codetoany项目的问题收集页">github</a>提交问题（**推荐**）；
* 关注<a href="http://weibo.com/236127789" target="_blank">新浪微博<a>和<a href="http://t.qq.com/lionskys" target="_blank">腾讯微博</a>；
* 在<a href="http://lionsay.com/codetoany.html" target="_blank" title="个人博客上的codetoany项目的问题收集页">一派良言</a>提交留言；
