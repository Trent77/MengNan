<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
<div class="hmtop">
   <!--顶部导航条 -->
   <div class="am-container header">
    <ul class="message-l">
     <div class="topMessage">
      <div class="menu-hd">
       @if(!empty(session('member')))欢迎 {{session('member')->name}}
       <a href="" id="out">退出</a>
       @else<a href="/home/index/login" target="_top" class="h">亲，请登录</a>
       <a href="/home/register/index" target="_top">免费注册</a>
       @endif
      </div>
     </div>
    </ul>
    <script>
     {{--let user = {!! json_encode(session('user')) !!}  //声明一个变量获取session数据--}}
     {{--		// console.log(user);--}}
     $('#out').click(function () {
      let member = {!! json_encode(session('member')) !!}  //声明一个变量获取session数据
      // console.log(user);
      if(member !=''){
       $.get("/home/register/logout",'',function(res) {
        console.log(res)
        if(res.error == 1){
         alert(res.msg);
        }else if(res.error == 0){
         alert(res.msg);
         window.location = '/';
        }
       },'json')
      }

      return false;

     })

    </script>
    <ul class="message-r">
     <div class="topMessage home">
      <div class="menu-hd">
       <a href="/" target="_top" class="h">商城首页</a>
      </div>
     </div>
     <div class="topMessage my-shangcheng">
      <div class="menu-hd MyShangcheng">
       <a href="/home/myself/index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
      </div>
     </div>
     <div class="topMessage mini-cart">
      <div class="menu-hd">
       <a id="mc-menu-hd" href="/home/shopcart/index" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a>
      </div>
     </div>
    </ul>
   </div>
   <!--悬浮搜索框--> 
   <div class="nav white"> 
    <!-- <div class="logo">
     <img src="/home/images/logo.png" />
    </div>  -->
    <div class="logoBig"> 
     <li><img src="/home/images/logobig.png" /></li> 
    </div> 
    <div class="search-bar pr"> 
     <a name="index_none_header_sysc" href="#"></a> 
     <form> 
      <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" /> 
      <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
     </form> 
    </div> 
   </div> 
   <div class="clear"></div> 
  </div>
