/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.34-log : Database - bramka_backup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bramka_backup` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bramka_backup`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text COLLATE utf8_polish_ci,
  `name` text COLLATE utf8_polish_ci,
  `email` text COLLATE utf8_polish_ci,
  `password` text COLLATE utf8_polish_ci,
  `role` text COLLATE utf8_polish_ci,
  `contact` text COLLATE utf8_polish_ci,
  `address` text COLLATE utf8_polish_ci,
  `city` text COLLATE utf8_polish_ci,
  `state` text COLLATE utf8_polish_ci,
  `country` text COLLATE utf8_polish_ci,
  `document1` text COLLATE utf8_polish_ci,
  `document2` text COLLATE utf8_polish_ci,
  `document3` text COLLATE utf8_polish_ci,
  `joining_date` text COLLATE utf8_polish_ci,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`company_name`,`name`,`email`,`password`,`role`,`contact`,`address`,`city`,`state`,`country`,`document1`,`document2`,`document3`,`joining_date`,`date_time`) values (16,'1','admin','admin','d9admind9','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-22 22:56:00');

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `image` text COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `likes` text COLLATE utf8_polish_ci NOT NULL,
  `dislike` text COLLATE utf8_polish_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `blog` */

/*Table structure for table `creditcards` */

DROP TABLE IF EXISTS `creditcards`;

CREATE TABLE `creditcards` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cc_number` text NOT NULL,
  `exp_month` text NOT NULL,
  `exp_year` text NOT NULL,
  `card_holder` varchar(255) NOT NULL,
  `cvc` text NOT NULL,
  `postindex` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `refer` varchar(255) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cc_id`),
  UNIQUE KEY `cc_id_2` (`cc_id`),
  KEY `cc_id` (`cc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `creditcards` */

/*Table structure for table `csvtosql` */

DROP TABLE IF EXISTS `csvtosql`;

CREATE TABLE `csvtosql` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `salary` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `gameinfo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `avgpoint` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `teamabbrev` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `csvtosql` */

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_name` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `company_name` text COLLATE utf8_polish_ci NOT NULL,
  `phone` text COLLATE utf8_polish_ci NOT NULL,
  `mobile` text COLLATE utf8_polish_ci NOT NULL,
  `recievable` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `company_email` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `customers` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` text COLLATE utf8_polish_ci,
  `account_number` text COLLATE utf8_polish_ci,
  `title` text COLLATE utf8_polish_ci,
  `address` text COLLATE utf8_polish_ci,
  `payment` text COLLATE utf8_polish_ci,
  `email` text COLLATE utf8_polish_ci,
  `code` text COLLATE utf8_polish_ci,
  `gridcode` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `gridvalue` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `bank_name` text COLLATE utf8_polish_ci,
  `bank_user_id` text COLLATE utf8_polish_ci,
  `bank_user_password` text COLLATE utf8_polish_ci,
  `bank_auth_type` text COLLATE utf8_polish_ci,
  `bank_auth_pass` text COLLATE utf8_polish_ci,
  `status` text COLLATE utf8_polish_ci,
  `last_login` int(11) DEFAULT '0',
  `beep` int(1) DEFAULT '0',
  `ip` text COLLATE utf8_polish_ci,
  `page_name` text COLLATE utf8_polish_ci,
  `block_session` text COLLATE utf8_polish_ci,
  `block_status` text COLLATE utf8_polish_ci,
  `break` text COLLATE utf8_polish_ci,
  `checkbox` text COLLATE utf8_polish_ci,
  `company_email` text COLLATE utf8_polish_ci,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userip` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `useragent` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `signature_canvas` varchar(250) COLLATE utf8_polish_ci DEFAULT NULL,
  `checked` int(1) DEFAULT NULL,
  `order_flag_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned_ips` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `payment` */

/*Table structure for table `plan` */

DROP TABLE IF EXISTS `plan`;

CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `plan_details` text COLLATE utf8_polish_ci NOT NULL,
  `price_monthly` text COLLATE utf8_polish_ci NOT NULL,
  `price_quarterly` text COLLATE utf8_polish_ci NOT NULL,
  `price_yearly` text COLLATE utf8_polish_ci NOT NULL,
  `users` int(11) NOT NULL,
  `customers` int(11) NOT NULL,
  `vendors` int(11) NOT NULL,
  `company_email` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `plan` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `notification_mail` text COLLATE utf8_polish_ci NOT NULL,
  `redirect_url` text COLLATE utf8_polish_ci NOT NULL,
  `company_email` text COLLATE utf8_polish_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `products` */

/*Table structure for table `reply` */

DROP TABLE IF EXISTS `reply`;

CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` text COLLATE utf8_polish_ci NOT NULL,
  `user_id` text COLLATE utf8_polish_ci NOT NULL,
  `reply` text COLLATE utf8_polish_ci NOT NULL,
  `user_type` text COLLATE utf8_polish_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `reply` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` text COLLATE utf8_polish_ci NOT NULL,
  `user_id` text COLLATE utf8_polish_ci NOT NULL,
  `read` int(2) NOT NULL,
  `write` int(2) NOT NULL,
  `edit` int(2) NOT NULL,
  `delete` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `roles` */

/*Table structure for table `spamcheck` */

DROP TABLE IF EXISTS `spamcheck`;

CREATE TABLE `spamcheck` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) NOT NULL,
  `count` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `spamcheck` */

/*Table structure for table `subscriptions` */

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `activated_on` datetime NOT NULL,
  `amount` float NOT NULL,
  `last_billed` date NOT NULL,
  `nest_bill` date NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `subscriptions` */

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` text COLLATE utf8_polish_ci NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `customer_id` text COLLATE utf8_polish_ci NOT NULL,
  `customer_email` text COLLATE utf8_polish_ci NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `tickets` */

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text COLLATE utf8_polish_ci NOT NULL,
  `payment_id` text COLLATE utf8_polish_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1590 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `transaction` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text COLLATE utf8_polish_ci,
  `last_name` text COLLATE utf8_polish_ci,
  `street` text COLLATE utf8_polish_ci,
  `building_number` text COLLATE utf8_polish_ci,
  `premise_number` text COLLATE utf8_polish_ci,
  `postal_code` text COLLATE utf8_polish_ci,
  `city` text COLLATE utf8_polish_ci,
  `email` text COLLATE utf8_polish_ci,
  `telepone` text COLLATE utf8_polish_ci,
  `country` text COLLATE utf8_polish_ci,
  `payment_id` text COLLATE utf8_polish_ci,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3836 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `user` */

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*Data for the table `user_log` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
