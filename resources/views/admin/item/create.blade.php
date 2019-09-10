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
  <script src="https://cdn.bootcss.com/vue/2.6.10/vue.min.js"></script>
  </head>
  <body>

    <form class="" action="/admin/item/show" method="get">
      <input type="hidden" name="good_id" value="{{$good_id}}">
      <h1 align="center">请选择你所需要的属性值</h1>
      <div class="outside border border-big" style="width:100%;margin-top:30px;">
      @foreach($spec_items as $k=>$v)
      <div class="inside border border-small" id='example'>
            <!-- <input type="text" name="" value=""> -->
            <h2>{{$k}}</h2>
            <div>
              @for($i=0;$i<count($v);$i++)
              <span>{{$v[$i]->item_name}}</span>
                @if($v[$i]->item_name)
                <input type="checkbox" name="{{$v[$i]->spec_id}}[]" value="{{$v[$i]->item_id}}">
                @endif
              @endfor
            </div>
            <input  type="text" value="" style="width:60px;">
            <span class="button button-little" onclick="xxoo({{$v[0]->spec_id}},this)">新增</span>
      </div>
      @endforeach
    </div>
    <input type="submit" class='button bg-main' value="下一步">
    </form>


      <script type="text/javascript">
        function xxoo($spec_id,obj){
          spec_id = $spec_id;
          //拿到按钮上一个元素节点里的值
          item_name = $(obj).prev().val();
          if(item_name == ''){
            alert('属性名不能为空');return;
          }
          $.ajax({
            url:'/admin/item/add',
            type:'get',
            data:{'spec_id':spec_id,'item_name':item_name},
            success:function(res){
              if(status==0){
                var str = "<span>"+item_name+"</span><input type='checkbox' name='"+res.spec_id+"[]' value='"+res.id+"'>";
                console.log(str);
                $(obj).prev().prev().append(str);
                $(obj).prev().val('').focus();
              }else if(status == 1){
                alert('添加失败');
              }
            }
          })
        }
        function del($id){
          	if(confirm("您确定要删除吗?")){
              $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
              $.ajax({
                url:'/admin/item/del',
                type:'post',
                data:{'id':$id},
                succsess:function(res){
                  console.log(res);
                }
              });
            }
        }
      </script>
  </body>
</html>
