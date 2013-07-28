/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.16 : Database - kmdc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kmdc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kmdc`;

/*Table structure for table `assign_course` */

DROP TABLE IF EXISTS `assign_course`;

CREATE TABLE `assign_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `batch_year` varchar(4) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `assign_course` */

insert  into `assign_course`(`id`,`course_id`,`assigned_by`,`assigned_to`,`created_on`,`year_id`,`section_id`,`batch_year`,`modified_on`,`is_locked`,`status`) values (16,12,1,20,'2013-07-27 11:40:30',1,1,'2013','0000-00-00 00:00:00',0,1);

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_desc` text,
  `file_path` text NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `content` */

insert  into `content`(`id`,`content_desc`,`file_path`,`content_type_id`,`created_by`,`created_on`) values (2,NULL,'67195-fullpage.png',2,1,'2013-07-21 04:40:37'),(3,NULL,'d9f9f-Curriculum-Vitae.pdf',2,1,'2013-07-24 05:12:22');

/*Table structure for table `content_types` */

DROP TABLE IF EXISTS `content_types`;

CREATE TABLE `content_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `type_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `content_types` */

insert  into `content_types`(`id`,`type`,`type_desc`) values (1,'Podcast','Podcast'),(2,'Lecture','Lecture'),(3,'Associated Material','Associated Material'),(4,'Video','Video ');

/*Table structure for table `course_contents` */

DROP TABLE IF EXISTS `course_contents`;

CREATE TABLE `course_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `course_contents` */

/*Table structure for table `course_lectures` */

DROP TABLE IF EXISTS `course_lectures`;

CREATE TABLE `course_lectures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `assign_course_id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `topic_desc` text NOT NULL,
  `sort_order` tinyint(2) NOT NULL,
  `lecture_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `day` varchar(10) NOT NULL,
  `uploaded_file` text NOT NULL,
  `uploaded_audio` text,
  `section_id` int(11) NOT NULL,
  `batch_year` varchar(4) NOT NULL,
  `refer_links` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `course_lectures` */

insert  into `course_lectures`(`id`,`assign_course_id`,`topic`,`topic_desc`,`sort_order`,`lecture_date`,`created_by`,`created_on`,`modified_on`,`day`,`uploaded_file`,`uploaded_audio`,`section_id`,`batch_year`,`refer_links`) values (10,16,'AI','<p>\r\n	LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL</p>\r\n',0,'2013-07-27',1,'2013-07-27 10:05:38','2013-07-27 13:05:38','1','2b18a-featured_image.png','c0f0f-Sleep-Away.mp3',1,'2013',NULL);

/*Table structure for table `course_student` */

DROP TABLE IF EXISTS `course_student`;

CREATE TABLE `course_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='contains relation between student and course';

/*Data for the table `course_student` */

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `courses` */

insert  into `courses`(`id`,`code`,`name`,`department_id`,`description`,`status`,`section_id`,`year_id`,`created_by`,`created_on`) values (12,'df2','Algorithm Design',1,'fsdfsdfds',1,1,1,1,'2013-07-05 04:46:09'),(13,'ahmed','Bio Technology',3,'ahmed',2,1,1,1,'2013-07-05 04:47:05'),(14,'testser','Pakistan Studies',1,'tester',2,2,3,1,'2013-07-06 18:03:53'),(17,'aaaaaaaaaaaaa','Data Structure',1,'aaaaaaaaaaaaa',1,1,1,1,'2013-07-06 18:08:57'),(18,'342','sindhi',2,'sindhi',1,1,1,1,'2013-07-17 06:26:56');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `departments` */

insert  into `departments`(`id`,`name`) values (1,'Computer Science'),(2,'Mathematics'),(3,'Bio Technology');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'Student','Student Group'),(3,'Teacher','Teacher Group'),(4,'HOD','Head of Department'),(5,'Web Admin','Web Administration'),(6,'bvb','1vc');

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `message_recipients` */

DROP TABLE IF EXISTS `message_recipients`;

CREATE TABLE `message_recipients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message_recipients` */

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `messages` */

/*Table structure for table `notification_board` */

DROP TABLE IF EXISTS `notification_board`;

CREATE TABLE `notification_board` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `news` text NOT NULL,
  `news_desc` text NOT NULL,
  `status` int(11) NOT NULL COMMENT 'publish/draft',
  `section_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `notification_board` */

insert  into `notification_board`(`id`,`news`,`news_desc`,`status`,`section_id`,`year_id`,`group_id`,`created_on`,`modified_on`) values (1,'<p>\r\n	aaaaaaaaaaaaaaaa</p>\r\n','<p>\r\n	aaaaaaaaaaaaaa</p>\r\n',2,1,1,5,'2013-07-16 05:50:17','0000-00-00 00:00:00');

/*Table structure for table `question_anwsers` */

DROP TABLE IF EXISTS `question_anwsers`;

CREATE TABLE `question_anwsers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `question_anwsers` */

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lecture_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `type` enum('TF','MCQ') DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `questions` */

insert  into `questions`(`id`,`lecture_id`,`question`,`created_on`,`created_by`,`type`,`reason`) values (1,10,'<p>\r\n	What is AI ?</p>\r\n','2013-07-27 13:15:10',0,NULL,NULL);

/*Table structure for table `schedules` */

DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `start_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `room` varchar(20) NOT NULL,
  `day` varchar(10) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `schedules` */

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(100) NOT NULL,
  `section_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sections` */

insert  into `sections`(`id`,`section`,`section_desc`) values (1,'Medical','Medical Section'),(2,'Dental','Dental Section');

/*Table structure for table `student_course` */

DROP TABLE IF EXISTS `student_course`;

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `assign_course_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `student_course` */

insert  into `student_course`(`id`,`student_id`,`assign_course_id`,`created`) values (26,18,16,'2013-07-27 11:40:30');

/*Table structure for table `user_question_attempts` */

DROP TABLE IF EXISTS `user_question_attempts`;

CREATE TABLE `user_question_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_question_attempts` */

/*Table structure for table `user_student` */

DROP TABLE IF EXISTS `user_student`;

CREATE TABLE `user_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `forum_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_father` bigint(12) NOT NULL,
  `phone_home` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `role_number` varchar(20) DEFAULT NULL,
  `batch_year` varchar(4) DEFAULT NULL COMMENT '2005',
  `section_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `user_student` */

insert  into `user_student`(`id`,`user_id`,`student_id`,`forum_id`,`name`,`dob`,`gender`,`phone_father`,`phone_home`,`email`,`father_name`,`address`,`religion`,`phone`,`role_number`,`batch_year`,`section_id`,`year_id`) values (18,29,'12s',71,'shoaib','2013-07-16','male',555555555,55555555555,'jansho@gmail.com','mannan','gulshan','islam',555555555555,'55555555','2013',1,1),(19,32,'aw2',74,'qutub','2013-07-23','male',4545454,45454545,'qutub@mail.com','syed','abcd','islam',4545454,'fdfdf45','2014',1,1);

/*Table structure for table `user_teacher` */

DROP TABLE IF EXISTS `user_teacher`;

CREATE TABLE `user_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `teacher_id` varchar(20) DEFAULT NULL,
  `forum_id` int(11) NOT NULL DEFAULT '0' COMMENT 'user_id in forums_user table',
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL COMMENT 'Engineer',
  `institution` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `designation` enum('professor','assistant professor','lab attendant') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `user_teacher` */

insert  into `user_teacher`(`id`,`user_id`,`teacher_id`,`forum_id`,`name`,`department_id`,`email`,`phone`,`qualification`,`institution`,`skills`,`designation`) values (20,24,'ad23',65,'humera',1,'humera@gmail.com',545451,'Ms','uok','computer','assistant professor'),(21,30,'123d',72,'Badi',1,'badi@uok.edu',5555555555,'Ms','UOK','many','assistant professor'),(22,31,'we2',73,'shakeel',2,'shakeel@uok.edu',44444,'ms','uok','maths','lab attendant');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`,`dob`) values (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1374907093,1,'Admin','istrator','ADMIN','0','0000-00-00'),(24,'\0\0','humera@gmail.com','10c194d551b008a72ec90fdc8b77559b93f2409b',NULL,'humera@gmail.com',NULL,NULL,NULL,NULL,1373811185,1374175948,1,'humera',NULL,NULL,'545451','0000-00-00'),(29,'\0\0','jansho@gmail.com','37a6a9f1e10ee68b361e3ee6daa93496b64e8deb',NULL,'jansho@gmail.com',NULL,NULL,NULL,NULL,1374021544,1374174905,1,'shoaib','shoaib',NULL,'555555555555','0000-00-00'),(30,'\0\0','badi@uok.edu','6ab6c9e4d3801530455b12ebea984199dde7ca48',NULL,'badi@uok.edu',NULL,NULL,NULL,NULL,1374094944,1374094944,1,'Badi',NULL,NULL,'5555555555','0000-00-00'),(31,'\0\0','shakeel@uok.edu','dc8abe963dc3cbb7aafb08b7141100f721e36792',NULL,'shakeel@uok.edu',NULL,NULL,NULL,NULL,1374095013,1374095013,1,'shakeel',NULL,NULL,'44444','0000-00-00'),(32,'\0\0','qutub@mail.com','a54105e46836de63dcd60a46e8cd44c0c87d2c19',NULL,'qutub@mail.com',NULL,NULL,NULL,NULL,1374357451,1374357451,1,'qutub','qutub',NULL,'4545454','0000-00-00');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values (48,1,1),(40,24,3),(45,29,2),(46,30,3),(47,31,3),(49,32,2);

/*Table structure for table `years` */

DROP TABLE IF EXISTS `years`;

CREATE TABLE `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `year_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `years` */

insert  into `years`(`id`,`year`,`year_desc`) values (1,'1st Year','1st Year'),(2,'2nd Year','2nd Year'),(3,'3rd Year','3rd Year'),(4,'4th Year','4th Year');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
