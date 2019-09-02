
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
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center" >
    <tr>
      <th width="">ID</th>
      <th width="">类别名</th>
      <th width="">类别创建时间</th>
      <th width="">操作</th>
    </tr>
    @foreach($data as $k=>$v)
    <tr>
      <td>{{$v->id}}</td>     
      <td>{{$v->name}}</td>
      <td>{{$v->created_at}}</td>
      <td><div class="button-group">
      <a class="button border-main" onclick="" href="/admin/category/edit/{{$v->id}}"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="/admin/category/destroy/{{$v->id}}" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    @endforeach
  
    
  </table>
</div>
{{$data->links()}}
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){
	
	}
}
</script>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/category/store">   
    {{ csrf_field() }}
      <div class="form-group">
        <div class="label">
          <label for="name">类别名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="cname" value="" name="name" data-validate="required:请输入标题" /><br>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit" a> 提交</button>
        </div>
      </div>
    </form>


  </div>
</div>

</body></html>