SET SQL_MODE = "AUTO_VALUE_ON_ZERO";

CREATE TABLE `tblstudents`(
    `id` int(10)  AUTO_INCREMENT,
    `StudentId` varchar(200) PRIMARY KEY NOT NULL,
    `StudentNames` varchar(200),
    `ClassName` varchar(299),
    `RegDate` timestamp
);
CREATE TABLE `tblbooks`(
    `id` int(10) PRIMARY KEY AUTO_INCREMENT,
    `StudentId` varchar(200),
    `BookTitle` varchar(100),
    `BookNo` varchar(30),
    `ReturnStatus` int(2),
    `issuedate` timestamp,
    `ReturnDate` timestamp NOT NULL DEFAULT "0000-00-00 00:00:00" ON UPDATE current_timestamp()
);
CREATE TABLE `tblclasses`(
    `id` int(20) PRIMARY KEY AUTO_INCREMENT,
    `ClassName` varchar(200)
);
INSERT INTO `tblclasses`(id,ClassName) VALUES
(1,"S1 A"),
(2,"S1 B"),
(3,"S1 C"),
(4,"S2 A"),
(5,"S2 B"),
(6,"S2 C"),
(7,"S3 A"),
(8,"S3 B"),
(9,"S3 C"),
(10,"S4 MCB"),
(11,"S4 MPC"),
(12,"S4 MPG"),
(13,"S4 PCB"),
(14,"S4 PCM"),
(15,"S5 MCB"),
(16,"S5 MPC"),
(17,"S5 MPG"),
(18,"S5 PCB"),
(19,"S5 PCM"),
(21,"S6 MCB"),
(22,"S6 MPC"),
(23,"S6 MPG"),
(24,"S6 PCB"),
(25,"S6 PCM");
CREATE TABLE `tbllibararian`(
    `id` int(10) PRIMARY KEY AUTO_INCREMENT,
    `Name` varchar(200),
    `Password` varchar(200)
);
CREATE TABLE `tblborrowers` LIKE `tblstudents`;
