<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加角色</title>  
    <link rel="stylesheet" href="/admin/css/pintuer.css">
    <link rel="stylesheet" href="/admin/css/admin.css">
    <script src="/admin/js/jquery.js"></script>
    <script src="/admin/js/pintuer.js"></script> 
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>添加角色</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/role/store" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <div class="label">
          <label for="name">用户名：</label>
        </div>
        <div class="field">
          <input type="text" id="name" class="input" name="name" value="" />
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
<!--   <script type="text/javascript">
  $('button[type=submit]').on('click',function(){
    let formData = new FormData();
    formData.append('name',$('#name').val());

    
    $.ajax({
      url:'/admin/role/store',
      type:'post',
      data:formData,
      contentType:false,
      processData:false,
      success:function(res){
        if(res == 'ok'){
          alert('添加成功');
        }else{
          alert(res);
        }
      }
    });
  });
  </script> -->
</body>
</html>