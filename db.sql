-- Adminer 4.8.0 MySQL 5.7.25 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tblaccomodation`;
CREATE TABLE `tblaccomodation` (
  `ACCOMID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOMODATION` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ACCOMDESC` varchar(90) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ACCOMID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblaccomodation` (`ACCOMID`, `ACCOMODATION`, `ACCOMDESC`) VALUES
(12,	'Phòng tiêu chuẩn',	'Phòng thì chật, view thì xấu vl, được cái giá rẻ'),
(13,	'Phòng Superior',	'Phòng này thì ô kê hơn tí, cơ mà vẫn phèn'),
(15,	'Phòng Deluxe',	'Phòng này thì ô kê đấy, chất lượng với cả view đẹp');

DROP TABLE IF EXISTS `tblauto`;
CREATE TABLE `tblauto` (
  `autoid` int(11) NOT NULL AUTO_INCREMENT,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  PRIMARY KEY (`autoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblauto` (`autoid`, `start`, `end`) VALUES
(1,	11122,	1);

DROP TABLE IF EXISTS `tblfirstpartition`;
CREATE TABLE `tblfirstpartition` (
  `FirstPID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstPTitle` text NOT NULL,
  `FirstPImage` varchar(99) NOT NULL,
  `FirstPSubTitle` text NOT NULL,
  `FirstPDescription` text NOT NULL,
  PRIMARY KEY (`FirstPID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblfirstpartition` (`FirstPID`, `FirstPTitle`, `FirstPImage`, `FirstPSubTitle`, `FirstPDescription`) VALUES
(1,	'Welcome to Dragon House',	'5page-img1.png',	'In our Hotel',	'Located on the hills of Nice, a short distance from the famous Promenade des Anglais, Hotel Anis is one of the hotels in the Costa Azzurra (or Blue Coast) able to satisfy the different needs of its guests with comfort and first rate services. It is only 2 km from the airport and from highway exits. The hotel has a large parking area , a real luxury in a city like Nice.');

DROP TABLE IF EXISTS `tblguest`;
CREATE TABLE `tblguest` (
  `GUESTID` int(11) NOT NULL AUTO_INCREMENT,
  `REFNO` int(11) NOT NULL,
  `G_FNAME` varchar(30) NOT NULL,
  `G_LNAME` varchar(30) NOT NULL,
  `G_CITY` varchar(90) NOT NULL,
  `G_ADDRESS` varchar(90) NOT NULL,
  `DBIRTH` date NOT NULL,
  `G_PHONE` varchar(20) NOT NULL,
  `G_NATIONALITY` varchar(30) NOT NULL,
  `G_COMPANY` varchar(90) NOT NULL,
  `G_CADDRESS` varchar(90) NOT NULL,
  `G_TERMS` tinyint(4) NOT NULL,
  `G_EMAIL` varchar(99) NOT NULL,
  `G_UNAME` varchar(255) NOT NULL,
  `G_PASS` varchar(255) NOT NULL,
  `ZIP` int(11) NOT NULL,
  `LOCATION` varchar(125) NOT NULL,
  PRIMARY KEY (`GUESTID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tblmeal`;
CREATE TABLE `tblmeal` (
  `MealID` int(11) NOT NULL AUTO_INCREMENT,
  `MealType` varchar(90) NOT NULL,
  `MealPrice` double NOT NULL,
  PRIMARY KEY (`MealID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblmeal` (`MealID`, `MealType`, `MealPrice`) VALUES
(4,	'Lunch',	10),
(7,	'HB',	10);

DROP TABLE IF EXISTS `tblpayment`;
CREATE TABLE `tblpayment` (
  `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT,
  `TRANSDATE` datetime NOT NULL,
  `CONFIRMATIONCODE` varchar(30) NOT NULL,
  `PQTY` int(11) NOT NULL,
  `GUESTID` int(11) NOT NULL,
  `SPRICE` double NOT NULL,
  `MSGVIEW` tinyint(1) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  PRIMARY KEY (`SUMMARYID`),
  UNIQUE KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`),
  KEY `GUESTID` (`GUESTID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tblreservation`;
CREATE TABLE `tblreservation` (
  `RESERVEID` int(11) NOT NULL AUTO_INCREMENT,
  `CONFIRMATIONCODE` varchar(50) NOT NULL,
  `TRANSDATE` date NOT NULL,
  `ROOMID` int(11) NOT NULL,
  `ARRIVAL` datetime NOT NULL,
  `DEPARTURE` datetime NOT NULL,
  `RPRICE` double NOT NULL,
  `GUESTID` int(11) NOT NULL,
  `PRORPOSE` varchar(30) NOT NULL,
  `STATUS` varchar(11) NOT NULL,
  `BOOKDATE` datetime NOT NULL,
  `REMARKS` text NOT NULL,
  `USERID` int(11) NOT NULL,
  PRIMARY KEY (`RESERVEID`),
  KEY `ROOMID` (`ROOMID`),
  KEY `GUESTID` (`GUESTID`),
  KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tblroom`;
CREATE TABLE `tblroom` (
  `ROOMID` int(11) NOT NULL AUTO_INCREMENT,
  `ROOMNUM` int(11) NOT NULL,
  `ACCOMID` int(11) NOT NULL,
  `ROOM` varchar(30) NOT NULL,
  `ROOMDESC` varchar(255) NOT NULL,
  `NUMPERSON` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  `ROOMIMAGE` varchar(255) NOT NULL,
  `OROOMNUM` int(11) NOT NULL,
  `RoomTypeID` int(11) NOT NULL,
  PRIMARY KEY (`ROOMID`),
  KEY `ACCOMID` (`ACCOMID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ACCOMID`, `ROOM`, `ROOMDESC`, `NUMPERSON`, `PRICE`, `ROOMIMAGE`, `OROOMNUM`, `RoomTypeID`) VALUES
(11,	0,	12,	'Wing A',	'without TV',	1,	10,	'rooms/1.jpg',	1,	0),
(12,	0,	12,	'Wing A',	'Without TV',	2,	15,	'rooms/1.jpg',	1,	0),
(13,	1,	13,	'Wing A',	'Without TV',	1,	445,	'rooms/2.jpg',	3,	0),
(14,	2,	13,	'Wing A',	'Without TV',	2,	495,	'rooms/3.jpg',	4,	0),
(15,	1,	15,	'Wing A',	'Without TV | for groups - minimum of 5 pax | 250php per person',	5,	1250,	'rooms/4.jpg',	1,	0),
(16,	-2,	12,	'Wing B and Ground Floor',	'With TV',	1,	725,	'rooms/3page-img13.jpg',	1,	0);

DROP TABLE IF EXISTS `tblroomtype`;
CREATE TABLE `tblroomtype` (
  `RoomTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `RoomType` varchar(30) NOT NULL,
  PRIMARY KEY (`RoomTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tblslideshow`;
CREATE TABLE `tblslideshow` (
  `SlideID` int(11) NOT NULL AUTO_INCREMENT,
  `SlideImage` text NOT NULL,
  `SlideCaption` text NOT NULL,
  PRIMARY KEY (`SlideID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblslideshow` (`SlideID`, `SlideImage`, `SlideCaption`) VALUES
(15,	'images.jpg',	''),
(16,	'slide-image-3.jpg',	''),
(17,	'header-bg1.jpg',	''),
(18,	'slide-image-3.jpg',	''),
(19,	'Desert.jpg',	''),
(20,	'Koala.jpg',	'');

DROP TABLE IF EXISTS `tbltitle`;
CREATE TABLE `tbltitle` (
  `TItleID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Subtitle` text NOT NULL,
  PRIMARY KEY (`TItleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbltitle` (`TItleID`, `Title`, `Subtitle`) VALUES
(1,	'Dragon House',	'24hrs.');

DROP TABLE IF EXISTS `tbluseraccount`;
CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `UNAME` varchar(30) NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `UPASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PHONE` int(11) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbluseraccount` (`USERID`, `UNAME`, `USER_NAME`, `UPASS`, `ROLE`, `PHONE`) VALUES
(1,	'Mai Công Chuyên nè',	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	'Administrator',	349982248);

DROP TABLE IF EXISTS `tbl_setting_contact`;
CREATE TABLE `tbl_setting_contact` (
  `SetCon_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SetConLocation` varchar(99) NOT NULL,
  `SetConEmail` varchar(99) NOT NULL,
  `SetConContactNo` varchar(99) NOT NULL,
  PRIMARY KEY (`SetCon_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_setting_contact` (`SetCon_ID`, `SetConLocation`, `SetConEmail`, `SetConContactNo`) VALUES
(1,	'Guanzon Street, Kabankalan Catholic College Kabankalan City, 6111 philippines',	'kcc_1927@yahoo.com',	'(034)471-24-79');

-- 2021-04-09 02:14:09
