# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: ITP4513_1718
# Generation Time: 2018-05-22 07:48:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Managers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Managers`;

CREATE TABLE `Managers` (
  `ManagerId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL DEFAULT '',
  `Password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ManagerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Orders`;

CREATE TABLE `Orders` (
  `OrderId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `RestaurantId` int(11) DEFAULT NULL,
  `SupplierStockId` int(11) DEFAULT NULL,
  `ManagerId` int(11) DEFAULT NULL,
  `WarehouseStaffId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Approved` tinyint(1) DEFAULT '0',
  `PurchaseDate` date DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Restaurants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Restaurants`;

CREATE TABLE `Restaurants` (
  `RestaurantId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Descriptions` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`RestaurantId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Stock
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Stock`;

CREATE TABLE `Stock` (
  `StockId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ManagerId` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`StockId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Suppliers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Suppliers`;

CREATE TABLE `Suppliers` (
  `SupplierId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SupplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table SupplierStock
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SupplierStock`;

CREATE TABLE `SupplierStock` (
  `SupplierStockId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SupplierId` int(11) DEFAULT NULL,
  `StockId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`SupplierStockId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table WarehouseStaff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `WarehouseStaff`;

CREATE TABLE `WarehouseStaff` (
  `WarehouseStaffId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`WarehouseStaffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table WarehouseStock
# ------------------------------------------------------------

DROP TABLE IF EXISTS `WarehouseStock`;

CREATE TABLE `WarehouseStock` (
  `WarehouseStockId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `WarehouseStaffId` int(11) DEFAULT NULL,
  `StockId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`WarehouseStockId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
