
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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span>添加订单</button>
  </div>
  <table class="table table-hover text-center" >
    <tr>
      <th width="">ID</th>
      <th width="">订单编号</th>
      <th width="">收件人</th>
      <th width="">总金额</th>
      <th width="">应付金额</th>
      <th width="">订单状态</th>
      <th width="">支付状态</th>
      <th width="">发货状态</th>
      <th width="">支付方式</th>
      <th width="">配送方式</th>
      <th width="">下单时间</th>
      <th width="">修改</th>
    </tr>
    <tr>
      <td>1</td>     
      <td>2</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td><div class="button-group">
      <a class="button border-main" onclick="" href=""><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    
  </table>
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){
	
	}
}
</script>

</body></html>