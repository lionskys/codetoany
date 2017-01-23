# **CodeToAny**：**一个**微信公众号网页授权给**多个**域名
把从微信网页授权接口中获取到的`授权code`以get参数的形式传递给**任何域名**下的url。

## 联系作者
* 进淘宝店[乐享良品网站开发][1]使用阿里旺旺即时通讯（可能是有偿服务）；
* 在[CodeToAny主页][2]留言；
* 关注[新浪微博][3]和[腾讯微博][4]；
* 在[CodeToAny源码页][5]留言；

## 打赏捐赠
如果您觉得本程序不错，欢迎打赏我给予小小的支持，谢过！！！![握手][6]![坏笑][7]
![支付宝二维码][8] ![微信二维码][9]

## 成功案例
微擎、微赞、discuz插件、wordpress插件

## 环境需求
* php >= 5.4.0（小于5.4.0的情况可以联系作者解决）；

## 极速使用
1. 假设将网页授权回调域名设置为`www.test.com`；
2. 编辑`codetoany/getcode.php`，将变量`$appId`的值修改为自己的`微信公众号AppId`；
3. 将文件夹codetoany中的所有文件部署到`http://www.test.com/codetoany/`；
4. 在微信内或使用微信web开发者工具访问`http://www.test.com/codetoany/getcode.php?auk=demo1`，顺利的话，页面将跳转到类似这样的url：`http://lionsay.com/?abc=123&code=0318PVx00bTFzB1JOny00YMRx008PVxS&state=STATE`；

## 攻略指南
1. `?auk=demo1`中的`auk`、`demo1`以及此时的`授权url`（即接收`授权code`的url，最终跳转的url）都是可以自定义的；
2. 网页授权接口中的get参数`scope`和`state`可以以get参数的形式传递给`codetoany/getcode.php`，程序会把它们再传递给接口；
3. 除了get参数`auk`外，传递给`codetoany/getcode.php`的任何get参数都会以get参数的形式再传递给`授权url`；
4. 如果网页授权回调域名使用`https`协议访问，那么程序需要略微调整才可以正常使用；

## 郑重声明
* 本程序仅供学习研究使用，不得用于非法用途，否则后果自负；
* 对于由本程序导致的一切法律和安全问题，作者不承担任何责任；

[1]: <https://enjoylion.taobao.com> "提供网站开发与维护的有偿服务"
[2]: <http://lionsay.com/codetoany.html> "博客：一派良言"
[3]: <http://weibo.com/236127789/>
[4]: <http://t.qq.com/lionskys/>
[5]: <https://github.com/weixin-lion/codetoany/issues/> "托管于github"
[6]: <http://lionsay.com/asset/image/face/qq/woshou.png> "谢谢"
[7]: <http://lionsay.com/asset/image/face/qq/huaixiao.png> "卖萌"
[8]: <http://lionsay.com/asset/image/qrcode_alipay.jpg> "支付宝扫一扫打赏作者"
[9]: <http://lionsay.com/asset/image/qrcode_weixin.jpg> "微信扫一扫打赏作者"
