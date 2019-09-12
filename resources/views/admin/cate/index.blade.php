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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><a href="/admin/cate/create" target="right"><span class="icon-plus-square-o"> 添加分类</span></a></button>   
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="15%">分类名</th>
      <th width="20%">PID</th>
      <th width="20%">PATH</th>
      <th width="15%">操作</th>
    </tr>
    @foreach($cate as $k=>$v)
    <tr>
      <td>{{$v->id}}</td>         
      <td>{{$v->name}}</td>
      <td>{{$v->pid}}</td>
      <td>{{$v->path}}</td>
      <td><div class="button-group">
      <a class="button border-main" href="/admin/cate/edit/{{$v->id}}"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="/admin/cate/destroy/{{$v->id}}" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td> 
    </tr>
    @endforeach
  </table>
  {!!$cate->render()!!}
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){
	
	}
}
</script>

</body></html>



