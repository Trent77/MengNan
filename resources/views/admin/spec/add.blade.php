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
      <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>选择属性</strong></div>
      <div class="body-content">
        <form method="post" class="form-x" action="/admin/item/create" >
          {{csrf_field()}}
          <input type="hidden" name="good_id" value="{{$good_id}}">
          <input type="hidden" id="soft_id" value="{{$soft_id}}">
          <div class="form-group">
            <div class="label">
              <label>属性名:</label>
            </div>
            <div class="field">
                <div class="" id="attrarea">
                @foreach($spec as $k=>$v)
                  {{$v->name}}<input type="checkbox" name="attr[]" value="{{$v->id}}">
                @endforeach
                </div>
              <table class="table table-condensed">
              	<tr>
              		<td style="width:300px;">
              		<input type="text" id="spec_name" class="input radius-rounded input-small" style="width:100%;margin-top:13px;" placeholder="属性名" />.
              		</td>
                  <td><span class="button button-little" id="zeng">新增</span></td>
              	</tr>
              </table>

            </div>
          </div>
        </div>
          <div class="field">
            <a class="button bg-main icon-check-square-o" href="javascript:history.back(-1);">上一步</a>
            <button class="button bg-main icon-check-square-o" type="submit">下一步</button>
          </div>
        </form>
      </div>

  </body>
</html>

<script type="text/javascript">

  //新增一个所属分类的属性
  $('#zeng').on('click',function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    spec_name = $('#spec_name').val();
    soft_id = $('#soft_id').val();
    $.ajax({
      url:'/admin/spec/store',
      type:'post',
      dataType:'json',
      data:{'spec_name':spec_name,'soft_id':soft_id},
      success:function(res){
        console.log(res);
        if(res.status==0){
          alert('属性名不能为空');
        }else if(res.status==2){
          alert('添加失败');
        }else{
            var str =res.data.name+'<input type="checkbox" name="attr[]" value="'+res.data.id+'">';
            $('#attrarea').append(str);
            $('#spec_name').val('').focus();
        }
      }
    });
  })
</script>
</body>
</html>
