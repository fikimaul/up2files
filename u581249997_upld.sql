SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `chat` (
`kode_chat` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `chat` varchar(140) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `file` (
`idfile` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `size` longtext NOT NULL,
  `jenis` char(5) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pengguna` (
`iduser` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sandi` varchar(40) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'avatar.png'
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

ALTER TABLE `chat`
 ADD PRIMARY KEY (`kode_chat`), ADD KEY `iduser` (`iduser`);

ALTER TABLE `file`
 ADD PRIMARY KEY (`idfile`), ADD KEY `iduser` (`iduser`);

ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`iduser`), ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `chat`
MODIFY `kode_chat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;

ALTER TABLE `file`
MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;

ALTER TABLE `pengguna`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
