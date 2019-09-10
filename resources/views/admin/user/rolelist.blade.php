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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>角色分配</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/user/saverole">
      {{csrf_field()}}  
        <div class="form-group">
          <h4>为当前:{{$user->name}}管理员分配角色</h4>
          @foreach ($role as $v)
          <div class="field" style="padding-top:8px;"> 
            <input type="checkbox" name="rids[]" value="{{$v->id}}" @if(in_array($v->id,$rids))checked @endif/> {{$v->name}}
            <input type="hidden" name="uid" value="{{$user->id}}">
          </div>
          @endforeach
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o"  type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>