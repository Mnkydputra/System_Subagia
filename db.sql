/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.4.20-MariaDB : Database - system1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`system1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `system1`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `akun` */

insert  into `akun`(`id`,`email`,`nama`,`password`,`role_id`) values (1,'dasep@email.com','dasep','202cb962ac59075b964b07152d234b70','3');

/*Table structure for table `i_data_requirment` */

DROP TABLE IF EXISTS `i_data_requirment`;

CREATE TABLE `i_data_requirment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awb` varchar(255) DEFAULT NULL,
  `shipref` varchar(255) DEFAULT NULL,
  `product_number` varchar(255) DEFAULT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `pallet` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `hight` varchar(255) DEFAULT NULL,
  `cbm` varchar(255) DEFAULT NULL,
  `date_out` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_data_requirment` */

insert  into `i_data_requirment`(`id`,`awb`,`shipref`,`product_number`,`product_desc`,`quantity`,`pallet`,`long`,`weight`,`hight`,`cbm`,`date_out`) values (25,'1','1','1','baju','2','23','23','22','20','0.23','2016-05-27'),(26,'1','2','1','Celana','1','1','11','111','11','0.01','2015-06-12');

/*Table structure for table `i_delivery_order` */

DROP TABLE IF EXISTS `i_delivery_order`;

CREATE TABLE `i_delivery_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awb` varchar(255) DEFAULT NULL,
  `shipref` varchar(255) DEFAULT NULL,
  `product_number` varchar(255) DEFAULT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `pallet` varchar(255) DEFAULT NULL,
  `total_cbm` varchar(255) DEFAULT NULL,
  `shipment` varchar(200) DEFAULT NULL,
  `truck` varchar(100) DEFAULT NULL,
  `spesial_instruct` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `supir` varchar(100) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_delivery_order` */

insert  into `i_delivery_order`(`id`,`awb`,`shipref`,`product_number`,`product_desc`,`po_number`,`quantity`,`pallet`,`total_cbm`,`shipment`,`truck`,`spesial_instruct`,`tanggal`,`supir`,`status`,`customer`) values (25,'1','1','1','baju','4P2FCB3G4KOM','2','23','0.23',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'1','2','1','Celana','4P2FCB3G4KOM','1','1','0.01',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `i_order_rq` */

DROP TABLE IF EXISTS `i_order_rq`;

CREATE TABLE `i_order_rq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` varchar(200) DEFAULT NULL,
  `supir` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `awb` varchar(100) DEFAULT NULL,
  `truck` varchar(100) DEFAULT NULL,
  `shipment` varchar(100) DEFAULT NULL,
  `spesial_instruct` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_order_rq` */

insert  into `i_order_rq`(`id`,`no_order`,`supir`,`status`,`customer`,`tanggal`,`awb`,`truck`,`shipment`,`spesial_instruct`) values (5,'4P2FCB3G4KOM',NULL,NULL,NULL,'2021-05-27','1','L300','Bandung',' hati hati gengs');

/*Table structure for table `i_po_number` */

DROP TABLE IF EXISTS `i_po_number`;

CREATE TABLE `i_po_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` varchar(11) DEFAULT NULL,
  `po_number` varchar(250) DEFAULT NULL,
  `id_sales_partner` varchar(255) DEFAULT NULL,
  `no_awb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_po_number` */

insert  into `i_po_number`(`id`,`id_po`,`po_number`,`id_sales_partner`,`no_awb`) values (11,NULL,'1','01','1');

/*Table structure for table `i_product` */

DROP TABLE IF EXISTS `i_product`;

CREATE TABLE `i_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` varchar(255) DEFAULT NULL,
  `po_number` varchar(255) DEFAULT NULL,
  `id_sales_partner` varchar(255) DEFAULT NULL,
  `awb` varchar(255) DEFAULT NULL,
  `shipref` varchar(255) DEFAULT NULL,
  `id_product` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `container` varchar(255) DEFAULT NULL,
  `storage_loc` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_product` */

insert  into `i_product`(`id`,`id_po`,`po_number`,`id_sales_partner`,`awb`,`shipref`,`id_product`,`product_name`,`description`,`container`,`storage_loc`,`type`,`quantity`) values (15,'','1','01','1','1','1-1','1','baju','Container','LINE AB-AC','Kain','17'),(16,'','1','01','1','2','2-1','1','Celana','Container','LINE AB-AD','beling','7');

/*Table structure for table `i_stock` */

DROP TABLE IF EXISTS `i_stock`;

CREATE TABLE `i_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipref` varchar(200) DEFAULT NULL,
  `product_number` varchar(200) DEFAULT NULL,
  `product_desc` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `container` varchar(200) DEFAULT NULL,
  `date_in` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_stock` */

/*Table structure for table `i_vendor` */

DROP TABLE IF EXISTS `i_vendor`;

CREATE TABLE `i_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sales_partner` varchar(100) DEFAULT NULL,
  `sales_partner` varchar(100) DEFAULT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `loc_gudang` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_vendor` */

insert  into `i_vendor`(`id`,`id_sales_partner`,`sales_partner`,`short_name`,`loc_gudang`,`name`,`phone`) values (4,'01','indomarco','idm','Jakarta','dasep','081');

/*Table structure for table `i_volume_product` */

DROP TABLE IF EXISTS `i_volume_product`;

CREATE TABLE `i_volume_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_volume_product` varchar(255) DEFAULT NULL,
  `id_product` varchar(255) DEFAULT NULL,
  `l` varchar(255) DEFAULT NULL,
  `w` varchar(255) DEFAULT NULL,
  `h` varchar(255) DEFAULT NULL,
  `pallet` varchar(255) DEFAULT NULL,
  `cbm` varchar(255) DEFAULT NULL,
  `total_cbm` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `i_volume_product` */

insert  into `i_volume_product`(`id`,`id_volume_product`,`id_product`,`l`,`w`,`h`,`pallet`,`cbm`,`total_cbm`,`tanggal`) values (1,'','12-122','23','23','23','232','0.01','2.32','2021-03-12'),(2,'','23-32323','23','232','2323','23','12.3','285.','2016-05-27'),(3,'','RES-RESS','12','12','121','12','0.01','0.24','2019-11-12'),(4,'','05-05656','10','60','50','15','0.03','0.44','2016-05-27'),(5,'','45-45','23','23','2323','232','1.22','285.','2021-06-19'),(6,'','4RESS-','45','34','4','43','0.00','0.43','2021-06-19'),(7,'','23-232','23','23','121','232','','','2016-05-27'),(8,'','20-21','20','20','20','3','0.00','0.03','2021-06-07'),(9,'','1-1','57','10','30','5','0.01','0.1','2016-05-27'),(10,'','2-2','20','20','40','50','0.01','1','2016-06-11'),(11,'','1-1','23','20','121','3','0.05','0.18','2015-06-12'),(12,'','2-1','23','20','2323','1','1.06','1.07','2016-06-11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
