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
  <table class="table table-bordered">
    <input id="good_id" type="hidden"  value="{{$good_id}}">
      <thead>
    @for($i=0;$i<count($spec_array);$i++)
      <th>{{$spec_array[$i]}}</th>
    @endfor
      <th>库存</th>
      <th>价格</th>
    </thead>
    <tbody id="main">
    @for($i=0;$i<count($data);$i++)
          <tr>
            @foreach($data[$i] as $k=>$v)
            <td>{{$v}}</td>
            @endforeach
            <td><input type="text"></td>
            <td><input type="text"></td>
          </tr>
    @endfor
    </tbody>
  </table>
</body>
<button class="button border-main">提交</button>
<script type="text/javascript">
$('button').on('click',function(){
  var good_id = $('#good_id').val();
  // 得到每一行td的值
  var length = $('#main tr').eq(0).find('td').length;
  //定义一个数组接收每一行tr的td值
  var content_all = []; 
  $('#main tr').each(function(){
    var store = $(this).find('input').eq(0).val();
    var price = $(this).find('input').eq(1).val();
    //判断input框是否有填写
        if(store == ''){
          alert('请填上库存');
          return;
        }
        if(price == ''){
          alert('请填写上价格');
          return;
        }
    //定义一个数组接收一行tr的td值
    var content = [];
    for (var i = 0; i < length-2; i++) {
      content.push ($(this).find('td').eq(i).text());
    }
    content.push(store);
    content.push(price);
    //接收参数
    content_all.push(content);
  })
  console.log(content_all);
  $.ajax({
    url:'/admin/item/store',
    data:{'content':content_all,'good_id':good_id},
    type:'get',
    dataType:'json',
    success:function(res){
      if(res.status==0){
        alert(res.msg);
      }
      window.location.href="/admin/good/index";
    }
  });
    
})
</script>
</html>
