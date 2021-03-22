# **数据库设计**
---
##  <center>USER（普通用户表)</center>
| 字段名称 | 数据类型 | 长度 | 字段含义 | 是否主键 |
| --- | --- | --- | --- | --- |
| UID（用户名） | varchar |	20 |	住户登陆的用户名 | 是 |
| PHOTO（头像） |	varchar| 64 | 住户的头像 | 否 |
| UPASSWORD（密码）	| varchar | 20	| 登陆密码 | 否 |
| NAME（真实姓名 ）| varchar | 5 | 住户真实姓名 | 否 |
| SEX（性别） | char | 1 | 住户性别 | 否 |
| TEL（联系方式） | varchar | 12 | 住户的联系方式 | 否 |
| ADD（住址） |	varchar | 30 | 住户的具体地址 |	否 |
| EMAIL	| varchar	| 25 | 住户的邮箱地址 |	否 |
<br>

## <center>HEALTH（健康数据表）</center>
| 字段名称 | 数据类型 | 长度 | 字段含义 | 是否主键 |
| --- | --- | --- | --- | --- |
| UID（用户名 ）| varchar | 20 | 数据表对应的住户的用户名 | 是 |
| HDATE（日期） | datetime | 6 |数据填写的日期 | 是 |
| TEM（体温） | numeric | (3,1) |住户的体温 | 否 |
| TALL（身高） | numeric | (4,1) |住户的身高 | 否 |
| WEIGHT（体重） | numeric | (3,1) |住户的身高 | 否 |
| DBP（舒张压） | int | 3 | 住户血压中的舒张压 | 否 |
| SBP（收缩压） | int | 3 | 住户血压中的收缩压 | 否 |
| RATE（心率） | int | 3 | 住户的心率 | 否 |
| SPORT（是否运动） |varchar | 2 | 住户当日是否运动 | 否 |
<br>

## <center>ANNOU（公告表）</center>
| 字段名称 | 数据类型 | 长度 | 字段含义 | 是否主键 |
| --- | --- | --- | --- | --- |
| AHEAD（标题） | varchar | 30 | 公告的标题 | 是 |
| ADATE（时间） | datetime | 6 | 公告发布的时间 |	否 |
|ABODY（内容）|	varchar	| 200 | 公告的内容 | 否 |
<br>

## <center>ADMIN（管理员表）</center>
| 字段名称 | 数据类型 | 长度 | 字段含义 | 是否主键 |
| --- | --- | --- | --- | --- |
|AID | varchar	| 20| 管理员的用户名 | 是 |
|APASSWORD（密码） | varchar | 20 |管理员的登陆密码	| 否 |
<br>

## <center>FOOD（菜单表）</center>
| 字段名称 | 数据类型 | 长度 | 字段含义 | 是否主键 |
| --- | --- | --- | --- | --- |
| FID（编号） | char | 3 | 菜单编号	| 是 |
| FNAME（菜品） | varchar | 10 | 菜品名称 | 否 |
| PRICE（价格） | numeric | (3,1)	| 菜品价格 | 否 |
| FIMG（图片） | varchar | 64 | 菜品图片 | 否 |
<br>

## <center>HISTORY（订餐记录表）</center>
| 字段名称	| 数据类型	| 长度	| 字段含义	| 是否主键 |
| --- | --- | --- | --- | --- |
| UID（用户名） | varchar |	20 | 订餐的用户 | 是 |
| OHDATE（日期） | datetime | 6 | 订餐的日期 |	是 |
| OHID（编号） | char | 3 | 订餐的菜品编号 | 否 |