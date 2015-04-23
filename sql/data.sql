DROP TABLE IF EXISTS windows;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS likeTeach;
DROP TABLE IF EXISTS preTeach;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS status;
DROP TABLE IF EXISTS curTeach;
DROP TABLE IF EXISTS course;
DROP TABLE IF EXISTS undergraduate;
DROP TABLE IF EXISTS graduate;
DROP TABLE IF EXISTS interStudent;
DROP TABLE IF EXISTS app;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS instructor;
DROP VIEW IF EXISTS interUnder, interGra, nativeUnder, nativeGra, statusname; 

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
insert into app values('ytr','first','last',5,'234','liu@gmail.com','2015-12-30','beijing');





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



 CREATE TABLE `admin` (
  `admin_id` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table instructor(
	faculty_id varchar(128),
	password varchar(128),
	email varchar(128),
	primary key(faculty_id)
)engine=InnoDB;

create table comment(
	student_id varchar(128),
	faculty_id varchar(128),
	comment text,
	primary key(student_id,faculty_id),
	foreign key(student_id) references student(student_id) on delete cascade,
	foreign key(faculty_id) references instructor(faculty_id) on delete cascade
)engine=InnoDB;


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