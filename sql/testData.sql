use test;
INSERT INTO student VALUES ('12345','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12346','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12347','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12348','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12349','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12350','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12351','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12352','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12353','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12354','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12355','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12356','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12357','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12358','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12359','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
						('12360','098f6bcd4621d373cade4e832627b4f6','test@test.com')
;

INSERT INTO app VALUES  ('12345','TestF','TestL','3.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12346','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12347','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12348','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12349','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12350','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12351','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12352','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12353','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12354','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12355','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12356','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12357','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12358','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12359','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL),
						('12360','TestF','TestL','2.8','111-111-1111','test@test.com',CAST("2015-12-31" AS DATE),NULL)
;

INSERT INTO instructor VALUES('98765','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
							 ('98766','098f6bcd4621d373cade4e832627b4f6','test@test.com'),
							 ('98767','098f6bcd4621d373cade4e832627b4f6','test@test.com')
;

INSERT INTO comment VALUES ('12345','98765',"He SUCKSSSSSS"),
						   ('12346','98765',"He's ehh."),
						   ('12347','98765',"He's pretty great")
;

INSERT INTO graduate VALUES ('12355','Computer Science','Adriana Wheeler'),
							('12356','Mechanical Engineering', 'WhomEverItIs'),
							('12350','WhatEver','ThatOneDude')
;


INSERT INTO interStudent VALUES('12345','100','Fall 2015'),
								('12346','50','Spring 2014'),
								('12357','75','Fall 2012')
;

INSERT INTO undergraduate VALUES	('12345','Computer Science','Senior'),
									('12346','Computer Science','Senior'),
									('12347','Computer Science','Senior'),
									('12348','Computer Science','Senior'),
									('12349','Computer Science','Senior'),
									('12351','Computer Science','Senior'),
									('12352','Computer Science','Senior'),
									('12353','Computer Science','Senior'),
									('12354','Computer Science','Senior'),
									('12357','Computer Science','Senior'),
									('12358','Computer Science','Senior'),
									('12359','Computer Science','Senior'),
									('12360','Computer Science','Senior')
;

INSERT INTO course VALUES	('CS1050','CS'),
							('CS2050','CS'),
							('CS3050','CS'),
							('CS3330','CS'),
							('IT2280','IT'),
							('IT1000','IT'),
							('CS4530','CS')
;

INSERT INTO curTeach VALUES	('12345','CS1050'),
								('12346','IT2280'),
								('12355','CS4530')
;

INSERT INTO preTeach VALUES 	('12347','CS3050'),
								('12360','CS4530'),
								('12349','CS3330')
;


INSERT INTO likeTeach VALUES	('12345','CS3050','58'),
								('12346','CS1050','68'),
								('12347','CS2050','30'),
								('12348','CS2050','0'),
								('12349','IT2280','100'),
								('12350','IT1000','92'),
								('12351','CS3330','57'),
								('12352','CS4530','49'),
								('12353','CS4530','30'),
								('12354','CS3330','84'),
								('12355','CS3050','91'),
								('12356','CS3050','97'),
								('12357','CS3050','49'),
								('12358','IT2280','100'),
								('12359','CS1050','92'),
								('12360','CS1050','38')
;

INSERT INTO admin VALUES	('admin','098f6bcd4621d373cade4e832627b4f6','admin@test.com');

