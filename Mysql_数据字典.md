- #### 表名:mn_user

- #### 日期:2019-08-28

- #### 描述:用户资料

- #### 具体内容

  | 字段名        | 数据类型     | 约束       | 说明                    |
  | ------------- | ------------ | ---------- | ----------------------- |
  | user_Id       | int          | 主键,自增  | 唯一                    |
  | user_name     | varchar(32)  | not null   | 用户名                  |
  | user_pwd      | char(60)     | not null   | 密码                    |
  | user_profile  | varchar(128) | default 空 | 用户头像                |
  | user_nickname | varchar(32)  | default 空 | 昵称                    |
  | user_sex      | tinyint(4)   | default 0  | 性别:   0保密 1:女 2:男 |
  | user_phone    | char(11)     | default 空 | 手机号                  |
  | user_Email    | varchar(32)  | default 空 | 用户邮箱                |
  | user_status   | tinyint(3)   | default 0  | 用户状态                |
  | created_at    | timestamp    |            | 用户创建时间            |
  | updated_at    | timestamp    |            | 用户更新时间            |

  #### · 表名：mn_category 
  
  #### · 日期：2019-8-28
  
  #### · 描述：类别管理(一级分类)
  
  #### · 具体内容
  
  | 字段名        | 数据类型    | 约束       | 说明         |
  | ------------- | ----------- | ---------- | ------------ |
  | category_id   | int         | 主键，自增 | 唯一         |
  | category_name | varchar(32) | not null   | 类别名       |
  | created_at    | timestamp   |            | 分类创建时间 |
  
  #### · 表名:mn_banner
  
  #### · 日期:2019-08-28
  
  #### · 描述:轮播图
  
  #### · 具体内容:
  
  | 字段          | 数据类型     | 约束       | 说明                   |
  | :------------ | :----------- | ---------- | ---------------------- |
  | banner_id     | int          | 主键自增   | 唯一                   |
  | banner_desc   | varchar(50)  | default '' | 图片描述               |
  | banner_url    | varchar(255) | default '' | 图片链接地址           |
  | banner_status | tinyint（3） | default 0  | 激活状态 0:未激活 激活 |
  
  #### · 表名：mn_sort
  
  #### · 日期：2019-8-28
  
  #### · 描述：分类管理(二级分类)
  
  #### · 具体内容
  
  | 字段名     | 数据类型    | 约束       | 说明         |
  | ---------- | ----------- | ---------- | ------------ |
  | sort_id    | int         | 主键，自增 | 唯一         |
  | sort_pid   | int         | default '' | 关联的类别   |
  | sort_name  | varchar(32) | not null   | 分类名       |
  | created_at | timestamp   |            | 分类创建时间 |
  
  #### · 表名：mn_brand
  
  #### · 日期：2019-8-28
  
  #### · 描述：品牌管理
  
  #### · 具体内容
  
  | 字段名     | 数据类型    | 约束       | 说明         |
  | ---------- | ----------- | ---------- | ------------ |
  | brand_id   | int         | 主键，自增 | 唯一         |
  | brand_pid  | int         | default '' | 关联的类别   |
  | brand_name | varchar(32) | not null   | 品牌名       |
  | created_at | timestamp   |            | 分类创建时间 |
  
  #################################################################
  
  #### · 表名：mn_goods
  
  #### · 日期：2019-8-29
  
  #### · 描述：商品信息
  
  #### · 具体内容
  
  | 字段名       | 数据类型  | 约束       | 说明                       |
  | ------------ | --------- | ---------- | -------------------------- |
  | goods_id     | int       | 主键，自增 | 商品ID 唯一                |
  | cid          | int       | not null   | 关联的分类ID               |
  | bid          | int       | not null   | 关联的品牌ID               |
  | sid          | varchar   | 60         | 规格ID(每项以逗号隔开)     |
  | content_id   | varchar   | 11         | 内容ID                     |
  | goods_photo  | varchar   | 255        | 商品的照片                 |
  | created_at   | timestamp |            | 商品创建时间               |
  | goods_status | tinyint   | default 0  | 商品激活状态 0未激活 1激活 |
  
  #################################################################
  
  #### 表名：mn_sku   sku
  
  #### 表名：mn_brand  品牌
  
  #### 表名：mn_content 详情内容
  
  #### 表名：mn_specs  规格
  
  #### 未完待续... 明天接着写！！！！！

