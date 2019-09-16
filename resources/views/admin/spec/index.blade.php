<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>
<link rel="stylesheet" href="/admin/css/pintuer.css">
<link rel="stylesheet" href="/admin/css/admin.css">
<script src="/admin/js/jquery.js"></script>
<script src="/admin/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
    {{csrf_field()}}
  <div class="panel admin-panel">
<<<<<<< Updated upstream:resources/views/admin/node/index.blade.php
    <div class="panel-head"><strong class="icon-reorder">权限列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<!-- <form action="/admin/member/index" method="get"> -->
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="/admin/node/create"> 添加权限</a> </li>
          <!-- 用户名：<input type="text" placeholder="请输入搜索关键字" name="keyword" class="input" style="width:250px; line-height:17px;display:inline-block" />
        <input type="submit" value="搜索"> -->
=======
    <div class="panel-head"><strong class="icon-reorder">规格列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
>>>>>>> Stashed changes:resources/views/admin/spec/index.blade.php
      </ul>
    </div>
	<!-- </form> -->
    <table class="table table-hover text-center">
      <tr>
<<<<<<< Updated upstream:resources/views/admin/node/index.blade.php
        <th>ID</th>
        <th>权限名称</th>
        <th>控制器</th>
        <th>方法</th>
        <th>操作</th>
      </tr>
      <volist name="list" id="vo">
		@foreach($node as $k=>$v)
        <tr>
          <td>{{ $v->id }}</td>
		  <td>{{$v->name}}</td>
		  <td>{{$v->mname}}</td>
		  <td>{{$v->aname}}</td>
          <td>
          	<div class="button-group">
          		<a class="button border-main" href="/admin/node/edit/{{$v->id}}"><span class="icon-edit"></span> 修改</a>
           		<a class="button border-red" href="/admin/node/destroy/{{$v->id}}"><span class="icon-trash-o"></span> 删除</a>
          	</div>
          </td>
        </tr>
      <tr>
      </tr>
		@endforeach
=======
        <th></th>
        <th>商品名称</th>
        <th>商品规格</th>
        <!-- <th></th> -->
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
        @foreach($good as $k=>$v)
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
        </td>
          <td>{{$v->name}}</td>
          <td>{{$v->specs_name}}</td>
          <td><div class="button-group"> <a  class="button border-main" href="/admin/spec/add/{{$v->id}}"><span class="icon-edit"></span> 编辑</a> <a  class="button border-red" href="/admin/soft/del/{{$v->id}}"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        @endforeach

>>>>>>> Stashed changes:resources/views/admin/spec/index.blade.php
    </table>
 	{{$node->links()}}
  </div>
</form>

<!-- <script type="text/javascript">

//搜索
function changesearch(){

}


//全选
$("#checkall").click(function(){
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;
		$("#listform").submit();
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){


		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){

		$("#listform").submit();
	}
	else{
		alert("请选择要操作的内容!");

		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;
	  }
	});
	if (Checkbox){
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}
	    });
		if(i>1){
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{

			$("#listform").submit();
		}
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script> -->

</body>
</html>
