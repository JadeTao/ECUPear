CREATE DATABASE xhl;
USE xhl;

CREATE TABLE access_token(
	id int primary key default 1,
	token varchar(1024) NOT NULL,
	last_modified timestamp NOT NULL,
	expires_time int NOT NULL
)default charset=utf8;

CREATE TABLE cache(
	id int primary key AUTO_INCREMENT,
	cache_name varchar(50) unique,
	cache text,
	last_modified timestamp NOT NULL
)default charset=utf8;

CREATE TABLE user(
	wechat_id char(28),
	data varchar(2000),
	last_modified timestamp,
	PRIMARY KEY (wechat_id)
)default charset=utf8;

CREATE TABLE advice(
	id int PRIMARY KEY AUTO_INCREMENT,
	wechat_id char(28) NOT NULL,
	advice text,
	time timestamp NOT NULL,
	FOREIGN KEY (wechat_id) REFERENCES user(wechat_id)
)default charset=utf8;

CREATE TABLE user_data(
	wechat_id char(28),
	name varchar(100),
	sex enum('male','female'),
	college varchar(50),
	class varchar(50),
	tel varchar(50),
	qq int(20),
	email varchar(100),
	politic_status varchar(30),
	PRIMARY KEY (wechat_id),
	FOREIGH KEY (wechat_id) REFERENCES user(wechat_id)
)default charset=utf8;




CREATE TABLE IF NOT EXISTS `dianhua` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `mingchen` char(20) NOT NULL,
  `phone` char(10) NOT NULL,
  `shuxing` char(15) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `dianhua`
--

INSERT INTO `dianhua` (`rowid`, `mingchen`, `phone`, `shuxing`) VALUES
(1, 'test', '00000000', '测试');