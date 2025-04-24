/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.27-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `tbl_users` (
	`User_id` double ,
	`Email` varchar (180),
	`First_name` varchar (120),
	`Last_name` varchar (120),
	`Password` varchar (180),
	`Created_by` double ,
	`Updated_by` double ,
	`Deleted_by` double ,
	`Created_at` datetime ,
	`Updated_at` datetime ,
	`Deleted_at` datetime ,
	`Status` double 
); 
