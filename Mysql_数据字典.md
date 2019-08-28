- #### 表名:Mn_user

- #### 日期:2019-08-28

- #### 描述:保存用户资料

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

  

