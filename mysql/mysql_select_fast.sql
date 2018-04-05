/*
* @Author: anchen
* @Date:   2017-12-06 16:10:18
* @Last Modified by:   anchen
* @Last Modified time: 2017-12-06 17:21:16
*/

--速度极慢
select * from table where id > 123456 order by id limit 123456, 10;

--速度极快
例如：数据库cate
select * from cate_blog where id > (select id from cate_blog where id > 123456 limit 2000,1) order by id limit 20, 10;

SELECT * FROM product a JOIN (select id from product limit 866613, 20) b ON a.ID = b.id;
