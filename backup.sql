DROP TABLE akomodasi;

CREATE TABLE `akomodasi` (
  `id_akomo` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_akomo` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `debit` varchar(20) NOT NULL,
  `kredit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_akomo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO akomodasi VALUES("AKM202107110001","PEMBELIAN LAMPU FOTO+TRIPOD","2021-07-11","pengeluaran","","3000000");



DROP TABLE jurnal;

CREATE TABLE `jurnal` (
  `no_id` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `uang_masuk` varchar(20) NOT NULL,
  `uang_keluar` varchar(20) NOT NULL,
  PRIMARY KEY (`no_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO jurnal VALUES("JRN202107110001","Pemasukan dari No Id :AKM202107110001","2021-07-11","pengeluaran","","3000000");
INSERT INTO jurnal VALUES("JRN202107110002","Pemasukan dari No Id :PYM202107110001","2021-07-11","pemasukan","7000000","");
INSERT INTO jurnal VALUES("JRN202107130003","Pemasukan dari No Id :PYM202107130002","2021-07-13","pemasukan","500000","");



DROP TABLE karyawan;

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO karyawan VALUES("KRY0001","Robi Agustiana","BSM","0887789667","Creator Design","1300000");
INSERT INTO karyawan VALUES("KRY0002","Arif Rahman","Tasik","0887789678","Marketing","2000000");



DROP TABLE paket;

CREATE TABLE `paket` (
  `id_paket` varchar(20) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` varchar(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_petugas` varchar(35) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO paket VALUES("PNT0001","Desain Feeds Instagram","1000000","Desain","2021-01-17","PET0001");
INSERT INTO paket VALUES("PNT0002","Photography","600000","Photograpy ","2021-02-08","PET0002");



DROP TABLE payment;

CREATE TABLE `payment` (
  `id_payment` varchar(15) NOT NULL,
  `id_beli` varchar(15) NOT NULL,
  `tgl_payment` date NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `kembali` varchar(20) NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO payment VALUES("PYM202107110001","TRS202107110001","2021-07-11","7000000","7000000","0");
INSERT INTO payment VALUES("PYM202107130002","TRS202107130002","2021-07-13","500000","500000","0");



DROP TABLE pembelian_det;

CREATE TABLE `pembelian_det` (
  `no` int(11) NOT NULL,
  `id_beli` varchar(20) NOT NULL,
  `id_paket` varchar(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `total` varchar(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pembelian_det VALUES("1","TRS202107110001","PNT0001","2021-07-11","Desain Feeds Instagram","1000000","7","7000000");
INSERT INTO pembelian_det VALUES("2","TRS202107130002","PNT0002","2021-07-13","Photography","600000","1","600000");



DROP TABLE pembelian_head;

CREATE TABLE `pembelian_head` (
  `id_beli` varchar(20) NOT NULL,
  `nm_beli` varchar(35) NOT NULL,
  `alamat_beli` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_lunas` date NOT NULL,
  `sub_bayar` varchar(15) NOT NULL,
  `kurang` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pembelian_head VALUES("TRS202107110001","Satrio","Ciawi","0887789667","2021-07-11","2021-07-11","7000000","0","Belum Selesai");
INSERT INTO pembelian_head VALUES("TRS202107130002","Satrio","c","0887789678","2021-07-13","0000-00-00","600000","100000","Belum Selesai");



DROP TABLE petugas;

CREATE TABLE `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_ptgs` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO petugas VALUES("PET0001","RIfqi","rifqi123","6c8dab289527fc0927aa7e6507898bdd","2");
INSERT INTO petugas VALUES("PET0002","admin","admin","21232f297a57a5a743894a0e4a801fc3","1");
INSERT INTO petugas VALUES("PET0003","Silma Ismul Usna","silma123","90fae43dd66a48c263405701e85f7163","3");



DROP TABLE saldo;

CREATE TABLE `saldo` (
  `no` int(11) NOT NULL,
  `saldoku` varchar(30) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO saldo VALUES("1","12303000");



