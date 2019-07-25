-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 09 Décembre 2017 à 21:36
-- Version du serveur :  5.7.20-0ubuntu0.17.04.1
-- Version de PHP :  7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `cmd`
--

CREATE TABLE `cmd` (
  `idcmd` int(11) NOT NULL,
  `income_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cmd`
--

INSERT INTO `cmd` (`idcmd`, `income_date`) VALUES
(18, '2017-11-18'),
(19, '2017-11-18'),
(20, '2017-11-23'),
(21, '2017-11-06'),
(22, '2017-11-30'),
(23, '2017-11-30'),
(24, '2017-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `cmd_has_products`
--

CREATE TABLE `cmd_has_products` (
  `cmd_idcmd` int(11) NOT NULL,
  `products_idproducts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cmd_has_products`
--

INSERT INTO `cmd_has_products` (`cmd_idcmd`, `products_idproducts`) VALUES
(18, 25),
(18, 26),
(18, 27),
(19, 28),
(19, 29),
(20, 30),
(21, 31),
(22, 32),
(23, 33),
(24, 34),
(24, 35);

-- --------------------------------------------------------

--
-- Structure de la table `consomation`
--

CREATE TABLE `consomation` (
  `amount` int(11) DEFAULT NULL,
  `reason` longtext,
  `dates` varchar(200) DEFAULT NULL,
  `users` varchar(200) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `consomation`
--

INSERT INTO `consomation` (`amount`, `reason`, `dates`, `users`, `id`) VALUES
(2000000, 'فمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبرنوفمبر', '14 ديسمبر 2017 - 13:45', 'cheikh', 3),
(300, '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '16 نوفمبر 2017 - 14:50', 'cheikh', 4),
(10000, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '10 نوفمبر 2017 - 10:50', 'cheikh', 5),
(23232323, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '23 نوفمبر 2017 - 17:45', 'cheikh', 6),
(90000, 'for sbo7   ttttt', '09 نوفمبر 2017 - 06:30', 'cheikh', 7),
(9000000, 'bhbh', '15 نوفمبر 2017 - 09:45', 'cheikh', 8),
(300, 'sb07', '10 نوفمبر 2017 - 10:30', 'cheikh', 9),
(200000, 'usersss', '06 ديسمبر 2017 - 09:45', 'user', 10);

-- --------------------------------------------------------

--
-- Structure de la table `debt`
--

CREATE TABLE `debt` (
  `iddebt` int(11) NOT NULL,
  `namess` longtext NOT NULL,
  `amount` bigint(200) NOT NULL,
  `reason` longtext NOT NULL,
  `tel` longtext NOT NULL,
  `payed` bigint(200) NOT NULL DEFAULT '0',
  `unpayed` bigint(200) NOT NULL DEFAULT '0',
  `debt_type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `debt`
--

INSERT INTO `debt` (`iddebt`, `namess`, `amount`, `reason`, `tel`, `payed`, `unpayed`, `debt_type`) VALUES
(4, 'CHEIKH', 90000, 'may3nikm', '+22222968770 & 36408642', 4000, 86000, 'دين علي'),
(5, 'mohamed', 40000, 'may3nikm', '32395089 & 78567857685   & 785476', 8000, 32000, 'دين لي'),
(6, 'mohmde', 200, '5ze biy', '33728751%$$ 3434545', 50, 150, 'دين لي');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `idproducts` int(11) NOT NULL,
  `name_produts` longtext NOT NULL,
  `price` bigint(20) DEFAULT NULL,
  `unite_price` bigint(20) DEFAULT NULL,
  `buying_price` bigint(20) DEFAULT NULL,
  `unite_benefit` bigint(20) DEFAULT NULL,
  `total_benefit` bigint(20) DEFAULT NULL,
  `number_products` int(11) DEFAULT NULL,
  `rest_products_number` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`idproducts`, `name_produts`, `price`, `unite_price`, `buying_price`, `unite_benefit`, `total_benefit`, `number_products`, `rest_products_number`) VALUES
(25, 'test1', 32000, 1000, 2000, 1000, 32000, 45, 31),
(26, 'tes2', 180000, 2000, 4000, 2000, 180000, 90, 87),
(27, 'test3', 36000, 3000, 6000, 3000, 36000, 12, 11),
(28, 'c', 11000, 1000, 2000, 1000, 11000, 12, 11),
(29, 'c', 40000, 2000, 3000, 1000, 20000, 20, 19),
(30, 'sd', 270000, 3000, 4000, 1000, 90000, 90, 90),
(31, 'itjgitjg', 108000, 9000, 12000, 3000, 36000, 12, 12),
(32, 'fmmv', 28000, 2000, 4000, 2000, 28000, 14, 14),
(33, 'mh', 14000, 1000, 2000, 1000, 14000, 15, 15),
(34, 'b', 4884, 222, 2323, 2101, 46222, 22, 22),
(35, 'aq', 73326, 3333, 33232, 29899, 657778, 22, 22);

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

CREATE TABLE `sales` (
  `idsales` int(11) NOT NULL,
  `date_of_sales` varchar(200) DEFAULT NULL,
  `name_p` longtext,
  `price_p` longtext,
  `bying_p` longtext,
  `selected_item` bigint(20) DEFAULT NULL,
  `new_p` bigint(20) DEFAULT NULL,
  `total_benefit` bigint(20) DEFAULT NULL,
  `plus_total_benefit` bigint(20) DEFAULT NULL,
  `id_prodcut` int(11) NOT NULL,
  `total_bying` longtext,
  `user` varchar(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sales`
--

INSERT INTO `sales` (`idsales`, `date_of_sales`, `name_p`, `price_p`, `bying_p`, `selected_item`, `new_p`, `total_benefit`, `plus_total_benefit`, `id_prodcut`, `total_bying`, `user`) VALUES
(49, '2016-11-01 04:20', 'test1', '1000', '2000', 1, 0, 1000, 0, 25, '2000', ' cheikh'),
(50, '2017-01-05 09:45', 'test1', '1000', '2000', 1, 0, 1000, 0, 25, '2000', ' cheikh'),
(51, '2018-05-10 10:50', 'test1', '1000', '2000', 1, 0, 1000, 0, 25, '2000', ' cheikh'),
(52, '2017-12-09 18:04', 'test1', '1000', '2000', 1, 0, 1000, 0, 25, '2000', ' user'),
(53, '2017-12-09 18:05', 'tes2', '2000', '4000', 1, 0, 2000, 0, 26, '4000', ' user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `namess` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idusers`, `namess`, `pass`, `role`) VALUES
(1, 'cheikh', '123', 'admin'),
(2, 'user', '123', 'users'),
(3, 'fvre', '212122', 'users');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cmd`
--
ALTER TABLE `cmd`
  ADD PRIMARY KEY (`idcmd`);

--
-- Index pour la table `cmd_has_products`
--
ALTER TABLE `cmd_has_products`
  ADD PRIMARY KEY (`cmd_idcmd`,`products_idproducts`),
  ADD KEY `fk_cmd_has_products_products1_idx` (`products_idproducts`),
  ADD KEY `fk_cmd_has_products_cmd_idx` (`cmd_idcmd`);

--
-- Index pour la table `consomation`
--
ALTER TABLE `consomation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`iddebt`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproducts`);

--
-- Index pour la table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`idsales`),
  ADD KEY `id_prodcut` (`id_prodcut`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cmd`
--
ALTER TABLE `cmd`
  MODIFY `idcmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `consomation`
--
ALTER TABLE `consomation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `debt`
--
ALTER TABLE `debt`
  MODIFY `iddebt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `idproducts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `sales`
--
ALTER TABLE `sales`
  MODIFY `idsales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cmd_has_products`
--
ALTER TABLE `cmd_has_products`
  ADD CONSTRAINT `fk_cmd_has_products_cmd` FOREIGN KEY (`cmd_idcmd`) REFERENCES `cmd` (`idcmd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cmd_has_products_products1` FOREIGN KEY (`products_idproducts`) REFERENCES `products` (`idproducts`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
