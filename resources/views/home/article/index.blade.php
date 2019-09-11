<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>猛男的商城网</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/home/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">


			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods"><a href="/">首页</a></span></div>
					   					
		        				
		<div class="am-g am-g-fixed blog-g-fixed bloglist">
  <div class="am-u-md-9">
    <article class="blog-main">
      <h3 class="am-article-title blog-title">
        <a href="#" style="font-size: 35px">{{ $headlines_data->title}}</a>
      </h3>
      <h4 class="am-article-meta blog-meta"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;{{ $headlines_data->auth }}&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;{{ $headlines_data->ctime }}</h4>

      <div class="am-g blog-content">
        <div class="am-u-sm-12">
          <p>{!! $headlines_data->content !!}！</p>



        </div>

      </div>

    </article>


    <hr class="am-article-divider blog-hr">
    
  </div>

  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">

      <section class="am-panel am-panel-default">
        <div style="color: black" class="am-panel-hd">热门话题 <a style="font-size:15px;color: #868686;padding-left: 140px"; href="/index.php/home/article/list">更多...</a></div>
        <ul class="am-list blog-list">
		@foreach($datas $k=>$v)
          <li><a href="/index.php/home/article/index"><p>{{$v->title}}</p></a></li>
		@endforeach


        </ul>
      </section>

    </div>

  </div>

</div>


				</div>

			</div>

		</div>
		<script>
			window.jQuery || document.write('<script src="/home/basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="/home/basic/js/quick_links.js "></script>
	</body>

</html>

