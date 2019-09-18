<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/jquery.js"></script>

	</head>

	<body>

		@include('home.index.hmtop')

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					
					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="clear"></div>
							<div class="bundle-main" id="app">
								@foreach($shopcart as $k=>$v)
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" id="J_CheckBox_170769542747" name="items[]" value="170769542747" type="checkbox" onclick="check(this)">
											<label for="J_CheckBox_170769542747"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="" class="J_MakePoint" data-point="tbcart.8.12">
												<img width="80" height="80" src="{{$v->photo}}" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{$v->title}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->title}}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">{{$v->key_name}}</span>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">{{$v->price}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													  <input name="" type="number" onclick="xxoo(this)"  min="1" max="" value="{{$v->num}}" style="width:60px;" />  
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number" id="money"></em>
										</div>
								
									</li>
									<li class="td hidden">
										<input name="id" type="hidden" value="{{$v->id}}" />
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<!-- <a title="移入收藏夹" class="btn-fav" href="#">
                  移入收藏夹</a> -->
											<a href="javascript:;" onclick="del(this,{{$v->id}})" data-point-url="#" class="delete">
                  删除</a>
										</div>
										<script>
											//处理删除
											function del(obj,id){
	
												$.ajax({
													url:'/home/shopcart/del',
													type:'get',
													dataType: "json", 
													data:{
														'id':id
													},
													success:function(res){
														if(res.error == 0){
															// 动态删除
													$($(obj).parent().parent().parent()).remove();
														}
													}
												});	
											}
										</script>
									</li>
								</ul>
								@endforeach

						<script>
						//获取所有选中的商品的总和
							function check(obj){
								arr = new Array();
								num = 0
								$('#app').find('ul').each(function(){ 
			if($($(this).find('li').eq(0).find('div').find("input[type=checkbox]")).prop('checked')){
					arr.push($($(this).find('li').eq(5)).find('em').text());						
			};
								})
								for (var i = 0; i < arr.length; i++) {
									//求和
									num += Number(arr[i]);
								}
								$('#J_SelectedItemsCount').text(arr.length);
								$('#J_Total').text(num);
								// console.dir(num);
							}
						
							$('#app').find('ul').each(function(){
								//获取单价
								price = $($($(this).find('li').eq(3)).find('div').find('em')).html();
								//获取数量
								num = $($($(this).find('li').eq(4)).find('div').find('input')).attr('value');
								//单价*数量
								$($($(this).find('li').eq(5)).find('div').find('em')).text(price*num);
								});


								

							//获取单行商品总价
							function xxoo(obj){
								num = $(obj).val();
								price = $(obj).parent().parent().parent().parent().prev().find('div').find('em').html();
								$(obj).parent().parent().parent().parent().next().find('div').find('em').text(price*num);
							}

						</script>
							</div>
						</div>
					</tr>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input onclick="allcheck(this)" class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
						<script>
						//处理全选
						function allcheck(obj){
							if($(obj).prop('checked'))
							{
									$('#app').find('ul').each(function(){
										$(this).find('li').eq(0).find('div').find('input').prop('checked',true);
								});	

							}else{
								$('#app').find('ul').each(function(){
										$(this).find('li').eq(0).find('div').find('input').prop('checked',false);
								});	
							}
						}	
						</script>
					</div>
					<div class="operations">
<!-- 						<a href="#" hidefocus="true" class="deleteAll">删除</a> -->
<!-- 						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a> -->
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area"  id="allin" >
							<a href="javascript:;" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
						<script>
						//处理拼接数据
						$('#allin').on('click',function(){
						var arr = new Array();
						//获取选中的商品
						$('#app').find('ul').each(function(){ 
							// 得出选中的数组长度
						if($($(this).find('li').eq(0).find('div').find("input[type=checkbox]")).prop('checked')){
										arr.push(this);
						};
											})
						//定义一个对象
						
						//定义一个存放对象的数组
						var brr = new Array();
						for (var i = 0; i < arr.length; i++) {
							var data_json = {};
							//获取对应的购物车id
							sku_id = $($(arr[i]).find('li').eq(6).find('input')).val();
							data_json.sku_id = sku_id;
							//获取对应商品的数量	
							num = $($(arr[i]).find('li').eq(4).find('div').find('input')).val();	
							data_json.num = num;
							//把对现有依次存进数组
							// console.dir(data_json);
							brr.push(data_json);
						}
							//ajax
								$.ajax({
									url:'/home/shopcart/store',
									type:'get',
									dataType:'json',
									data:{'data':brr},
									success:function(res){
										if(res == 'ok'){
											window.location.href = "/home/shopcart/end";
										}
									}
								})
							});	

						</script>
					</div>

				</div>

				@include('home.index.footer')

			</div>

			
	</body>

</html