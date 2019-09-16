<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/admin/css/pintuer.css">
<link rel="stylesheet" href="/admin/css/admin.css">
<script src="/admin/js/jquery.js"></script>
<script src="/admin/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">管理员列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
	<!-- <form action="/admin/member/index" method="get"> -->
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="/admin/user/create"> 添加管理员</a> </li>          
       		
      </ul>
    </div>
	<!-- </form> -->
    <table class="table table-hover text-center">
      <tr>
        <th>ID</th>
        <th>管理员名称</th>
        <th>邮箱</th>
        <th>操作</th>
      </tr>
      <volist name="list" id="vo">
		@foreach($data as $k=>$v)
        <tr>
          <td>{{ $v->id }}</td>
		  <td>{{$v->name}}</td>
          <td>{{$v->email}}</td>
          <td>
          	<div class="button-group">
          		<a class="button border-main" style="background-color:pink;" href="/admin/user/rolelist/{{$v->id}}"><span class="icon-edit"></span> 角色分配</a>
          		<a class="button border-main" href="/admin/user/edit/{{$v->id}}"><span class="icon-edit"></span> 修改</a>
           		<a class="button border-red" href="/admin/user/destroy/{{$v->id}}"><span class="icon-trash-o"></span> 删除</a>
          	</div>
          </td>
        </tr>
      <tr>
      </tr>
		@endforeach
    </table>
 	{{$data->links()}}
  </div>
</form>
<!-- 
<script type="text/javascript">

//搜索
function changesearch(){
<<<<<<< Updated upstream
	var keywords = $('#keywords').val();
	$.ajax({
		type:'get',
		url:'/admin/user/index',
		data:{'keywords':keywords},
	})
=======

>>>>>>> Stashed changes
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){

	}
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

</script>
 -->
</body>
</html>
