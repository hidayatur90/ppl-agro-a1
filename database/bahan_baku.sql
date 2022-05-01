INSERT INTO `bahan_baku` (`id`, `namaBahan`) VALUES
(1, 'Biji Kopi Arabika'),
(2, 'Biji Kopi Robusta'),
(3, 'Biji Kopi Liberika'), 
(4, 'Biji Kopi Americano'), 
(5, 'Biji Kopi Cappuchino'), 
(6, 'Biji Kopi Latte'),
(7, 'Gula Pasir'),
(8, 'Susu'),
(9, 'Cream'),
(10, 'Air Galon'), 
(11, 'Sirup Caramel'), 
(12, 'Cangkir'), 
(13, 'Gelas Plastik'), 
(14, 'Sendok'),
(15, 'Sedotan'), 
(16, 'Es Batu');

INSERT INTO `detail_bahan_baku` (`id`, `idBahan`, `kuantitas`, `hargaSatuan`, `type_id`, `created_at`, `updated_at`, `keterangan`) VALUES
(1, 1, 25, 165000, 2, '2022-01-01 15:44:51', '2022-01-01 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(2, 7, 3, 15000, 2, '2022-01-01 15:44:51', '2022-01-01 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(3, 8, 2, 12000, 2, '2022-01-03 15:44:51', '2022-01-04 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(4, 9, 2, 30000, 2, '2022-01-03 15:44:51', '2022-01-03 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(5, 10, 1, 20000, 2, '2022-01-04 15:44:51', '2022-01-04 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(6, 16, 3, 3000, 2, '2022-01-09 15:44:51', '2022-01-10 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(7, 2, 15, 200000, 2, '2022-01-11 15:44:51', '2022-01-11 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(8, 7, 1, 15000, 2, '2022-01-12 15:44:51', '2022-01-15 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(9, 8, 1, 12000, 2, '2022-01-13 15:44:51', '2022-01-15 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(10, 9, 4, 30000, 2, '2022-01-13 15:44:51', '2022-01-15 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(11, 10, 3, 20000, 2, '2022-01-14 15:44:51', '2022-01-20 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(12, 16, 5, 3000, 2, '2022-01-17 15:44:51', '2022-01-17 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(13, 15, 5, 15000, 2, '2022-01-19 15:44:51', '2022-01-19 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(14, 11, 3, 80000, 2, '2022-01-19 15:44:51', '2022-01-19 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(15, 3, 25, 220000, 2, '2022-01-21 15:44:51', '2022-01-21 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(16, 7, 1, 15000, 2, '2022-01-21 15:44:51', '2022-01-21 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(17, 8, 3, 12000, 2, '2022-01-22 15:44:51', '2022-01-22 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(18, 9, 2, 30000, 2, '2022-01-25 15:44:51', '2022-01-25 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(19, 10, 2, 20000, 2, '2022-01-27 15:44:51', '2022-01-27 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(20, 12, 2, 100000, 2, '2022-01-29 15:44:51', '2022-01-29 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(21, 16, 4, 3000, 2, '2022-01-30 15:44:51', '2022-01-30 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(22, 4, 20, 350000, 2, '2022-02-02 15:44:51', '2022-02-02 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(23, 7, 3, 15000, 2, '2022-02-02 15:44:51', '2022-02-02 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(24, 8, 2, 12000, 2, '2022-02-04 15:44:51', '2022-02-04 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(25, 9, 2, 30000, 2, '2022-02-07 15:44:51', '2022-02-07 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(26, 10, 1, 20000, 2, '2022-02-07 15:44:51', '2022-02-07 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(27, 13, 2, 50000, 2, '2022-02-08 15:44:51', '2022-02-08 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(28, 16, 3, 3000, 2, '2022-02-10 15:44:51', '2022-02-10 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(29, 5, 25, 100000, 2, '2022-02-11 15:44:51', '2022-02-11 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(30, 1, 15, 165000, 2, '2022-02-11 15:44:51', '2022-02-11 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(31, 7, 3, 15000, 2, '2022-02-12 15:44:51', '2022-02-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(32, 8, 2, 12000, 2, '2022-02-15 15:44:51', '2022-02-15 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(33, 9, 1, 30000, 2, '2022-02-17 15:44:51', '2022-02-07 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(34, 10, 2, 20000, 2, '2022-02-20 15:44:51', '2022-02-20 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(35, 16, 2, 3000, 2, '2022-02-20 15:44:51', '2022-02-20 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(36, 6, 15, 120000, 2, '2022-02-23 15:44:51', '2022-02-23 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(37, 7, 3, 15000, 2, '2022-02-23 15:44:51', '2022-02-23 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(38, 8, 2, 12000, 2, '2022-02-24 15:44:51', '2022-02-24 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(39, 9, 2, 30000, 2, '2022-02-25 15:44:51', '2022-02-25 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(40, 10, 1, 20000, 2, '2022-02-26 15:44:51', '2022-02-26 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(41, 16, 3, 3000, 2, '2022-02-27 15:44:51', '2022-02-27 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(42, 2, 25, 200000, 2, '2022-03-01 15:44:51', '2022-03-01 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(43, 7, 3, 15000, 2, '2022-03-02 15:44:51', '2022-03-02 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(44, 8, 2, 12000, 2, '2022-03-03 15:44:51', '2022-03-03 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(45, 9, 2, 30000, 2, '2022-03-03 15:44:51', '2022-03-03 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(46, 10, 1, 20000, 2, '2022-03-04 15:44:51', '2022-03-04 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(47, 16, 3, 3000, 2, '2022-03-07 15:44:51', '2022-03-07 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(48, 3, 3, 220000, 2, '2022-03-09 15:44:51', '2022-03-09 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(49, 11, 3, 80000, 2, '2022-03-10 15:44:51', '2022-03-10 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(50, 5, 25, 100000, 2, '2022-03-11 15:44:51', '2022-03-11 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(51, 7, 2, 15000, 2, '2022-03-12 15:44:51', '2022-03-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(52, 8, 3, 12000, 2, '2022-03-12 15:44:51', '2022-03-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(53, 9, 1, 30000, 2, '2022-03-12 15:44:51', '2022-03-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(54, 10, 1, 20000, 2, '2022-03-16 15:44:51', '2022-03-16 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(55, 16, 6, 3000, 2, '2022-03-19 15:44:51', '2022-03-19 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(56, 15, 6, 15000, 2, '2022-03-20 15:44:51', '2022-03-20 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(57, 4, 25, 350000, 2, '2022-03-21 15:44:51', '2022-03-21 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(58, 7, 3, 15000, 2, '2022-03-22 15:44:51', '2022-03-22 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(59, 8, 2, 12000, 2, '2022-03-27 15:44:51', '2022-03-27 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(60, 9, 4, 30000, 2, '2022-03-28 15:44:51', '2022-03-28 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(61, 10, 2, 20000, 2, '2022-03-29 15:44:51', '2022-03-29 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(62, 16, 2, 3000, 2, '2022-03-29 15:44:51', '2022-03-29 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(63, 6, 25, 120000, 2, '2022-04-02 15:44:51', '2022-04-02 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(64, 2, 25, 200000, 2, '2022-04-04 15:44:51', '2022-04-04 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(65, 7, 3, 15000, 2, '2022-04-05 15:44:51', '2022-04-05 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(66, 8, 2, 12000, 2, '2022-04-07 15:44:51', '2022-04-07 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(67, 9, 2, 30000, 2, '2022-04-08 15:44:51', '2022-04-08 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(68, 10, 1, 20000, 2, '2022-04-08 15:44:51', '2022-04-08 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(69, 16, 3, 3000, 2, '2022-04-09 15:44:51', '2022-04-09 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(70, 13, 5, 50000, 2, '2022-04-10 15:44:51', '2022-04-10 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(71, 12, 2, 100000, 2, '2022-04-11 15:44:51', '2022-04-11 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(72, 7, 5, 15000, 2, '2022-04-12 15:44:51', '2022-04-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(73, 8, 1, 12000, 2, '2022-04-12 15:44:51', '2022-04-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(74, 9, 4, 30000, 2, '2022-04-12 15:44:51', '2022-04-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(75, 10, 1, 20000, 2, '2022-04-12 15:44:51', '2022-04-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(76, 16, 6, 3000, 2, '2022-04-12 15:44:51', '2022-04-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(77, 1, 25, 165000, 2, '2022-04-19 15:44:51', '2022-04-19 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(78, 3, 30, 220000, 2, '2022-04-19 15:44:51', '2022-04-19 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(79, 8, 2, 12000, 2, '2022-04-23 15:44:51', '2022-04-23 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(80, 9, 2, 30000, 2, '2022-04-24 15:44:51', '2022-04-24 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(81, 10, 1, 20000, 2, '2022-04-25 15:44:51', '2022-04-25 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(82, 11, 1, 80000, 2, '2022-04-26 15:44:51', '2022-04-26 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(83, 15, 1, 15000, 2, '2022-04-29 15:44:51', '2022-04-29 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(84, 16, 3, 3000, 2, '2022-04-29 15:44:51', '2022-04-29 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(85, 5, 10, 100000, 2, '2022-05-05 15:44:51', '2022-05-05 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(86, 7, 3, 15000, 2, '2022-05-05 15:44:51', '2022-05-05 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(87, 8, 2, 12000, 2, '2022-05-05 15:44:51', '2022-05-05 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(88, 9, 2, 30000, 2, '2022-05-06 15:44:51', '2022-05-06 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(89, 10, 1, 20000, 2, '2022-05-09 15:44:51', '2022-05-09 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(90, 16, 3, 3000, 2, '2022-05-10 15:44:51', '2022-05-10 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(91, 4, 10, 350000, 2, '2022-05-11 15:44:51', '2022-05-11 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(92, 7, 2, 15000, 2, '2022-05-12 15:44:51', '2022-05-12 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(93, 8, 3, 12000, 2, '2022-05-13 15:44:51', '2022-05-13 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(94, 9, 1, 30000, 2, '2022-05-13 15:44:51', '2022-05-15 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(95, 10, 2, 20000, 2, '2022-05-15 15:44:51', '2022-05-15 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(96, 16, 6, 3000, 2, '2022-05-19 15:44:51', '2022-05-19 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(97, 6, 15, 120000, 2, '2022-05-20 15:44:51', '2022-05-20 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(98, 1, 25, 165000, 2, '2022-05-21 15:44:51', '2022-05-21 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(99, 7, 3, 15000, 2, '2022-05-21 15:44:51', '2022-05-21 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(100, 8, 2, 12000, 2, '2022-05-23 15:44:51', '2022-05-23 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(101, 9, 2, 30000, 2, '2022-05-24 15:44:51', '2022-05-24 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(102, 10, 1, 20000, 2, '2022-05-25 15:44:51', '2022-05-25 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(103, 16, 3, 3000, 2, '2022-05-27 15:44:51', '2022-05-27 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(104, 13, 1, 50000, 2, '2022-05-27 15:44:51', '2022-05-27 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.'),
(105, 15, 4, 15000, 2, '2022-05-29 15:44:51', '2022-05-29 15:44:51', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.');