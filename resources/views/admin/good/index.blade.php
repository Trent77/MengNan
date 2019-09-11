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
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">商品列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
    <form method="get" action="/admin/good/index" id="listform">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="/admin/good/create"> 添加商品</a> </li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" value="{{$keywords}}"  class="input" style="width:250px; line-height:17px;display:inline-block" />
          <button class="button border-main icon-search" > 搜索</button></li>
      </ul>
     </form>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th></th>
        <th>ID</th>
        <th>商品名称</th>
        <th>商品标题</th>
        <th>所属分类</th>
        <th>规格状态</th>
        <th>详情状态</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
        @foreach($good as $k=>$v)
        <tr id="tr{{$v->id}}">
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
        </td>
          <td>{{$v->id}}</td>
          <td>{{$v->title}}</td>
          <td>{{$v->name}}</td>
          <td>{{$v->soft_id}}</td>
          <td>{{$v->spec_status}}</td>
          <td>{{$v->show_status}}</td>
          <td><div class="button-group">
          <a class="button border-back" href="/admin/good/write/{{$v->id}}"><span class="icon-edit"></span>设置详情</a>
            <a class="button border-green" href="/admin/spec/add/{{$v->id}}"><span class="icon-edit"></span>设置规格</a>
<!--             <a class="button border-main" href="add.html"><span class="icon-edit"></span> 修改</a> -->
             <a class="button border-red" href="javascript:void(0)" onclick="return del({{$v->id}})"><span class="icon-trash-o"></span> 删除</a>
          </div></td>
        </tr>
        @endforeach
      <tr>

    </table>

  </div>

{{ $good->links() }}
<script type="text/javascript">

//搜索
function changesearch(){
	var keywords = $('#keywords').val();
	$.ajax({
		type:'get',
		url:'/admin/good/index',
		data:{'keywords':keywords},
	})
}

//单个删除
function del(id){
	if(confirm("您确定要删除吗?")){

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
          $.ajax({
            url:'/admin/good/del',
            data:{'id':id},
            type:'post',
            success:function(res){
              let tr = $('#tr'+id);
              console.log(tr);
              tr.remove(); 
            }
           });
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
</body>
</html>
