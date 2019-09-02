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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加品牌</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/soft/store" onsubmit="return false">
      {{csrf_field()}}
      <div class="form-group">
        <div class="label">
          <label>品牌名称：</label>
        </div>
        <div class="field">
          <input type="text" id='i1' class="input w50" value="" name="name"  />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>选择分类:</label>
        </div>
        <div class="field">
          <!-- <input type="text" id='i1' class="input w50" value="" name="name"  /> -->
          <select id="ss" name="softs_id" class="input w50">
            @foreach($soft as $k=>$v)
            <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
          </select>
          <div class="tips"></div>
        </div>
      </div>

        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<h1>
    <div class="alert alert-danger">
        <ul id="show_errors"></ul>
    </div>
</h1>

</body>
<script type="text/javascript">
  $('button').on('click',function(){
    var name = $('#i1').val();
    var softs_id = $('#ss').val();
    console.log(name,softs_id);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
        url:'/admin/brand/store',
        type:'post',
        data:{'name':name,'softs_id':softs_id},
        success:function(res){
          alert(res);
        },
    });
  })
</script>
</html>
