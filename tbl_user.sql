CREATE TABLE `tbl_user` (
`id` int(4) NOT NULL AUTO_INCREMENT,
`nama` varchar(225) NOT NULL,
`jk` varchar(1) NOT NULL,
`tgl_lahir` date NOT NULL,
`alamat` text NOT NULL,
`no_hp` varchar(15) NOT NULL,
`created_at` datetime NOT NULL,
`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
