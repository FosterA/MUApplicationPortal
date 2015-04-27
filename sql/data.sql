use applicationportal;

DROP TABLE IF EXISTS windows;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS likeTeach;
DROP TABLE IF EXISTS preTeach;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS status;
DROP TABLE IF EXISTS curTeach;
DROP TABLE IF EXISTS undergraduate;
DROP TABLE IF EXISTS graduate;
DROP TABLE IF EXISTS interStudent;
DROP TABLE IF EXISTS app;
DROP TABLE IF EXISTS agree;
DROP TABLE IF EXISTS disagree;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS evaluation;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS instructor;
DROP VIEW IF EXISTS interUnder, interGra, nativeUnder, nativeGra, statusname; 



CREATE TABLE `evaluation` (
  `student_id` varchar(128) NOT NULL DEFAULT '',
  `TA_id` varchar(128) NOT NULL DEFAULT '',
  `courseName` varchar(128) NOT NULL DEFAULT '',
  `score` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`student_id`,`TA_id`,`courseName`);

insert into evaluation values('studen1','aaa','bio_1010',90);
insert into evaluation values('studen2','aaa','bio_1010',91);
insert into evaluation values('studen4','aaa','bio_1010',92);
insert into evaluation values('studen5','aaa','bio_1010',93);
insert into evaluation values('studen6','aaa','bio_1010',94);

insert into evaluation values('studen1','aaa','cs_1010',90);
insert into evaluation values('studen2','aaa','cs_1010',91);
insert into evaluation values('studen4','aaa','cs_1010',92);
insert into evaluation values('studen5','aaa','cs_1010',93);
insert into evaluation values('studen6','aaa','cs_1010',94);

insert into evaluation values('studen1','bbb','bio_1010',90);
insert into evaluation values('studen2','bbb','bio_1010',91);
insert into evaluation values('studen4','bbb','bio_1010',92);
insert into evaluation values('studen5','bbb','bio_1010',93);
insert into evaluation values('studen6','bbb','bio_1010',94);

insert into evaluation values('studen1','bbb','cs_1010',90);
insert into evaluation values('studen2','bbb','cs_1010',9);
insert into evaluation values('studen4','bbb','cs_1010',92);
insert into evaluation values('studen5','bbb','cs_1010',93);
insert into evaluation values('studen6','bbb','cs_1010',94);

insert into evaluation values('studen1','ccc','phy_1012',90);
insert into evaluation values('studen2','ccc','phy_1012',91);
insert into evaluation values('studen4','ccc','phy_1012',92);
insert into evaluation values('studen5','ccc','phy_1012',9);
insert into evaluation values('studen6','ccc','phy_1012',94);

insert into evaluation values('studen1','ccc','cs_1010',90);
insert into evaluation values('studen2','ccc','cs_1010',91);
insert into evaluation values('studen4','ccc','cs_1010',92);
insert into evaluation values('studen5','ccc','cs_1010',93);
insert into evaluation values('studen6','ccc','cs_1010',94);

insert into evaluation values('studen1','ddd','phy_1012',90);
insert into evaluation values('studen2','ddd','phy_1012',91);
insert into evaluation values('studen4','ddd','phy_1012',92);
insert into evaluation values('studen5','ddd','phy_1012',9);
insert into evaluation values('studen6','ddd','phy_1012',94);

insert into evaluation values('studen1','ddd','cs_1010',90);
insert into evaluation values('studen2','ddd','cs_1010',91);
insert into evaluation values('studen4','ddd','cs_1010',92);
insert into evaluation values('studen5','ddd','cs_1010',93);
insert into evaluation values('studen6','ddd','cs_1010',94);

insert into evaluation values('studen1','eee','phy_1012',90);
insert into evaluation values('studen2','eee','phy_1012',91);
insert into evaluation values('studen4','eee','phy_1012',92);
insert into evaluation values('studen5','eee','phy_1012',9);
insert into evaluation values('studen6','eee','phy_1012',94);

insert into evaluation values('studen1','eee','cs_1010',90);
insert into evaluation values('studen2','eee','cs_1010',91);
insert into evaluation values('studen4','eee','cs_1010',92);
insert into evaluation values('studen5','eee','cs_1010',93);
insert into evaluation values('studen6','eee','cs_1010',94);

create table windows(
	semester varchar(15),
	appOpen date,
	appClose date,
	commentOpen date,
	commentClose date,
	primary key(semester)
)engine=innodb;

create table student(
	student_id varchar(128),
	password varchar(128),
	email varchar(128),
	primary key(student_id)
)engine=innodb;

insert into student values('aaa',md5('aaa'),'liu@gmail.com');
insert into student values('bbb',md5('aaa'),'liu@gmail.com');
insert into student values('ccc',md5('aaa'),'liu@gmail.com');
insert into student values('ddd',md5('aaa'),'liu@gmail.com');
insert into student values('eee',md5('aaa'),'liu@gmail.com');
insert into student values('fff',md5('aaa'),'liu@gmail.com');
insert into student values('ggg',md5('aaa'),'liu@gmail.com');
insert into student values('gg',md5('aaa'),'liu@gmail.com');
insert into student values('hhh',md5('aaa'),'liu@gmail.com');
insert into student values('asasd',md5('aaa'),'liu@gmail.com');
insert into student values('taf',md5('aaa'),'liu@gmail.com');
insert into student values('sadf',md5('aaa'),'liu@gmail.com');
insert into student values('agdaa',md5('aaa'),'liu@gmail.com');
insert into student values('aatreraa',md5('aaa'),'liu@gmail.com');
insert into student values('aadsfaaa',md5('aaa'),'liu@gmail.com');
insert into student values('aatea',md5('aaa'),'liu@gmail.com');
insert into student values('ytr',md5('aaa'),'liu@gmail.com');
insert into student values('ddb',md5('bbb'),'ddb@gmail.com');
insert into student values('dda',md5('bbb'),'ddb@gmail.com');
insert into student values('ddc',md5('bbb'),'ddb@gmail.com');
insert into student values('dde',md5('bbb'),'ddb@gmail.com');
insert into student values('ddf',md5('bbb'),'ddb@gmail.com');
insert into student values('ddg',md5('bbb'),'ddb@gmail.com');
insert into student values('ddh',md5('bbb'),'ddb@gmail.com');
insert into student values('ddi',md5('bbb'),'ddb@gmail.com');
insert into student values('ddj',md5('bbb'),'ddb@gmail.com');
insert into student values('ddk',md5('bbb'),'ddb@gmail.com');
create table app(
	student_id varchar(128),
	firstName varchar(128),
	lastName varchar(128),
	gpa double,
	phoneNumber varchar(128),
	email varchar(128),
	graduateDate date,
	workPlace varchar(256),
	primary key(student_id),
	foreign key(student_id) references student(student_id) on delete cascade
)engine=InnoDB;


insert into app values('aaa','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('bbb','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('ccc','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('ddd','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('eee','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('fff','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('ggg','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('gg','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('hhh','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('asasd','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('taf','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('sadf','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('agdaa','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('aatreraa','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('aadsfaaa','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('aatea','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');
insert into app values('ytr','first','last',4,'235','liu@gmail.com','2015-12-30','Chicago');
insert into app values('ddb','first','last',3,'234','liu@gmail.com','2015-12-30','Tokyo');
insert into app values('dda','first','last',3,'233','liu@gmail.com','2015-12-30','Miami');
insert into app values('ddc','first','last',4,'231','liu@gmail.com','2015-12-30','Chicago');
insert into app values('dde','first','last',4,'231','liw@gmail.com','2015-12-30','Chicago');
insert into app values('ddf','first','last',5,'234','liw@gmail.com','2015-12-30','Dallas');
insert into app values('ddg','first','last',3,'238','liq@gmail.com','2015-12-30','beijing');
insert into app values('ddh','first','last',3.2,'235','liqt@gmail.com','2015-12-30','Chicago');
insert into app values('ddi','first','last',3.8,'284','li5@gmail.com','2015-12-30','beijing');
insert into app values('ddj','first','last',4.1,'244','liuwe@gmail.com','2015-12-30','Chicago');
insert into app values('ddk','first','last',3.5,'204','liuwe@gmail.com','2015-12-30','HongKong');




create table undergraduate(
	student_id varchar(128),
	program varchar(128),
	level varchar(128),
	primary key(student_id),
	foreign key(student_id) references app(student_id) on delete cascade
)engine=innodb;
insert into undergraduate values('aaa','program','freshman');
insert into undergraduate values('bbb','program','freshman');
insert into undergraduate values('ccc','program','freshman');
insert into undergraduate values('ddd','program','freshman');
insert into undergraduate values('eee','program','freshman');
insert into undergraduate values('fff','program','freshman');
insert into undergraduate values('ggg','program','freshman');
insert into undergraduate values('gg','program','freshman');
insert into undergraduate values('hhh','program','freshman');
insert into undergraduate values('ddi','program1','senior');
insert into undergraduate values('ddj','program2','senior');
insert into undergraduate values('ddk','program2','senior');


create table graduate(
	student_id varchar(128),
	degree varchar(128),
	adviseName varchar(128),
	primary key(student_id),
	foreign key(student_id) references app(student_id) on delete cascade
)engine=innodb;


insert into graduate values('asasd','PhD','bill');
insert into graduate values('taf','PhD','bill');
insert into graduate values('sadf','PhD','bill');
insert into graduate values('agdaa','PhD','bill');
insert into graduate values('aatreraa','master','bill');
insert into graduate values('aadsfaaa','master','bill');
insert into graduate values('aatea','master','bill');
insert into graduate values('ytr','master','bill');
insert into graduate values('ddb','master','JustinBieber');
insert into graduate values('dda','master','JustinBieber');
insert into graduate values('ddc','master','JustinBieber');
insert into graduate values('dde','phD','JustinBieber');
insert into graduate values('ddf','phD','JustinBieber');
insert into graduate values('ddg','phD','JustinBieber');
insert into graduate values('ddh','phD','JustinBieber');


create table interStudent(
	student_id varchar(128),
	score varchar(128),
	semester varchar(128),
	primary key(student_id),
	foreign key(student_id) references app(student_id) on delete cascade
)engine=innodb;


insert into interStudent values('eee','12','fall');
insert into interStudent values('fff','13','fall');
insert into interStudent values('ggg','23','fall');
insert into interStudent values('gg','23','fall');
insert into interStudent values('hhh','13','fall');
insert into interStudent values('aatreraa','23','fall');
insert into interStudent values('aadsfaaa','12','fall');
insert into interStudent values('aatea','12','fall');
insert into interStudent values('ytr','123','fall');
insert into interStudent values('ddk','233','spring');


create table course(
	courseName varchar(128),
	deptment varchar(128),
	primary key(courseName)
)engine=innodb;


INSERT INTO `course` (`courseName`, `deptment`) VALUES
('bio_1010', 'biology'),
('bio_1011', 'biology'),
('bio_1012', 'biology'),
('bio_1013', 'biology'),
('bio_1014', 'biology'),
('cs_1010', 'computerScience'),
('cs_1011', 'computerScience'),
('cs_1012', 'computerScience'),
('cs_1013', 'computerScience'),
('cs_1014', 'computerScience'),
('cs_1015', 'computerScience'),
('phy_1010', 'physics'),
('phy_1011', 'physics'),
('phy_1012', 'physics'),
('phy_1013', 'physics'),
('phy_1014', 'physics'),
('qwe', 'cccccc'),
('qwewqeqw', 'cccccc');

create table curTeach(
	student_id varchar(128),
	courseName varchar(128),
	primary key(student_id,courseName),
	foreign key(student_id) references app(student_id) on delete cascade,
	foreign key(courseName) references course(courseName) on delete cascade
)engine=innodb;


insert into curTeach values('aaa','bio_1010');
insert into curTeach values('aaa','bio_1011');
insert into curTeach values('aaa','bio_1012');
insert into curTeach values('aaa','bio_1013');


insert into curTeach values('bbb','bio_1010');
insert into curTeach values('bbb','bio_1011');
insert into curTeach values('bbb','bio_1012');
insert into curTeach values('bbb','bio_1013');

insert into curTeach values('ccc','bio_1010');
insert into curTeach values('ccc','bio_1011');
insert into curTeach values('ccc','bio_1012');
insert into curTeach values('ccc','bio_1013');

insert into curTeach values('ddd','bio_1010');
insert into curTeach values('ddd','bio_1011');
insert into curTeach values('ddd','bio_1012');
insert into curTeach values('ddd','bio_1013');


insert into curTeach values('eee','bio_1010');
insert into curTeach values('eee','bio_1011');
insert into curTeach values('eee','bio_1012');
insert into curTeach values('eee','bio_1013');

insert into curTeach values('fff','bio_1010');
insert into curTeach values('fff','bio_1011');
insert into curTeach values('fff','bio_1012');
insert into curTeach values('fff','bio_1013');

insert into curTeach values('ggg','bio_1010');
insert into curTeach values('ggg','bio_1011');
insert into curTeach values('ggg','bio_1012');
insert into curTeach values('ggg','bio_1013');


insert into curTeach values('gg','bio_1010');
insert into curTeach values('gg','bio_1011');
insert into curTeach values('gg','bio_1012');
insert into curTeach values('gg','bio_1013');

insert into curTeach values('hhh','bio_1010');
insert into curTeach values('hhh','bio_1011');
insert into curTeach values('hhh','bio_1012');
insert into curTeach values('hhh','bio_1013');

insert into curTeach values('asasd','bio_1010');
insert into curTeach values('asasd','bio_1011');
insert into curTeach values('asasd','bio_1012');
insert into curTeach values('asasd','bio_1013');

insert into curTeach values('taf','bio_1010');
insert into curTeach values('taf','bio_1011');
insert into curTeach values('taf','bio_1012');
insert into curTeach values('taf','bio_1013');

insert into curTeach values('ddb','bio_1010');
insert into curTeach values('ddb','bio_1011');
insert into curTeach values('ddb','bio_1012');
insert into curTeach values('ddb','bio_1013');

insert into curTeach values('dda','bio_1010');
insert into curTeach values('dda','bio_1011');
insert into curTeach values('dda','bio_1012');

insert into curTeach values('ddc','bio_1010');
insert into curTeach values('ddc','bio_1011');
insert into curTeach values('ddc','bio_1012');

insert into curTeach values('dde','bio_1010');
insert into curTeach values('dde','bio_1011');
insert into curTeach values('dde','bio_1012');

insert into curTeach values('ddf','bio_1010');
insert into curTeach values('ddf','bio_1011');
insert into curTeach values('ddf','bio_1012');

insert into curTeach values('ddh','bio_1012');

insert into curTeach values('ddg','bio_1012');

insert into curTeach values('ddi','bio_1011');
insert into curTeach values('ddi','bio_1012');

insert into curTeach values('ddj','bio_1010');
insert into curTeach values('ddj','bio_1011');
insert into curTeach values('ddj','bio_1012');

insert into curTeach values('ddk','bio_1012');

create table preTeach(
	student_id varchar(128),
	courseName varchar(128),
	primary key(student_id,courseName),
	foreign key(student_id) references app(student_id) on delete cascade,
	foreign key(courseName) references course(courseName) on delete cascade
)engine=innodb;


insert into preTeach values('aaa','bio_1010');
insert into preTeach values('aaa','bio_1011');
insert into preTeach values('aaa','bio_1012');
insert into preTeach values('aaa','bio_1013');


insert into preTeach values('bbb','bio_1010');
insert into preTeach values('bbb','bio_1011');
insert into preTeach values('bbb','bio_1012');
insert into preTeach values('bbb','bio_1013');

insert into preTeach values('ccc','bio_1010');
insert into preTeach values('ccc','bio_1011');
insert into preTeach values('ccc','bio_1012');
insert into preTeach values('ccc','bio_1013');

insert into preTeach values('ddd','bio_1010');
insert into preTeach values('ddd','bio_1011');
insert into preTeach values('ddd','bio_1012');
insert into preTeach values('ddd','bio_1013');


insert into preTeach values('eee','bio_1010');
insert into preTeach values('eee','bio_1011');
insert into preTeach values('eee','bio_1012');
insert into preTeach values('eee','bio_1013');

insert into preTeach values('fff','bio_1010');
insert into preTeach values('fff','bio_1011');
insert into preTeach values('fff','bio_1012');
insert into preTeach values('fff','bio_1013');

insert into preTeach values('ggg','bio_1010');
insert into preTeach values('ggg','bio_1011');
insert into preTeach values('ggg','bio_1012');
insert into preTeach values('ggg','bio_1013');


insert into preTeach values('gg','bio_1010');
insert into preTeach values('gg','bio_1011');
insert into preTeach values('gg','bio_1012');
insert into preTeach values('gg','bio_1013');

insert into preTeach values('hhh','bio_1010');
insert into preTeach values('hhh','bio_1011');
insert into preTeach values('hhh','bio_1012');
insert into preTeach values('hhh','bio_1013');

insert into preTeach values('asasd','bio_1010');
insert into preTeach values('asasd','bio_1011');
insert into preTeach values('asasd','bio_1012');
insert into preTeach values('asasd','bio_1013');

insert into preTeach values('taf','bio_1010');
insert into preTeach values('taf','bio_1011');
insert into preTeach values('taf','bio_1012');
insert into preTeach values('taf','bio_1013');

insert into preTeach values('ddb','cs_1010');
insert into preTeach values('ddb','phy_1012');
insert into preTeach values('ddb','bio_1010');

insert into preTeach values('dda','cs_1010');
insert into preTeach values('dda','phy_1012');
insert into preTeach values('dda','bio_1010');

insert into preTeach values('ddc','cs_1010');
insert into preTeach values('ddc','phy_1012');
insert into preTeach values('ddc','bio_1010');

insert into preTeach values('dde','cs_1010');
insert into preTeach values('dde','phy_1012');
insert into preTeach values('dde','bio_1010');

insert into preTeach values('ddf','cs_1010');
insert into preTeach values('ddf','phy_1012');
insert into preTeach values('ddf','bio_1010');

insert into preTeach values('ddh','cs_1010');
insert into preTeach values('ddh','phy_1012');
insert into preTeach values('ddh','bio_1010');

insert into preTeach values('ddi','cs_1010');
insert into preTeach values('ddi','phy_1012');
insert into preTeach values('ddi','bio_1010');

insert into preTeach values('ddj','cs_1010');
insert into preTeach values('ddj','phy_1012');
insert into preTeach values('ddj','bio_1010');

insert into preTeach values('ddk','cs_1010');
insert into preTeach values('ddk','phy_1012');
insert into preTeach values('ddk','bio_1010');

insert into preTeach values('ddg','cs_1010');
insert into preTeach values('ddg','phy_1012');
insert into preTeach values('ddg','bio_1010');

create table likeTeach(
	student_id varchar(128),
	courseName varchar(128),
	score double,
	primary key(student_id,courseName),
	foreign key(student_id) references app(student_id) on delete cascade,
	foreign key(courseName) references course(courseName) on delete cascade
)engine=innodb;

insert into likeTeach values('aaa','bio_1010',123);
insert into likeTeach values('aaa','bio_1011',123);
insert into likeTeach values('aaa','bio_1012',123);
insert into likeTeach values('aaa','bio_1013',123);


insert into likeTeach values('bbb','bio_1010',123);
insert into likeTeach values('bbb','bio_1011',123);
insert into likeTeach values('bbb','bio_1012',123);
insert into likeTeach values('bbb','bio_1013',123);

insert into likeTeach values('ccc','bio_1010',123);
insert into likeTeach values('ccc','bio_1011',123);
insert into likeTeach values('ccc','bio_1012',123);
insert into likeTeach values('ccc','bio_1013',123);

insert into likeTeach values('ddd','bio_1010',123);
insert into likeTeach values('ddd','bio_1011',123);
insert into likeTeach values('ddd','bio_1012',123);
insert into likeTeach values('ddd','bio_1013',123);


insert into likeTeach values('eee','bio_1010',123);
insert into likeTeach values('eee','bio_1011',123);
insert into likeTeach values('eee','bio_1012',123);
insert into likeTeach values('eee','bio_1013',123);

insert into likeTeach values('fff','bio_1010',123);
insert into likeTeach values('fff','bio_1011',123);
insert into likeTeach values('fff','bio_1012',123);
insert into likeTeach values('fff','bio_1013',123);

insert into likeTeach values('ggg','bio_1010',123);
insert into likeTeach values('ggg','bio_1011',123);
insert into likeTeach values('ggg','bio_1012',123);
insert into likeTeach values('ggg','bio_1013',123);


insert into likeTeach values('gg','bio_1010',123);
insert into likeTeach values('gg','bio_1011',123);
insert into likeTeach values('gg','bio_1012',123);
insert into likeTeach values('gg','bio_1013',123);

insert into likeTeach values('hhh','bio_1010',123);
insert into likeTeach values('hhh','bio_1011',123);
insert into likeTeach values('hhh','bio_1012',123);
insert into likeTeach values('hhh','bio_1013',123);

insert into likeTeach values('asasd','bio_1010',123);
insert into likeTeach values('asasd','bio_1011',123);
insert into likeTeach values('asasd','bio_1012',123);
insert into likeTeach values('asasd','bio_1013',123);

insert into likeTeach values('taf','bio_1010',123);
insert into likeTeach values('taf','bio_1011',123);
insert into likeTeach values('taf','bio_1012',123);
insert into likeTeach values('taf','bio_1013',123);

insert into likeTeach values('ddc','bio_1012',123);
insert into likeTeach values('dda','bio_1013',123);
insert into likeTeach values('ddb','bio_1013',123);
insert into likeTeach values('dde','bio_1012',123);
insert into likeTeach values('ddf','bio_1012',123);
insert into likeTeach values('ddg','bio_1012',123);
insert into likeTeach values('ddh','bio_1012',123);
insert into likeTeach values('ddi','bio_1012',123);
insert into likeTeach values('ddj','bio_1012',123);
insert into likeTeach values('ddk','bio_1012',123);



 CREATE TABLE `admin` (
  `admin_id` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into admin values('admin', md5('password'), 'admin@fakeemail.com');

create table instructor(
	faculty_id varchar(128),
	password varchar(128),
	email varchar(128),
	primary key(faculty_id)
)engine=InnoDB;

insert into instructor values('instructor', md5('password'), 'admin@fakeemail.com');

CREATE TABLE `comment` (
  `student_id` varchar(128) NOT NULL DEFAULT '',
  `faculty_id` varchar(128) NOT NULL DEFAULT '',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`student_id`,`faculty_id`,`time`), ADD KEY `faculty_id` (`faculty_id`);

--
-- Constraints for dumped tables
--


--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `instructor` (`faculty_id`) ON DELETE CASCADE;

insert into comment values('ggg','teacher1',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('ggg','teacher2',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('ggg','teacher3',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");


insert into comment values('ggg','teacher4',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('ggg','teacher5',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('ggg','teacher6',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");


insert into comment values('liuqitn','teacher1',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('liuqitn','teacher2',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('liuqitn','teacher3',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");


insert into comment values('hhh','teacher1',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('hhh','teacher2',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");
insert into comment values('hhh','teacher3',now(),"Catch the star that holds your destiny, the one that forever twinkles within your heart. Take advantage of precious opportunities while they still sparkle before you. Always believe that your ultimate goal is attainable as long as you commit yourself to it. Though barriers may sometimes stand in the way of your dreams, remember that your destiny is hiding behind them. Accept the fact that not everyone is going to approve of the choices you’ve made. Have faith in your judgment. Catch the star that twinkles in your heart and it will lead you to your destiny’s path. Follow that pathway and uncover the sweet sunrises that await you. ");


CREATE TABLE `status` (
  `student_id` varchar(128) NOT NULL DEFAULT '',
  `nation` varchar(128) DEFAULT NULL,
  `Degrees` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `status`
  ADD PRIMARY KEY (`student_id`);
ALTER TABLE `status`
ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `app` (`student_id`) ON DELETE CASCADE;

insert into status values('aaa','native','undergraduate');
insert into status values('bbb','native','undergraduate');
insert into status values('ccc','native','undergraduate');
insert into status values('ddd','native','undergraduate');
insert into status values('eee','international','undergraduate');
insert into status values('fff','international','undergraduate');
insert into status values('ggg','international','undergraduate');
insert into status values('gg','international','undergraduate');
insert into status values('hhh','international','undergraduate');
insert into status values('asasd','native','graduate');
insert into status values('taf','native','graduate');
insert into status values('sadf','native','graduate');
insert into status values('agdaa','native','graduate');
insert into status values('aatreraa','international','graduate');
insert into status values('aadsfaaa','international','graduate');
insert into status values('aatea','international','graduate');
insert into status values('ytr','international','graduate');
insert into status values('ddb','native','graduate');
insert into status values('dda','native','graduate');
insert into status values('ddc','native','graduate');
insert into status values('dde','native','graduate');
insert into status values('ddf','native','graduate');
insert into status values('ddg','native','graduate');
insert into status values('ddh','native','graduate');
insert into status values('ddi','native','undergraduate');
insert into status values('ddj','native','undergraduate');
insert into status values('ddk','international','undergraduate');


CREATE TABLE `disagree` (
  `student_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disagree`
--
ALTER TABLE `disagree`
  ADD KEY `student_id` (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disagree`
--
ALTER TABLE `disagree`
ADD CONSTRAINT `disagree_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE;




CREATE TABLE `agree` (
  `student_id` varchar(128) DEFAULT NULL,
  `courseName` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agree`
--
ALTER TABLE `agree`
  ADD KEY `student_id` (`student_id`), ADD KEY `courseName` (`courseName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agree`
--
ALTER TABLE `agree`
ADD CONSTRAINT `agree_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
ADD CONSTRAINT `agree_ibfk_2` FOREIGN KEY (`courseName`) REFERENCES `course` (`courseName`) ON DELETE CASCADE;



create table preapp(
	student_id varchar(128),
	firstName varchar(128),
	lastName varchar(128),
	gpa double,
	phoneNumber varchar(128),
	email varchar(128),
	graduateDate date,
	workPlace varchar(256),
	primary key(student_id)
)engine=InnoDB;

delimiter //
CREATE TRIGGER trigger_name after delete
    ON app FOR EACH ROW
    begin
     insert into preapp values(old.student_id,old.firstName,old.lastName,old.gpa,old.phoneNumber,old.email,old.graduateDate,old.workPlace);
    end//
delimiter ;


create view interUnder as
select *
from status natural join app natural join undergraduate natural join interStudent;

create view interGra as
select * from status natural join app natural join graduate natural join interStudent;

create view nativeUnder as
select *
from status natural join app natural join undergraduate;

create view nativeGra as
select *
from status natural join app natural join graduate;

create view statusname as
select student_id,firstName,lastName,nation,Degrees
from status natural join app;

create view allapp as
(select * from app)union(select * from preapp); 
