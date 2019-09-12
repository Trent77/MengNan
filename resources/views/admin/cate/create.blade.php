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
  

</div>
<script type="text/javascript">
function del(id,mid){
  if(confirm("您确定要删除吗?")){
  
  }
}
</script>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/cate/update/{{$data->id}}" enctype="multipart/form-data"> 
    {{ csrf_field() }}  
    <input type="hidden" id="path" name="path" value="{{$data->path}}"> 
      <div class="form-group">
        <div class="label">
          <label>分类名</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="name" name="name" value="{{$data->name}}" />
          <div class="tips"></div>
        </div>
      </div>
            <div class="form-group">
        <div class="label">
          <label>父类</label>
        </div>
        <div class="field">
          <select id="" name="pid">
            <option value="0">--无--</option>
            @foreach($cates as $k=>$v)
            <option value="{{$v->id}}" data-path="{{$v->path}}" @if($v->pid > 0) disabled @endif @if($v->id == $data->pid) selected  @endif>{{$v->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>



