<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>修改用户</title>  
    <link rel="stylesheet" href="/admin/css/pintuer.css">
    <link rel="stylesheet" href="/admin/css/admin.css">
    <script src="/admin/js/jquery.js"></script>
    <script src="/admin/js/pintuer.js"></script> 
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>修改用户</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/member/update/{{$data->id}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <div class="label">
          <label for="name">用户名：</label>
        </div>
        <div class="field">
          <input type="text" id="name" class="input" name="name" value="{{$data->name}}"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="profile">用户头像：</label>
        </div>
        <div class="field">
          <td width="10%"><img src="/uploads/{{$data->profile}}" alt="" width="70" height="50" /></td>
          <input type="file" id="profile" name="profile" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="email">邮箱：</label>
        </div>
        <div class="field">
          <input type="text" id="email" class="input" name="email" value="{{$data->email}}" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="phone">手机号：</label>
        </div>
        <div class="field">
          <input type="text" id="phone" class="input" name="phone" value="{{$data->phone}}" />
          <div class="tips"></div>
        </div>
      </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>