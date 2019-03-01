/*
SQLyog Enterprise v10.42 
MySQL - 5.7.21 : Database - pegadaian
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`id8803900_pegadaian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `id8803900_pegadaian`;

/*Table structure for table `cabang` */

DROP TABLE IF EXISTS `cabang`;

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `inisial` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `cabang` */

insert  into `cabang`(`id_cabang`,`nama`,`inisial`) values (10,'CP Blitar','BLT'),(9,'CP Kepanjen','KPJ'),(8,'CP Singosari','SGS'),(7,'CP Tlogomas','TLG'),(6,'CPS Landungsari','LDS'),(5,'CP Turen','TUR'),(4,'CP Rampal','RPL'),(3,'CP Kotalama','KTL'),(2,'CP Blimbing','BLI'),(1,'CP Malang','MLG');

/*Table structure for table `mikro` */

DROP TABLE IF EXISTS `mikro`;

CREATE TABLE `mikro` (
  `id_mikro` int(11) NOT NULL AUTO_INCREMENT,
  `rekening` bigint(16) NOT NULL,
  `nama_nasabah` varchar(500) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `uang_pinjaman` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_pinjaman` varchar(15) NOT NULL,
  PRIMARY KEY (`id_mikro`),
  UNIQUE KEY `rekening` (`rekening`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mikro` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `rekening` bigint(16) NOT NULL,
  `nama_nasabah` varchar(255) NOT NULL,
  `tanggal_closing` date NOT NULL,
  `jumlah_keping` int(11) NOT NULL,
  `jumlah_gram` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nilai_pembiayaan` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  UNIQUE KEY `rekening` (`rekening`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET macce NOT NULL,
  `akses` enum('admin','user','cabang') NOT NULL,
  `id_cabang` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`username`,`password`,`akses`,`id_cabang`) values (13,'CP Malang','malang','e10adc3949ba59abbe56e057f20f883e','cabang',1),(14,'Sukun','sukun','e10adc3949ba59abbe56e057f20f883e','user',1),(16,'Dieng','dieng','e10adc3949ba59abbe56e057f20f883e','user',1),(17,'MOG','mog','e10adc3949ba59abbe56e057f20f883e','user',1),(18,'CP Blimbing','blimbing','e10adc3949ba59abbe56e057f20f883e','cabang',2),(19,'Tumpang','tumpang','e10adc3949ba59abbe56e057f20f883e','user',2),(20,'LA Sucipto','lasucipto','e10adc3949ba59abbe56e057f20f883e','user',2),(21,'Pakis','pakis','e10adc3949ba59abbe56e057f20f883e','user',2),(22,'Piranha/Yani','piranhayani','e10adc3949ba59abbe56e057f20f883e','user',2),(23,'Candi Panggung','pangung','e10adc3949ba59abbe56e057f20f883e','user',2),(24,'CP Kotalama','kotalama','e10adc3949ba59abbe56e057f20f883e','cabang',3),(25,'Kebonagung','kebonagung','e10adc3949ba59abbe56e057f20f883e','user',3),(26,'Kebalen','kebalen','e10adc3949ba59abbe56e057f20f883e','user',3),(27,'Matos','matos','e10adc3949ba59abbe56e057f20f883e','user',3),(28,'CP Rampal','rampal','e10adc3949ba59abbe56e057f20f883e','cabang',4),(29,'Tawangmangu','tawangmangu','e10adc3949ba59abbe56e057f20f883e','user',4),(30,'Sulfat','sulfat','e10adc3949ba59abbe56e057f20f883e','user',4),(31,'Sawojajar','sawojajar','e10adc3949ba59abbe56e057f20f883e','user',4),(32,'Pasar Sawojajar','pssawojajar','e10adc3949ba59abbe56e057f20f883e','user',4),(33,'Danau Toba','toba','e10adc3949ba59abbe56e057f20f883e','user',4),(34,'CP Turen','turen','e10adc3949ba59abbe56e057f20f883e','cabang',5),(35,'Wajak','wajak','e10adc3949ba59abbe56e057f20f883e','user',5),(36,'Dampit','dampit','e10adc3949ba59abbe56e057f20f883e','user',5),(37,'Sumawe','sumawe','e10adc3949ba59abbe56e057f20f883e','user',5),(38,'Ampel Gading','ampelgading','e10adc3949ba59abbe56e057f20f883e','user',5),(39,'CPS Landungsari','landungsari','e10adc3949ba59abbe56e057f20f883e','cabang',6),(40,'Bunul','bunul','e10adc3949ba59abbe56e057f20f883e','user',6),(41,'Kauman','kauman','e10adc3949ba59abbe56e057f20f883e','user',6),(42,'Gadang','gadang','e10adc3949ba59abbe56e057f20f883e','user',6),(43,'CP Tlogomas','tlogomas','e10adc3949ba59abbe56e057f20f883e','cabang',7),(44,'Pujon','pujon','e10adc3949ba59abbe56e057f20f883e','user',7),(45,'Batu','batu','e10adc3949ba59abbe56e057f20f883e','user',7),(46,'Temas','temas','e10adc3949ba59abbe56e057f20f883e','user',7),(47,'Punten','punten','e10adc3949ba59abbe56e057f20f883e','user',7),(48,'Sengkaling','sengkaling','e10adc3949ba59abbe56e057f20f883e','user',7),(49,'Bendungan Sutami','sutami','e10adc3949ba59abbe56e057f20f883e','user',7),(50,'Suhat','suhat','e10adc3949ba59abbe56e057f20f883e','user',7),(51,'CP Singosari','singosari','e10adc3949ba59abbe56e057f20f883e','cabang',8),(52,'Karangploso','karangploso','e10adc3949ba59abbe56e057f20f883e','user',8),(53,'Lawang','lawang','e10adc3949ba59abbe56e057f20f883e','user',8),(54,'Pasar Lawang','pslawang','e10adc3949ba59abbe56e057f20f883e','user',8),(55,'Purwosari','purwosari','e10adc3949ba59abbe56e057f20f883e','user',8),(56,'CP Kepanjen','kepanjen','e10adc3949ba59abbe56e057f20f883e','cabang',9),(57,'Pagak','pagak','e10adc3949ba59abbe56e057f20f883e','user',9),(58,'Pasar Pakisaji','pspakisaji','e10adc3949ba59abbe56e057f20f883e','user',9),(59,'Sumberpucung','sumberpucung','e10adc3949ba59abbe56e057f20f883e','user',9),(60,'Donomulyo','donomulyo','e10adc3949ba59abbe56e057f20f883e','user',9),(61,'Pasar Kepanjen','pskepanjen','e10adc3949ba59abbe56e057f20f883e','user',9),(62,'Gondang Legi','gondanglegi','e10adc3949ba59abbe56e057f20f883e','user',9),(63,'Bululawang','bululawang','e10adc3949ba59abbe56e057f20f883e','user',9),(64,'Bantur','bantur','e10adc3949ba59abbe56e057f20f883e','user',9),(65,'CP Blitar','blitar','e10adc3949ba59abbe56e057f20f883e','cabang',10),(66,'Kademangan','kademangan','e10adc3949ba59abbe56e057f20f883e','user',10),(67,'Srengat','srengat','e10adc3949ba59abbe56e057f20f883e','user',10),(68,'Lodoyo','lodoyo','e10adc3949ba59abbe56e057f20f883e','user',10),(69,'Nglegok','nglegok','e10adc3949ba59abbe56e057f20f883e','user',10),(70,'Wlingi','wlingi','e10adc3949ba59abbe56e057f20f883e','user',10),(71,'Kesamben','kesamben','e10adc3949ba59abbe56e057f20f883e','user',10),(72,'admin','admin','e10adc3949ba59abbe56e057f20f883e','admin',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
