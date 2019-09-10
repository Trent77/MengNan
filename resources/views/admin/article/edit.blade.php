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
</head>
<body>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/article/update/{{$data->id}}" enctype="multipart/form-data"> 
    {{ csrf_field() }}   
      <div class="form-group">
        <div class="label">
          <label for="title">标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="{{$data->title}}" id="title" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="auth" id="auth" value="{{$data->auth}}"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>文章分类</label>
        </div>
        <div class="field">
          <select id="cid" name="cid">
            <option>请选择</option>
             @foreach($specs as $k=>$v)
              <option value="{{$v->id}}">{{$v->name}}</option> 
            @endforeach          
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="thumb">缩略图：</label>
          <img style="width: 100px; height: 50px;" src="/uploads/{{$data->thumb}}">
        </div>
        <div class="field">
          <input type="file" id="thumb" name="thumb" class="input tips" style="width:25%; float:left;" data-toggle="hover" data-place="right" >
          
        </div>
      </div>
      <div class="form-group">
            <label for="content">内容</label>
            <!-- 加载编辑器的容器 -->
            <script id="content" name="content" type="text/plain">
            {!!$data->content!!}
            </script>       
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
<script type="text/javascript">
        var ue = UE.getEditor('content',{
        });
    </script>
</body></html>