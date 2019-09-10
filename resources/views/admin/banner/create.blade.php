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
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/banner/store" enctype="multipart/form-data" > 
    {{ csrf_field() }}   
      <div class="form-group">
        <div class="label">
          <label for="title">标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="{{old('title')}}" id="title" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
            <label for="profile">图片</label>
            <input type="file" id="profile" name="profile"  class="form-control">            
      </div> 
      <div class="form-group">
        <div class="label">
          <label for="desc">描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" id="desc" name="desc" style="height:120px;" ></textarea>
          <div class="tips"></div>
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