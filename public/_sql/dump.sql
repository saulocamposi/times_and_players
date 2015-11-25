drop table jogadors;
drop table times;

CREATE TABLE `jogadors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nacionalidade` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `posicao` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `idade` int(2) DEFAULT NULL,
  `time` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `time_id` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

CREATE TABLE `times` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `cidade` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `divisao` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
