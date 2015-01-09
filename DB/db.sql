/*
SQLyog Community v11.51 (64 bit)
MySQL - 5.5.32 : Database - celcount
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`celcount` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `ah_contact_info` */

CREATE TABLE `ah_contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postal_address` varchar(1000) DEFAULT NULL,
  `pobox` int(11) DEFAULT NULL,
  `area_code` varchar(50) DEFAULT NULL,
  `fone_num` varchar(50) DEFAULT NULL,
  `cell_num` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ah_contact_info` */

insert  into `ah_contact_info`(`id`,`postal_address`,`pobox`,`area_code`,`fone_num`,`cell_num`,`fax`,`email`,`email1`,`description`) values (1,'58-59 Sharif Garden Adjacent Salamatpura G. T. Road Lahore,Pakistan.',54920,'','0092 42 36545247','0092 301 4711992','0092 42 36545247','info@alhadeed.com.pk','sales@alhadeed.com.pk','Based on NCSA Mosaic. NCSA Mosaic(TM); was developed at the National Center for Supercomputing Applications at the University of Illinois at Urbana-Champaign.Distributed under a licensing agreement with Spyglass, Inc.');

/*Table structure for table `ah_introduction` */

CREATE TABLE `ah_introduction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `introduction` varchar(10000) DEFAULT '0',
  `pic1` varchar(250) DEFAULT NULL,
  `pic2` varchar(250) DEFAULT NULL,
  `pic3` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ah_introduction` */

insert  into `ah_introduction`(`id`,`introduction`,`pic1`,`pic2`,`pic3`) values (1,'&lt;div id=&quot;txt&quot; style=&quot;color:#FFF&quot;&gt;\r\n	&lt;p align=&quot;justify&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;2&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;2&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;2&quot;&gt;&lt;font color=&quot;#800000&quot;&gt;&lt;b&gt;AL-HADEED&lt;/b&gt;&lt;/font&gt; Machinery has been supplier of quality used machinery throughout the Pakistan and overseas since 1987. We are specialized in small to large conventional machine tools including Lathe, Drilling, Grinding, Vertical and Horizontal Borers &amp;amp; Fabrication Equipment.&lt;/font&gt;&lt;/font&gt;&lt;/font&gt;&lt;/font&gt;&lt;/p&gt;\r\n	&lt;p align=&quot;justify&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;2&quot;&gt;With substantial investment in stock and capital equipment, we are able to supply you with the machinery most suitable to your needs. If we cannot supply you from our stock, we are in a position to locate the exact machine you require as a result of our established international contacts.&lt;br&gt;\r\n		&lt;br&gt;\r\n		We are geographically located to provide excellent service to all Pakistan and beyond. Service is further enhanced by our warehouse facility where viewing and inspection of machinery is possible. The warehouse is also used for export packing of machinery &amp;amp; equipment. We offer a complete package of services to our customers whose business we value greatly.&lt;/font&gt;&lt;/font&gt;&lt;/p&gt;\r\n	&lt;p align=&quot;justify&quot;&gt;&lt;br&gt;\r\n		&lt;font color=&quot;#000000&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;2&quot;&gt;Our commitment to the business is unquestionable which is indicated by our growth over the past years. We pride ourselves on providing a friendly &amp;amp; professional service to metal industry which gives total satisfaction to the group of our important customers who has become our friends over the years. We hope you enjoy using our website and should you require and further information or assistance, please contact us without any hesitation.&lt;/font&gt;&lt;/font&gt;&lt;/p&gt;\r\n	&lt;p align=&quot;justify&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n	&lt;p align=&quot;justify&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;font face=&quot;Tahoma&quot; size=&quot;2&quot;&gt;Thanks a lot for your precious time. &lt;/font&gt;&lt;/font&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;','01201.jpg','01202.jpg','01303.jpg');

/*Table structure for table `ah_mail_list` */

CREATE TABLE `ah_mail_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(400) DEFAULT NULL,
  `job_title` varchar(200) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `postal_code` varchar(25) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `cell` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `flag` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `ah_mail_list` */

insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (1,'ijaz','ali','sirijazali@yhaoo.com','2base2 Technologies','Software Engineer','128A Muslim town Lahore','Lahore','000','03224909901','03244321371','04236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (3,'Shah','Gi','shahgee@gmail.com','2base2 Technologies','Project Manager','128 New Muslim Town.','Lahore','000','03224909901','03244321371','04236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (4,'ijaz','ali','sirijazali@yhaoo.com','2base2 Technologies','Chairman','fdasfdasfdafdasdaf','dfsadfa','fdsafdsa','fdsafdsa','afsddsfa','afdsafsafda',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (5,'ijaz','ali','sirijazali@yhaoo.com','2base2 Technologies','Engineer','dsafasdfdsafdsa','Lahore','54920','24236852672','03244321371','04236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (6,'ijaz','ali','sirijazali@yhaoo.com','2base2 Technologies','Engineer','dsafasdfdsafdsa','Lahore','54920','24236852672','03244321371','04236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (7,'shehzad','mustafa','shehzad_mustafa@gmail.com','2base2 Technologies','Accounts/Admin','dfasfdasfdsa','Lahore','54920','0427285987','03004070690','0426545740',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (8,'asif','ali','asif@gmail.com','2base2 Technologies','Chairman','fsdafdsafdsa','Lahore','54920','0427285987','03004070690','0426545740',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (9,'shah','gi','shahgee@gmail.com','2base2 Technologies','Chairman','dfsafdsa','Lahore','54920','0427285987','03004070690','0426545740',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (11,'sufiyan','ali','m.umerzia@facebook.com','2base2 Technologies','Chief Executive','dfsadfasfda','Lahore','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (12,'ijaz','ali','exceptional_one@rocketmail.com','2base2 Technologies','Chief Executive','dasfasfaf','Lahore','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (13,'ijaz','ali','ruling_minds@yahoo.com','2base2 Technologies','Chairman','dsafdasfafa','punjab','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (14,'ijaz','ali','ruling_minds@yahoo.com','2base2 Technologies','Chairman','dsafasfdasfdasf','Lahore','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (15,'ijaz','ali','usman172@hotmail.com','2base2 Technologies','Engineer','dsafdasfafasd','Lahore','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (16,'fdadaf','dfsa','hibba735@yahoo.com','sfadsa','Chief Executive','sdafasfasf','fdsafdsaf','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (17,'Qari','Tayyab','hibba735@yahoo.com','2base2 Technologies','Chairman','dsaffdsfda','Lahore','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (18,'Qari','Tayyab','ruling_minds@yahoo.com','2base2 Technologies','Chairman','dfsafadfsaf','Lahore','54920','03224909901','03244321371','+924236545640',0);
insert  into `ah_mail_list`(`id`,`f_name`,`l_name`,`email`,`company`,`job_title`,`address`,`city`,`postal_code`,`phone`,`cell`,`fax`,`flag`) values (19,'Qari','ali','ruling_minds@yahoo.com','2base2 Technologies','Chairman','dfsadfadfa','Lahore','54920','03224909901','03244321371','+924236545640',0);

/*Table structure for table `ah_product` */

CREATE TABLE `ah_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `pro_name` varchar(100) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `pic_main` varchar(250) DEFAULT NULL,
  `pic1` varchar(250) DEFAULT NULL,
  `pic2` varchar(250) DEFAULT NULL,
  `pic3` varchar(250) DEFAULT NULL,
  `pdf_title` varchar(250) DEFAULT NULL,
  `pdf_path` varchar(250) DEFAULT NULL,
  `status` tinyint(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ah_product` */

insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (1,'02203','EXECL XL1640 Gap Bed Lathe',28,'value=&quot;value=&quot;value=&quot;Distance Between Centres: 1000mm &lt;br&gt;&quot;&quot;&quot;','1296305721_20081103-Japan_flag.gif','','','','',NULL,3);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (5,'01303','HARRISON M350 Gap Bed Lathe',28,'dfsadfafdsafdsafdsa','01303.jpg','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (6,'01303','HARRISON M350 Gap Bed Lathe',28,'Center Distance: 5ft (1500mm) &lt;br&gt;\r\n3 &amp; 4 Jaw Chuck with Set of reverse jaws &lt;br&gt;\r\nTaper Turning Attachment &lt;br&gt;\r\nCoolant Pump &amp; Light &lt;br&gt;\r\nRear Splash Guard','01303.jpg','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (7,'79887','Testing',25,'jfsal;jfdsaljfs;la','000l052WJC9.jpg','06_08.gif','195463_1204820433_2327784_n.jpg','ali1.jpg','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (8,'0130356','HARRISON M350 Gap Bed Lathe',14,'TBL_MAILING_TBL_MAILING_LISTTBL_MAILING_LISTTBL_MAILING_LISTTBL_MAILING_LISTLIST','','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (9,'02203 fadfsa','dfsaafs',32,'dsafdasfdasfdas','','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (10,'test','sadfdafds',29,'asfdasfdasdfas','','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (11,'02203','dfsafdsa',35,'sadfasfasfdasfdasfdas','','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (12,'0130356','dsafdsafdafad',20,'dfsafdasfdasdfas','','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (13,'a3234','asfdafdas',36,'safdasfadsadfas','','','','','',NULL,1);
insert  into `ah_product`(`id`,`code`,`pro_name`,`category_id`,`description`,`pic_main`,`pic1`,`pic2`,`pic3`,`pdf_title`,`pdf_path`,`status`) values (14,'0130356','abc HARRISON M350 Gap Bed Lathe',31,'sdgfdsfasfsafdasfdafadfsafdas','','','','','',NULL,1);

/*Table structure for table `ah_users` */

CREATE TABLE `ah_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fb_id` bigint(35) NOT NULL,
  `tweet_id` int(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `screen_name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `friends_count` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `ah_users` */

insert  into `ah_users`(`id`,`fb_id`,`tweet_id`,`username`,`password`,`screen_name`,`profile_image`,`friends_count`,`created_at`,`status`) values (35,1382157149,1335821616,'Ijaz Ali','','ijaz','http://a0.twimg.com/profile_images/3519217893/717ad681b4cad86b161f31579fe45239_normal.png',110,'2013-04-24 11:35:07',1);
insert  into `ah_users`(`id`,`fb_id`,`tweet_id`,`username`,`password`,`screen_name`,`profile_image`,`friends_count`,`created_at`,`status`) values (36,100000590978639,1353044562,'Jared Grayston','','Jared Grayston','https://graph.facebook.com/jjgrayston/picture',79,'2013-05-02 08:58:09',1);
insert  into `ah_users`(`id`,`fb_id`,`tweet_id`,`username`,`password`,`screen_name`,`profile_image`,`friends_count`,`created_at`,`status`) values (37,1286469108,86025079,'Naveed Bandesha','','mrcnab','http://a0.twimg.com/profile_images/3627922521/1482097f7e4e5808bc74d62d1727431b_normal.jpeg',342,'2013-05-02 15:16:13',1);
insert  into `ah_users`(`id`,`fb_id`,`tweet_id`,`username`,`password`,`screen_name`,`profile_image`,`friends_count`,`created_at`,`status`) values (38,100000810537705,0,'Muhammad Naveed','','','https://graph.facebook.com/naveed.ali.10441861/picture',115,'2013-05-06 08:40:21',1);
insert  into `ah_users`(`id`,`fb_id`,`tweet_id`,`username`,`password`,`screen_name`,`profile_image`,`friends_count`,`created_at`,`status`) values (40,634153078,0,'Sahil Khan','','','https://graph.facebook.com//picture',4,'2013-05-13 12:19:17',1);
insert  into `ah_users`(`id`,`fb_id`,`tweet_id`,`username`,`password`,`screen_name`,`profile_image`,`friends_count`,`created_at`,`status`) values (41,100001023735619,538173353,'Azhar Muhammad','','Muhammad Azhar','http://a0.twimg.com/sticky/default_profile_images/default_profile_4_normal.png',137,'2013-05-13 15:22:47',1);

/*Table structure for table `modules` */

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `module_path` tinytext NOT NULL,
  `module_status` tinyint(1) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `modules` */

insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (1,'content_management','modules/content_management/content_management.php',1,'2010-09-23 11:43:22','2010-09-23 11:43:22');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (3,'banners_management','modules/banners_management/banners_management.php',1,'2010-09-23 13:02:08','2010-09-23 13:02:08');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (4,'advertisment_management','modules/advertisment_management/advertisment_management.php',1,'2010-09-23 13:25:37','2010-09-23 13:25:37');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (5,'news_n_events_management','modules/news_n_events_management/news_n_events_management.php',1,'2010-09-23 14:27:50','2010-09-23 14:27:50');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (6,'faq_management','modules/faq_management/faq_management.php',1,'2010-09-23 15:04:16','2010-09-23 15:04:16');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (7,'newsletter_management','modules/newsletter_management/newsletter_management.php',1,'2010-09-28 18:03:39','2010-09-28 18:03:39');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (8,'counties_management','modules/counties_management/counties_management.php',1,'2010-09-29 14:33:55','2010-09-29 14:33:55');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (9,'category_management','modules/category_management/category_management.php',1,'2010-09-29 17:23:08','2010-09-29 17:23:08');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (10,'user_management','modules/user_management/user_management.php',1,'2010-10-07 12:00:13','2010-10-07 12:00:13');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (11,'advert_management','modules/advert_management/advert_management.php',1,'2010-10-07 12:09:57','2010-10-07 12:09:57');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (12,'blog_management','modules/blog_management/blog_management.php',1,'2010-12-06 16:50:39','2010-12-06 16:50:39');
insert  into `modules`(`module_id`,`module_name`,`module_path`,`module_status`,`addeddate`,`modifieddate`) values (13,'order_management','modules/order_management/order_management.php',1,'2012-06-12 13:05:19','2012-06-12 13:05:19');

/*Table structure for table `tbl_contents` */

CREATE TABLE `tbl_contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `content_title` tinytext NOT NULL,
  `content_text` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `sef_link` varchar(255) NOT NULL,
  `content_status` tinyint(1) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_contents` */

insert  into `tbl_contents`(`content_id`,`parent_id`,`content_title`,`content_text`,`meta_title`,`meta_description`,`meta_keywords`,`sef_link`,`content_status`,`addeddate`,`modifieddate`) values (1,0,'How it Works','<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>\r\n<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>\r\n<p>&nbsp;</p>\r\n<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>','How it Works Meta Title','How it Works Meta Description','How it Works Keywords','',1,'2013-05-03 00:13:24','2013-05-03 00:13:24');
insert  into `tbl_contents`(`content_id`,`parent_id`,`content_title`,`content_text`,`meta_title`,`meta_description`,`meta_keywords`,`sef_link`,`content_status`,`addeddate`,`modifieddate`) values (2,0,'About Us','<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>','About Us','About Us Meta Description','About Us Keywords','',1,'2013-05-03 00:17:07','2013-05-03 00:17:07');
insert  into `tbl_contents`(`content_id`,`parent_id`,`content_title`,`content_text`,`meta_title`,`meta_description`,`meta_keywords`,`sef_link`,`content_status`,`addeddate`,`modifieddate`) values (3,0,'Contact Us','<p>Contact Details comes Here!!!</p>','Contact Us ','Contact Us','Contact Us','',1,'2013-05-03 00:17:54','2013-05-03 00:17:54');

/*Table structure for table `tbl_group_creators` */

CREATE TABLE `tbl_group_creators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_group_creators` */

insert  into `tbl_group_creators`(`id`,`user_id`,`group_id`,`addeddate`) values (1,37,11,'2013-05-14 04:33:26');

/*Table structure for table `tbl_groups` */

CREATE TABLE `tbl_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_title` varchar(255) NOT NULL,
  `group_init` varchar(5) NOT NULL,
  `group_type` varchar(255) NOT NULL,
  `group_image` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_groups` */

insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (9,'WorkSpace','W','Work','data/1368506188','0000-00-00 00:00:00');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (4,'My New Group','M','Global','data/1367835950','0000-00-00 00:00:00');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (5,'Another Group','A','Work','data/1367836872','0000-00-00 00:00:00');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (6,'test','t','Work','data/1367837479Chrysanthemum.jpg','0000-00-00 00:00:00');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (7,'Naughty Group','N','My Gang','data/1367837593Tulips.jpg','0000-00-00 00:00:00');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (8,'General Group','G','Global','data/1367837722Koala.jpg','0000-00-00 00:00:00');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (10,'Loader','L','My Gang','data/1368506513noimage.jpg','2013-05-13 23:41:53');
insert  into `tbl_groups`(`group_id`,`group_title`,`group_init`,`group_type`,`group_image`,`added_date`) values (11,'Task Group','T','My Gang','data/1368524006','0000-00-00 00:00:00');

/*Table structure for table `tbl_news_and_events` */

CREATE TABLE `tbl_news_and_events` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_text` text NOT NULL,
  `news_status` tinyint(1) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_news_and_events` */

insert  into `tbl_news_and_events`(`news_id`,`news_title`,`news_text`,`news_status`,`addeddate`,`modifieddate`) values (11,'First News Heading','<p>First News Details</p>\r\n<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>',1,'2013-05-03 00:32:23','2013-05-03 00:32:23');
insert  into `tbl_news_and_events`(`news_id`,`news_title`,`news_text`,`news_status`,`addeddate`,`modifieddate`) values (12,'Second News','<p>Second News Description</p>\r\n<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>',1,'2013-05-03 00:32:46','2013-05-03 00:32:46');
insert  into `tbl_news_and_events`(`news_id`,`news_title`,`news_text`,`news_status`,`addeddate`,`modifieddate`) values (13,'you need to be sure there','<p>There are many variations of passages of  Lorem Ipsum available, but the majority have suffered alteration in some  form, by injected humour, or randomised words which don	 look even  slightly believable. If you are going to use a passage of Lorem Ipsum,  you need to be sure there isn	 anything embarrassing hidden in the  middle of text. All the Lorem Ipsum generators on the Internet tend to  repeat predefined chunks as necessary, making this the first true  generator on the Internet. It uses a dictionary of over 200 Latin words,  combined with a handful of model sentence structures, to generate Lorem  Ipsum which looks reasonable. The generated Lorem Ipsum is therefore  always free from repetition, injected humour, or non-characteristic  words etc.</p>',1,'2013-05-03 00:33:04','2013-05-03 00:33:04');
insert  into `tbl_news_and_events`(`news_id`,`news_title`,`news_text`,`news_status`,`addeddate`,`modifieddate`) values (14,'News','<div class=\"lc\">\r\n<p><strong>News</strong> is  simply dummy text of the printing and typesetting industry. Lorem Ipsum  has been the industrys standard dummy text ever since the 1500s, when  an unknown printer took a galley of type and scrambled it to make a type  specimen book. It has survived not only five centuries, but also the  leap into electronic typesetting, remaining essentially unchanged. It  was popularised in the 1960s with the release of Letraset sheets  containing Lorem Ipsum passages, and more recently with desktop  publishing software like Aldus PageMaker including versions of Lorem  Ipsum.</p>\r\n</div>',1,'2013-05-03 00:33:20','2013-05-05 23:16:09');
insert  into `tbl_news_and_events`(`news_id`,`news_title`,`news_text`,`news_status`,`addeddate`,`modifieddate`) values (15,'simply dummy text','<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum  has been the industrys standard dummy text ever since the 1500s, when  an unknown printer took a galley of type and scrambled it to make a type  specimen book. It has survived not only five centuries, but also the  leap into electronic typesetting, remaining essentially unchanged. It  was popularised in the 1960s with the release of Letraset sheets  containing Lorem Ipsum passages, and more recently with desktop  publishing software like Aldus PageMaker including versions of Lorem  Ipsum.</p>\r\n<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum  has been the industrys standard dummy text ever since the 1500s, when  an unknown printer took a galley of type and scrambled it to make a type  specimen book. It has survived not only five centuries, but also the  leap into electronic typesetting, remaining essentially unchanged. It  was popularised in the 1960s with the release of Letraset sheets  containing Lorem Ipsum passages, and more recently with desktop  publishing software like Aldus PageMaker including versions of Lorem  Ipsum.</p>',1,'2013-05-08 00:48:44','2013-05-08 00:48:44');
insert  into `tbl_news_and_events`(`news_id`,`news_title`,`news_text`,`news_status`,`addeddate`,`modifieddate`) values (16,'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin','<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It  has roots in a piece of classical Latin literature from 45 BC, making it  over 2000 years old. Richard McClintock, a Latin professor at  Hampden-Sydney College in Virginia, looked up one of the more obscure  Latin words, consectetur, from a Lorem Ipsum passage, and going through  the cites of the word in classical literature, discovered the  undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33  of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by  Cicero, written in 45 BC. This book is a treatise on the theory of  ethics, very popular during the Renaissance. The first line of Lorem  Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section  1.10.32</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It  has roots in a piece of classical Latin literature from 45 BC, making it  over 2000 years old. Richard McClintock, a Latin professor at  Hampden-Sydney College in Virginia, looked up one of the more obscure  Latin words, consectetur, from a Lorem Ipsum passage, and going through  the cites of the word in classical literature, discovered the  undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33  of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by  Cicero, written in 45 BC. This book is a treatise on the theory of  ethics, very popular during the Renaissance. The first line of Lorem  Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section  1.10.32</p>',1,'2013-05-08 00:49:31','2013-05-08 00:49:31');

/*Table structure for table `tbl_social_chart` */

CREATE TABLE `tbl_social_chart` (
  `social_chart_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` int(11) NOT NULL,
  `fb_count` int(11) NOT NULL,
  `twitter_id` int(11) NOT NULL,
  `twitter_count` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`social_chart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_social_chart` */

insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (1,1286469108,147,86025079,195,'2013-05-06 23:04:10');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (2,1286469108,147,86025079,195,'2013-05-06 23:05:01');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (3,1286469108,147,86025079,195,'2013-05-06 23:07:34');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (4,1286469108,147,86025079,195,'2013-05-07 00:53:50');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (5,1286469108,147,86025079,195,'2013-05-07 00:54:51');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (6,2147483647,79,1353044562,0,'2013-05-07 18:06:51');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (7,1286469108,147,86025079,199,'2013-05-08 00:10:38');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (8,1286469108,147,86025079,199,'2013-05-12 22:58:30');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (9,1286469108,150,86025079,199,'2013-05-12 23:42:48');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (10,2147483647,116,0,0,'2013-05-13 03:08:20');
insert  into `tbl_social_chart`(`social_chart_id`,`fb_id`,`fb_count`,`twitter_id`,`twitter_count`,`updated_date`) values (11,2147483647,116,0,0,'2013-05-13 03:10:52');

/*Table structure for table `tbl_top_five_movers` */

CREATE TABLE `tbl_top_five_movers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `celcount_count` int(11) NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_top_five_movers` */

insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (1,37,7,'2013-05-13 00:56:35');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (2,37,7,'2013-05-13 00:56:50');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (3,37,7,'2013-05-13 00:59:01');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (4,37,7,'2013-05-13 00:59:53');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (5,38,116,'2013-05-13 01:02:16');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (6,38,116,'2013-05-13 01:02:28');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (7,38,116,'2013-05-13 01:02:46');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (8,37,7,'2013-05-13 01:12:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (9,38,116,'2013-05-13 01:17:34');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (10,37,7,'2013-05-13 01:18:44');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (11,37,7,'2013-05-13 01:24:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (12,37,7,'2013-05-13 01:24:39');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (13,37,7,'2013-05-13 01:26:35');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (14,37,7,'2013-05-13 01:27:06');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (15,38,116,'2013-05-13 01:34:27');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (16,37,7,'2013-05-13 01:34:45');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (17,37,7,'2013-05-13 01:50:08');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (18,37,7,'2013-05-13 01:52:42');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (19,37,7,'2013-05-13 01:59:26');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (20,37,7,'2013-05-13 02:01:51');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (21,37,7,'2013-05-13 02:07:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (22,37,7,'2013-05-13 02:09:44');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (23,37,7,'2013-05-13 02:13:24');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (24,37,7,'2013-05-13 02:14:59');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (25,37,7,'2013-05-13 02:25:06');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (26,37,7,'2013-05-13 02:26:51');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (27,37,7,'2013-05-13 02:27:52');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (28,37,7,'2013-05-13 02:28:43');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (29,37,7,'2013-05-13 02:31:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (30,37,7,'2013-05-13 02:32:04');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (31,37,7,'2013-05-13 02:33:21');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (32,37,7,'2013-05-13 02:34:27');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (33,37,7,'2013-05-13 02:36:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (34,37,7,'2013-05-13 02:52:23');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (35,37,7,'2013-05-13 02:53:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (36,37,7,'2013-05-13 02:54:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (37,37,7,'2013-05-13 02:56:43');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (38,37,7,'2013-05-13 02:58:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (39,37,7,'2013-05-13 03:00:24');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (40,37,7,'2013-05-13 03:02:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (41,37,7,'2013-05-13 03:03:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (42,37,7,'2013-05-13 03:04:39');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (43,38,116,'2013-05-13 03:06:56');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (44,38,116,'2013-05-13 03:07:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (45,38,116,'2013-05-13 03:08:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (46,37,7,'2013-05-13 03:08:58');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (47,38,116,'2013-05-13 03:10:54');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (48,38,116,'2013-05-13 03:11:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (49,38,116,'2013-05-13 03:11:39');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (50,37,7,'2013-05-13 03:17:35');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (51,37,7,'2013-05-13 03:19:28');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (52,37,7,'2013-05-13 03:22:17');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (53,37,7,'2013-05-13 04:52:29');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (54,37,7,'2013-05-13 05:03:16');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (55,37,7,'2013-05-13 05:20:25');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (56,38,137,'2013-05-13 05:22:51');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (57,38,137,'2013-05-13 05:23:33');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (58,38,137,'2013-05-13 05:24:35');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (59,36,78,'2013-05-13 17:49:41');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (60,36,78,'2013-05-13 17:50:44');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (61,37,9,'2013-05-13 22:09:57');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (62,38,137,'2013-05-13 22:12:48');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (63,38,137,'2013-05-13 22:23:35');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (64,38,137,'2013-05-13 22:27:38');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (65,36,78,'2013-05-13 22:49:47');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (66,37,9,'2013-05-13 23:01:45');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (67,37,9,'2013-05-13 23:03:08');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (68,37,9,'2013-05-13 23:15:10');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (69,37,9,'2013-05-13 23:23:24');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (70,37,9,'2013-05-13 23:26:44');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (71,37,9,'2013-05-13 23:29:05');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (72,37,9,'2013-05-13 23:32:21');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (73,37,9,'2013-05-13 23:33:16');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (74,37,9,'2013-05-13 23:34:16');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (75,37,9,'2013-05-13 23:34:52');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (76,37,9,'2013-05-13 23:36:08');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (77,37,9,'2013-05-13 23:36:36');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (78,37,9,'2013-05-13 23:42:23');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (79,38,137,'2013-05-13 23:52:25');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (80,37,9,'2013-05-14 00:19:18');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (81,37,9,'2013-05-14 00:22:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (82,37,9,'2013-05-14 00:22:58');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (83,37,9,'2013-05-14 00:24:20');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (84,37,9,'2013-05-14 00:26:05');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (85,37,9,'2013-05-14 00:26:56');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (86,37,9,'2013-05-14 00:27:57');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (87,37,9,'2013-05-14 00:28:40');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (88,37,9,'2013-05-14 00:28:42');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (89,37,9,'2013-05-14 00:30:01');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (90,37,9,'2013-05-14 00:31:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (91,37,9,'2013-05-14 00:35:23');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (92,37,9,'2013-05-14 00:56:31');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (93,37,9,'2013-05-14 00:56:52');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (94,37,9,'2013-05-14 00:57:23');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (95,37,9,'2013-05-14 01:03:56');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (96,37,9,'2013-05-14 01:07:09');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (97,37,9,'2013-05-14 01:10:14');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (98,37,9,'2013-05-14 01:10:38');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (99,37,9,'2013-05-14 01:11:46');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (100,37,9,'2013-05-14 01:27:36');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (101,37,9,'2013-05-14 02:51:42');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (102,37,9,'2013-05-14 02:51:58');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (103,37,9,'2013-05-14 03:03:48');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (104,37,9,'2013-05-14 03:56:17');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (105,37,9,'2013-05-14 03:58:48');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (106,37,9,'2013-05-14 03:59:01');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (107,37,9,'2013-05-14 04:01:52');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (108,37,9,'2013-05-14 04:02:11');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (109,37,9,'2013-05-14 04:02:25');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (110,37,9,'2013-05-14 04:03:18');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (111,37,9,'2013-05-14 04:04:13');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (112,37,9,'2013-05-14 04:04:23');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (113,37,9,'2013-05-14 04:05:50');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (114,37,9,'2013-05-14 04:07:14');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (115,37,9,'2013-05-14 04:10:52');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (116,37,9,'2013-05-14 04:12:20');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (117,37,9,'2013-05-14 04:34:09');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (118,37,9,'2013-05-14 04:34:16');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (119,37,9,'2013-05-14 04:35:28');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (120,37,9,'2013-05-14 04:35:53');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (121,37,9,'2013-05-14 04:39:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (122,37,9,'2013-05-14 04:39:07');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (123,37,9,'2013-05-14 04:39:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (124,37,9,'2013-05-14 06:01:20');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (125,37,9,'2013-05-14 06:02:15');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (126,37,9,'2013-05-14 06:04:15');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (127,37,9,'2013-05-14 06:06:01');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (128,37,9,'2013-05-14 06:07:43');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (129,37,9,'2013-05-14 06:08:37');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (130,37,9,'2013-05-14 06:18:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (131,37,9,'2013-05-14 06:18:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (132,37,9,'2013-05-14 06:19:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (133,37,9,'2013-05-14 06:21:40');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (134,37,9,'2013-05-14 06:22:57');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (135,37,9,'2013-05-14 06:23:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (136,37,9,'2013-05-14 06:24:05');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (137,37,9,'2013-05-14 06:24:34');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (138,37,9,'2013-05-14 06:25:24');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (139,37,9,'2013-05-14 06:26:23');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (140,37,9,'2013-05-14 06:26:44');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (141,37,9,'2013-05-14 06:26:59');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (142,37,9,'2013-05-14 06:27:42');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (143,37,9,'2013-05-14 06:29:17');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (144,37,9,'2013-05-14 06:30:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (145,37,9,'2013-05-14 06:31:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (146,37,9,'2013-05-14 06:32:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (147,37,9,'2013-05-14 06:33:51');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (148,37,9,'2013-05-14 06:34:45');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (149,37,9,'2013-05-14 06:42:10');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (150,37,9,'2013-05-14 06:42:58');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (151,37,9,'2013-05-14 06:47:26');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (152,36,78,'2013-05-14 22:07:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (153,38,137,'2013-05-14 22:10:55');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (154,38,137,'2013-05-14 22:12:01');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (155,38,137,'2013-05-14 22:13:03');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (156,37,9,'2013-05-14 22:13:20');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (157,38,137,'2013-05-14 22:13:40');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (158,38,137,'2013-05-14 22:14:30');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (159,37,9,'2013-05-14 23:40:36');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (160,37,9,'2013-05-14 23:53:50');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (161,37,9,'2013-05-14 23:56:11');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (162,36,78,'2013-05-15 01:10:08');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (163,36,78,'2013-05-15 01:10:41');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (164,36,78,'2013-05-15 01:10:44');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (165,36,78,'2013-05-15 01:11:20');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (166,36,78,'2013-05-15 01:11:22');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (167,36,78,'2013-05-15 01:11:49');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (168,36,78,'2013-05-15 01:11:57');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (169,37,9,'2013-05-15 01:12:15');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (170,37,9,'2013-05-15 01:17:27');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (171,37,9,'2013-05-15 01:17:59');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (172,37,9,'2013-05-15 01:19:30');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (173,37,9,'2013-05-15 01:19:58');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (174,37,9,'2013-05-15 01:20:16');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (175,37,9,'2013-05-15 01:20:27');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (176,37,9,'2013-05-15 01:21:43');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (177,37,9,'2013-05-15 01:21:46');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (178,37,9,'2013-05-15 01:22:46');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (179,37,9,'2013-05-15 01:23:24');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (180,37,9,'2013-05-15 01:23:27');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (181,37,9,'2013-05-15 01:28:34');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (182,37,9,'2013-05-15 01:28:37');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (183,37,9,'2013-05-15 01:28:39');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (184,37,9,'2013-05-15 01:29:10');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (185,36,78,'2013-05-15 01:30:36');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (186,36,78,'2013-05-15 01:30:38');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (187,37,9,'2013-05-15 01:30:40');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (188,36,78,'2013-05-15 01:31:37');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (189,36,78,'2013-05-15 01:34:02');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (190,36,78,'2013-05-15 01:34:08');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (191,37,9,'2013-05-15 04:10:26');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (192,36,78,'2013-05-15 22:48:25');
insert  into `tbl_top_five_movers`(`id`,`user_id`,`celcount_count`,`modifieddate`) values (193,37,10,'2013-05-16 02:15:09');

/*Table structure for table `user_fav_groups` */

CREATE TABLE `user_fav_groups` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `user_fav_groups` */

insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (1,37,6,'2013-05-08 02:29:38');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (2,37,7,'2013-05-08 02:29:40');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (3,37,6,'2013-05-08 02:29:52');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (4,37,7,'2013-05-08 02:29:53');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (5,37,7,'2013-05-08 02:29:53');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (6,37,6,'2013-05-08 02:29:53');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (7,37,5,'2013-05-08 02:38:20');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (8,37,5,'2013-05-08 02:38:20');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (9,37,8,'2013-05-08 02:38:22');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (10,37,8,'2013-05-08 02:38:22');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (11,37,4,'2013-05-08 02:38:45');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (12,37,4,'2013-05-08 03:29:59');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (13,37,5,'2013-05-08 03:29:59');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (14,37,7,'2013-05-08 03:30:02');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (15,37,8,'2013-05-08 03:30:05');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (16,39,0,'2013-05-13 22:11:55');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (17,37,9,'2013-05-14 01:08:54');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (18,37,5,'2013-05-14 01:09:00');
insert  into `user_fav_groups`(`fav_id`,`user_id`,`group_id`,`addeddate`) values (19,37,6,'2013-05-14 01:09:07');

/*Table structure for table `user_fb` */

CREATE TABLE `user_fb` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `fb_id` bigint(35) NOT NULL,
  `name` varchar(250) NOT NULL,
  `friends_count` int(10) NOT NULL,
  `profile_image` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `user_fb` */

insert  into `user_fb`(`id`,`fb_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (57,100001023735619,'Azhar Muhammad',136,'https://graph.facebook.com/azhar.muhammad.7330/picture','2013-05-13 15:20:04',1);
insert  into `user_fb`(`id`,`fb_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (55,100000810537705,'Muhammad Naveed',115,'https://graph.facebook.com/naveed.ali.10441861/picture','2013-05-06 08:40:21',1);
insert  into `user_fb`(`id`,`fb_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (56,634153078,'Sahil Khan',4,'https://graph.facebook.com//picture','2013-05-13 12:19:17',1);
insert  into `user_fb`(`id`,`fb_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (54,1286469108,'Naveed Bandesha',147,'https://graph.facebook.com/mrcnab/picture','2013-05-02 15:15:36',1);
insert  into `user_fb`(`id`,`fb_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (52,1382157149,'Ijaz Ali',64,'https://graph.facebook.com/ijazalise/picture','2013-04-24 11:34:52',1);
insert  into `user_fb`(`id`,`fb_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (53,100000590978639,'Jared Grayston',79,'https://graph.facebook.com/jjgrayston/picture','2013-05-02 08:58:09',1);

/*Table structure for table `user_to_group` */

CREATE TABLE `user_to_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `user_to_group` */

insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (1,37,6,'0000-00-00 00:00:00');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (2,37,6,'2013-05-08 01:26:16');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (3,35,6,'2013-05-08 01:57:18');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (4,36,6,'2013-05-08 02:02:01');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (5,37,6,'2013-05-08 02:07:52');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (6,37,6,'2013-05-08 02:13:59');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (7,37,6,'2013-05-08 02:14:04');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (8,37,6,'2013-05-08 02:15:10');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (9,37,6,'2013-05-08 02:15:14');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (10,37,6,'2013-05-08 02:18:57');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (11,37,7,'2013-05-08 02:19:06');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (12,37,6,'2013-05-08 02:19:09');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (13,37,7,'2013-05-08 02:19:10');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (14,37,5,'2013-05-08 02:38:18');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (15,37,8,'2013-05-08 02:38:21');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (16,37,4,'2013-05-08 02:38:43');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (17,37,4,'2013-05-08 03:29:59');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (18,37,5,'2013-05-08 03:30:00');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (19,37,7,'2013-05-08 03:30:03');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (20,37,8,'2013-05-08 03:30:10');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (30,36,7,'2013-05-15 01:11:37');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (29,36,9,'2013-05-15 01:11:34');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (23,37,9,'2013-05-14 01:08:49');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (24,37,5,'2013-05-14 01:08:58');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (25,37,6,'2013-05-14 01:09:06');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (28,36,9,'2013-05-15 01:11:31');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (27,37,11,'2013-05-14 06:24:19');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (31,36,7,'2013-05-15 01:11:41');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (32,36,7,'2013-05-15 01:11:45');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (33,36,8,'2013-05-15 01:30:58');
insert  into `user_to_group`(`id`,`user_id`,`group_id`,`addeddate`) values (34,36,8,'2013-05-15 01:31:02');

/*Table structure for table `user_to_member` */

CREATE TABLE `user_to_member` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `member_id` int(111) NOT NULL,
  `addeddate` datetime NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `user_to_member` */

insert  into `user_to_member`(`fav_id`,`user_id`,`member_id`,`addeddate`) values (50,37,35,'2013-05-14 01:56:21');
insert  into `user_to_member`(`fav_id`,`user_id`,`member_id`,`addeddate`) values (49,37,36,'2013-05-14 01:56:17');
insert  into `user_to_member`(`fav_id`,`user_id`,`member_id`,`addeddate`) values (48,37,37,'2013-05-14 01:54:19');
insert  into `user_to_member`(`fav_id`,`user_id`,`member_id`,`addeddate`) values (47,37,38,'2013-05-14 01:53:45');

/*Table structure for table `user_tweet` */

CREATE TABLE `user_tweet` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `tweet_id` int(25) NOT NULL,
  `name` varchar(250) NOT NULL,
  `friends_count` int(10) NOT NULL,
  `profile_image` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `user_tweet` */

insert  into `user_tweet`(`id`,`tweet_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (32,1335821616,'ijaz',46,'http://a0.twimg.com/profile_images/3519217893/717ad681b4cad86b161f31579fe45239_normal.png','2013-04-24 11:35:07',1);
insert  into `user_tweet`(`id`,`tweet_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (33,1353044562,'Jared Grayston',0,'http://a0.twimg.com/sticky/default_profile_images/default_profile_2_normal.png','2013-05-02 08:57:53',1);
insert  into `user_tweet`(`id`,`tweet_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (34,86025079,'mrcnab',199,'http://a0.twimg.com/profile_images/3627922521/1482097f7e4e5808bc74d62d1727431b_normal.jpeg','2013-05-02 15:16:13',1);
insert  into `user_tweet`(`id`,`tweet_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (35,562800997,'n_nidu',4,'http://a0.twimg.com/sticky/default_profile_images/default_profile_3_normal.png','2013-05-06 08:47:49',1);
insert  into `user_tweet`(`id`,`tweet_id`,`name`,`friends_count`,`profile_image`,`created_at`,`status`) values (36,538173353,'Muhammad Azhar',1,'http://a0.twimg.com/sticky/default_profile_images/default_profile_4_normal.png','2013-05-13 15:22:47',1);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_name`,`user_password`,`first_name`,`last_name`,`user_email`,`phoneNumber`,`address`,`user_status`,`addeddate`,`modifieddate`) values (1,'4ngadmin','wVSX1pFbPinrXz','4 New Generation','Web Solutions','mrcnab@gmail.com','','',1,'2009-01-07 17:48:32','2009-01-13 16:15:34');
insert  into `users`(`user_id`,`user_name`,`user_password`,`first_name`,`last_name`,`user_email`,`phoneNumber`,`address`,`user_status`,`addeddate`,`modifieddate`) values (2,'admin','admin','CelCount','Administrator','mrcnab@gmail.com','00123654789','Xyz\r\nAddress',1,'2009-01-07 17:48:32','2012-06-12 13:10:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
