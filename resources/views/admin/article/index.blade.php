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
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 文章列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><a href="/admin/article/create" target="right"><span class="icon-plus-square-o"> 添加文章</span></a></button>
  </div>
  <table class="table table-hover text-center">
    <thead>
                <tr>
                <th>ID</th>
                <th>基本信息</th>
                <th>文章类别</th>                
                <th>缩略图</th>
                <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $k=>$v)
              <tr>
              <td>{{$v->id}}</td>
              <td>             
                <p>标题:{{$v->title}}</p>
                <p>作者:{{$v->auth}}</p>
              </td>
              <td>{{$specs[$v->cid]->name}}</td>
              <td><img style="width: 100px;" src="/uploads/{{$v->thumb}}" title="{{$v->desc}}"></td>
              <td><div class="button-group">
                  <a class="button border-main" href="/admin/article/edit/{{$v->id}}"><span class="icon-edit"></span> 修改</a>
                  <a class="button border-red" href="/admin/article/destroy/{{$v->id}}" onclick="return del(1,1)"><span class="icon-trash-o"></span>删除</a>
              </div></td>
              </tr> 
              @endforeach                 
              </tbody>   
  </table>
</div>
</script>
<script type="text/javascript">
function del(id,mid){
  if(confirm("您确定要删除吗?")){
  
  }
}
</script>
</body></html>