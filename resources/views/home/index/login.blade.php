<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<script type="text/javascript" src="/home/js/jquery.js"></script>
		<link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/home/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form action="/home/register/login" method="post" onsubmit="return false">
                	{{csrf_field()}}

							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="user" id="user" placeholder="邮箱/手机/用户名">
                 </div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwd" id="pwd" placeholder="请输入密码">
                 </div>

                 <div class="am-cf">
									<input type="submit" name="" id="dl" value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
              </form>
           </div>
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="/home/register/index" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>
		<script >
				$("#dl").click( function () {

						name = $('#user').val();
						pwd = $('#pwd').val();

					if(pwd == ""){//密码为空的情况下输入以下代码
						alert ("请输入密码");return false;
					}

					if(name == ""){//用户名为空的情况下输入以下代码
						alert ("请输入用户名");return false;
					}

					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});

					$.ajax({
						type:'post',//提交方式
						dataType:'json',				//数据类型
						data:{'name':name,'pwd':pwd},//提交的数据
						url:'/home/register/login',//提交的地址
						success:function(res){//返回值的方法用res接收
							console.log(res);
							if(res.error==1){
								alert(res.msg);//msg在控制器里面已经定义
							}else if(res.error == 0){
								alert(res.msg);
								window.location = '/';
							}
						}
					})
					


			}); 


			
			
		</script>
	</body>
</html>