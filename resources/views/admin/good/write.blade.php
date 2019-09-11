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
        <form action="/admin/good/chuli" method="post"  enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="good_id" value="{{$good->id}}">
          <label class="label">商品名字</label>
          <input type="text" class="input" value="{{$good->name}}" placeholder="用户名/邮箱/手机" readonly="readonly" />
          <div class="label">
          <label for="upfile">商品小图</label>
          </div>
          <div class="field">
          <a class="button input-file" href="javascript:void(0);">+ 请选择上传文件
          <input size="100" name="photo_mini[]" multiple="" data-validate="required:请选择文件,img:只能上传jpg|gif|png|ico格式文件" type="file">
          </a>
          </div>
          <div class="label">
          <label for="upfile">商品详情图</label>
          </div>
          <div class="field">
          <a class="button input-file" href="javascript:void(0);">+ 请选择上传文件
          <input size="100" name="photo_pro[]" multiple="" data-validate="required:请选择文件,img:只能上传jpg|gif|png|ico格式文件" type="file">
          </a>
          </div>
          <input class="button border-mix" type="submit" value="完成">
        </form>
      </div>

  </body>
</html>

<script type="text/javascript">
</script>
</body>
</html>
