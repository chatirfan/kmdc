-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2013 at 11:53 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kmdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE IF NOT EXISTS `assign_course` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`id`, `course_id`, `assigned_by`, `assigned_to`, `created_on`, `year_id`, `section_id`, `batch_year`, `modified_on`, `is_locked`, `status`) VALUES
(2, 2, 1, 19, '2013-07-13 15:21:59', 1, 1, '2013', '0000-00-00 00:00:00', 0, 1),
(3, 3, 1, 19, '2013-07-13 15:22:12', 1, 1, '2013', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE IF NOT EXISTS `content_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `type_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`id`, `type`, `type_desc`) VALUES
(1, 'Podcast', 'Podcast'),
(2, 'Lecture', 'Lecture'),
(3, 'Associated Material', 'Associated Material'),
(4, 'Video', 'Video ');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `description`, `status`, `section_id`, `year_id`, `created_by`, `created_on`) VALUES
(2, '321', 'Physics', 'physics', 2, 1, 1, 42, '2013-07-31 00:00:00'),
(3, '45', 'english', 'eng', 1, 1, 4, 0, '2013-07-05 03:47:23'),
(9, '1000', 'fsfsdfdsfds', 'fdfsfsf', 2, 2, 1, 0, '2013-07-05 04:36:47'),
(10, '1000', 'urdu', 'urdu', 1, 1, 1, 0, '2013-07-05 04:42:30'),
(12, 'ffdsfdsf', 'ffsdfds', 'fsdfsdfds', 1, 1, 1, 1, '2013-07-05 04:46:09'),
(13, 'ahmed', 'ahmed', 'ahmed', 2, 1, 1, 1, '2013-07-05 04:47:05'),
(14, 'testser', 'tester', 'tester', 2, 2, 3, 1, '2013-07-06 18:03:53'),
(17, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 1, 1, 1, 1, '2013-07-06 18:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_assignments`
--

CREATE TABLE IF NOT EXISTS `course_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `batch_year` varchar(4) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_locked` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_assignments`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

CREATE TABLE IF NOT EXISTS `course_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `content_desc` varchar(200) DEFAULT NULL,
  `file_path` int(11) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_lectures`
--

CREATE TABLE IF NOT EXISTS `course_lectures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `topic_desc` text NOT NULL,
  `sort_order` tinyint(2) NOT NULL,
  `lecture_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `day` varchar(10) NOT NULL,
  `content_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `batch_year` varchar(4) NOT NULL,
  `refer_links` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_lectures`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Student', 'Student Group'),
(3, 'Teacher', 'Teacher Group'),
(4, 'HOD', 'Head of Department'),
(5, 'Web Admin', 'Web Administration');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `message_recipients`
--

CREATE TABLE IF NOT EXISTS `message_recipients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message_recipients`
--


-- --------------------------------------------------------

--
-- Table structure for table `notification_board`
--

CREATE TABLE IF NOT EXISTS `notification_board` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notification_board`
--

INSERT INTO `notification_board` (`id`, `news`, `news_desc`, `status`, `section_id`, `year_id`, `group_id`, `created_on`, `modified_on`) VALUES
(1, '<p>\r\n	aaaaaaaaaaaaaaaa</p>\r\n', '<p>\r\n	aaaaaaaaaaaaaa</p>\r\n', 1, 1, 1, 5, '2013-07-06 18:35:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_topic_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `question_anwsers`
--

CREATE TABLE IF NOT EXISTS `question_anwsers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `question_anwsers`
--


-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
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

--
-- Dumping data for table `schedules`
--


-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(100) NOT NULL,
  `section_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `section_desc`) VALUES
(1, 'Medical', 'Medical Section'),
(2, 'Dental', 'Dental Section');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE IF NOT EXISTS `student_courses` (
  `id` bigint(20) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `dob`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1373714688, 1, 'Admin', 'istrator', 'ADMIN', '0', '0000-00-00'),
(2, '\0\0', 'shoaib khan', '40dcf11e0926ad2986af2a83c4a78d50c152bc3c', NULL, 'jansho@gmail.com', NULL, NULL, NULL, NULL, 1372888784, 1372888784, 1, 'shoaib', 'khan', 'abc', '34234234', '0000-00-00'),
(6, '\0\0', 'ahmed', '8c4b7d6dfc9ade0a85209f6b0f4763ae2715185a', NULL, 'shoaibkhan105@live.com', NULL, NULL, NULL, NULL, 1373152694, 1373237270, 1, 'ahmed', 'ahmed', 'kmdc', '1212121212121', '0000-00-00'),
(13, '\0\0', 'syed', '384b31bdc8dc13d0ea49e89d46ae07899ab1702f', NULL, 'syed@edu.pk', NULL, NULL, NULL, NULL, 1373231792, 1373233207, 1, 'syed', NULL, NULL, '46546', '0000-00-00'),
(14, '\0\0', 'HussainHaqani', 'dec0cfb9290266475c925066baa4000c26069154', NULL, 'tech@tims.com', NULL, NULL, NULL, NULL, 1373715202, 1373715202, 1, 'HussainHaqani', NULL, NULL, '0330440', '0000-00-00'),
(15, '\0\0', 'AhmedSaleem', 'd0ce01d9387efcdfd0e1d8b4e79db3fa84312190', NULL, 'ahmed@gmail.com', NULL, NULL, NULL, NULL, 1373715261, 1373715261, 1, 'AhmedSaleem', 'AhmedSaleem', NULL, '0330', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(4, 2, 1),
(13, 6, 2),
(20, 13, 3),
(21, 14, 3),
(22, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_question_attempts`
--

CREATE TABLE IF NOT EXISTS `user_question_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_question_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

CREATE TABLE IF NOT EXISTS `user_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `role_number` varchar(20) DEFAULT NULL,
  `batch_year` varchar(4) DEFAULT NULL COMMENT '2005',
  `section_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `forum_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`id`, `user_id`, `student_id`, `name`, `email`, `father_name`, `address`, `religion`, `phone`, `role_number`, `batch_year`, `section_id`, `year_id`, `forum_id`) VALUES
(6, 6, 'a123', 'ahmed', 'shoaibkhan105@live.com', 'abdul mannan khan', 'house no a 475 gulistan e  jauhar', 'islam', 454545454545, '454545', '2013', 1, 1, 0),
(7, 0, '1222', 'Shoaib Khan', 'shoaib.ss@gmail.com', 'Khan Jee', 'f-1', 'Islam', 330, '22233', '2013', 1, 1, 0),
(8, 15, '030', 'AhmedSaleem', 'ahmed@gmail.com', 'AHmed Kiii', 'ad', 'Isl', 330, '03333', '2013', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher`
--

CREATE TABLE IF NOT EXISTS `user_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `teacher_id` varchar(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL COMMENT 'Engineer',
  `institution` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `forum_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_teacher`
--

INSERT INTO `user_teacher` (`id`, `user_id`, `teacher_id`, `name`, `email`, `phone`, `qualification`, `institution`, `skills`, `designation`, `forum_id`) VALUES
(11, 13, 'A23', 'syed', 'syed@edu.pk', 46546, 'Msc', 'Lums', 'data mining.programming,data structure', 'Professor', 0),
(12, 14, '02220', 'HussainHaqani', 'tech@tims.com', 330440, 'QUA', 'UoK', 'GOOD', 'Assistant', 61);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `year_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `year_desc`) VALUES
(1, '1st Year', '1st Year'),
(2, '2nd Year', '2nd Year'),
(3, '3rd Year', '3rd Year'),
(4, '4th Year', '4th Year');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
