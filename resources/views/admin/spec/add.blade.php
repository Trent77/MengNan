<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>
<link rel="stylesheet" href="/admin/css/pintuer.css">
<link rel="stylesheet" href="/admin/css/admin.css">
<script src="/admin/js/jquery.js"></script>
<script src="/admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加规格</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" onsubmit="return false">
      {{csrf_field()}}
      <input type="hidden" id="id" name="name" value="">
      <div class="form-group">
        <div class="label">
          <label>规格名:</label>
        </div>
        <div class="field">
          @foreach($spec as $k=>$v)
            {{$v->name}}<input type="checkbox" name="" value="{{$v->id}}">
          @endforeach
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

</body></html>
<script type="text/javascript">
  $('#bb').on('click',function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    name = $('#tt').val();
    id = $('#id').val();
    console.log(id);
    $.ajax({
      url:'/admin/soft/edit',
      type:'post',
      data:{'name':name,'id':id},
      success:function(res){
        if(res == 'ok'){
          alert('修改成功');
        }else{
          alert(res);
        }
      }
    });
  })
</script>
