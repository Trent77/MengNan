<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
  </head>
  
  <body>
    <div class="login-boxtitle">
      <a href="home/demo.html">
        <img alt="" src="/home/images/logobig.png" /></a>
    </div>
    <div class="res-banner">
      <div class="res-main">
        <div class="login-banner-bg">
          <span></span>
          <img src="/home/images/big.jpg" /></div>
        <div class="login-box">
          <div class="am-tabs" id="doc-my-tabs">
            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
              <li class="am-active">
                <a href="/home/register/index">邮箱注册</a></li>
              <li>
                <a href="/home/register/index">手机号注册</a></li>
            </ul>
            <div class="am-tabs-bd">
              <div class="am-tab-panel am-active">
                <form method="post" action="/home/register/store" onsubmit=" ">{{csrf_field()}}
                  <div class="user-email">
                    <label for="email">
                      <i class="am-icon-envelope-o"></i></label>
                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号"></div>
                  <div class="user-pass">
                    <label for="pwd">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd" id="pwd" placeholder="设置密码">
                </div>
                  <div class="user-pass">
                    <label for="pwd2">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd2" id="pwd2" placeholder="确认密码">
                  </div>
                  <div class="am-cf">
                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                <!-- <div class="login-links">
                <label for="reader-me">
                <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                </label>
                </div> -->
              </div>
              <div class="am-tab-panel">
                <form method="post" action="/home/register/phone">
                	{{csrf_field()}}
                  <div class="user-phone">
                    <label for="phone">
                      <i class="am-icon-mobile-phone am-icon-md"></i></label>
                    <input type="text" name="phone" id="phone" placeholder="请输入手机号">
                  </div>
                  <div class="verification">
                    <label for="code">
                      <i class="am-icon-code-fork"></i>
                    </label>
                    <input type="text" name="yzm" id="yzm" placeholder="请输入验证码">
                    <a class="btn" href="javascript:void(0);" onClick="" id="huoq">
                      <span id="dyMobileButton"  >获取</span></a>
                      <!-- <input type="hidden" id="cookie" name="cookie" value=""> -->
                  </div>
                  <div class="user-pass">
                    <label for="pwd3">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd" id="pwd3" placeholder="设置密码"></div>
                  <div class="user-pass">
                    <label for="pwd4">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd4" id="pwd4" placeholder="确认密码"></div>
                  <div class="am-cf">
                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                <!-- <div class="login-links">
                <label for="reader-me">
                <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                </label>
                </div> -->
                <hr></div>
              <script>$(function() {
                  $('#doc-my-tabs').tabs();
                })</script>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
            $("#huoq").click(  //获取按钮点击
                function(){    //方法
            

                  var phone = $("#phone").val();   //取货id为phone的值，返回声明一个变量
                  var reg = /^((1[3,5,8][0-9])|(14[5,7])|(17[0,6,7,8])|(19[7]))\d{8}$/; //正则表达式，规定输入的手机号码，返回声明一个变量
                  if(!reg.test(phone)){   //判定，不是reg规则下面的phone，输出以下代码
                    alert('请出入正确手机号');
                  }else{//否则输出输出以下
                      $('#dyMobileButton').text('已发送')
                      $.get("http://www.mn.com/sms",{ph:phone},function(data){
                          // $("#cookie").val(sum);      //把获得的验证码放到隐藏控件
                          // console.log(data);
                          // console.log($("#cookie").val(sum));     
                      })
                  }
                }
              );


              // var wait=60;
              //     function time(o) {
              //         if (wait == 0) {
              //             o.removeAttribute("disabled");
              //             o.dyMobileButton="发送验证码";
              //             wait = 60;
              //         } else {
                 
              //             o.setAttribute("disabled", true);
              //             o.dyMobileButton="重新发送(" + wait + ")";
              //             wait--;
              //             setTimeout(function() {
              //                     time(o)
              //                 },
              //                 1000)
              //         }
              //     }

              //     document.getElementById("huoq").οnclick=function(){time(this);}



            

      </script>

      <!-- <div class="footer ">
      <div class="footer-hd ">
      <p>
      <a href="# ">恒望科技</a>
      <b>|</b>
      <a href="# ">商城首页</a>
      <b>|</b>
      <a href="# ">支付宝</a>
      <b>|</b>
      <a href="# ">物流</a></p>
      </div>
      <div class="footer-bd ">
      <p>
      <a href="# ">关于恒望</a>
      <a href="# ">合作伙伴</a>
      <a href="# ">联系我们</a>
      <a href="# ">网站地图</a>
      <em>© 2015-2025 Hengwang.com 版权所有</em></p>
      </div>
      </div> -->
  </body>
</html>