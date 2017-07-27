-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Juillet 2017 à 09:27
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exchange_currency`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `abr` varchar(100) DEFAULT NULL,
  `card` varchar(100) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `base_value` decimal(20,2) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `final_value` decimal(20,2) DEFAULT NULL,
  `statut` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hidden` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`id`, `abr`, `card`, `client_id`, `base_value`, `client_name`, `final_value`, `statut`, `date`, `hidden`) VALUES
(1, 'PSC', 'PaysafeCard', 1, '10.00', 'erucquoy', '7.50', 00000000004, '1406050700', 1),
(8, 'PSC', 'paysafecard', 0, '5.00', 'Anonymous', '3.50', 00000000004, '1407363231', 0);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registration_ip` varchar(100) DEFAULT NULL,
  `registration_date` varchar(100) DEFAULT NULL,
  `paypalemail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `comment` text,
  `basevalue` decimal(20,4) DEFAULT NULL,
  `pricing_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `client_contact_email` varchar(200) DEFAULT NULL,
  `client_paypal_email` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `sender_ip` varchar(200) DEFAULT NULL,
  `base_value` decimal(20,2) DEFAULT NULL,
  `final_value` decimal(20,2) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `client_name`, `client_contact_email`, `client_paypal_email`, `date`, `sender_ip`, `base_value`, `final_value`, `type`, `orderid`, `code`) VALUES
(9, 0, 'Anonymous', 'erucquoy@gmail.com', 'erucquoy@gmail.com', '1407363231', '93.1.32.1', '5.00', '3.50', 'paysafecard', 'YOA3E6Z94R', '100100100100100');

-- --------------------------------------------------------

--
-- Structure de la table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `basevalue` int(11) DEFAULT NULL,
  `ratio` decimal(20,4) DEFAULT NULL,
  `abr` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pricing`
--

INSERT INTO `pricing` (`id`, `type`, `basevalue`, `ratio`, `abr`) VALUES
(1, 'PaysafeCard', 5, '0.7000', 'PSC'),
(2, 'PaysafeCard', 10, '0.7200', 'PSC'),
(3, 'PaysafeCard', 25, '0.7300', 'PSC'),
(4, 'PaysafeCard', 50, '0.7500', 'PSC'),
(5, 'PaysafeCard', 100, '0.7500', 'PSC'),
(6, 'Ukash', 10, '0.8000', 'UKA'),
(7, 'Ukash', 20, '0.8100', 'UKA'),
(8, 'Ukash', 50, '0.8300', 'UKA'),
(9, 'Ukash', 100, '0.8500', 'UKA'),
(10, 'Ukash', 200, '0.8800', 'UKA'),
(11, 'SMS', 3, '0.4500', 'SMS'),
(12, 'Audiotel', 1, '0.5500', 'AUD');

-- --------------------------------------------------------

--
-- Structure de la table `process_statut`
--

CREATE TABLE `process_statut` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `process_statut`
--

INSERT INTO `process_statut` (`id`, `name`) VALUES
(1, 'Checking'),
(2, 'Accepted'),
(3, 'Transfer to paypal'),
(4, 'Completed');

-- --------------------------------------------------------

--
-- Structure de la table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date`) VALUES
(1, '91.176.37.12', '1406300300'),
(20001, '87.67.200.95', '1406306149'),
(20002, '199.30.228.146', '1406385148'),
(20003, '91.176.36.89', '1406471084'),
(20004, '88.175.69.148', '1406471253'),
(20005, '91.176.36.38', '1406904598'),
(20006, '92.222.160.4', '1406995619'),
(20007, '91.176.52.87', '1407071511'),
(20008, '216.145.17.190', '1407213753'),
(20009, '91.176.32.233', '1407228829'),
(20010, '80.201.41.105', '1407267218'),
(20011, '109.131.135.121', '1407365156'),
(20012, '92.146.172.219', '1407425008'),
(20013, '213.245.158.93', '1407429894'),
(20014, '2.14.182.37', '1407434734'),
(20015, '90.52.13.95', '1407435423'),
(20016, '85.170.189.138', '1407435985'),
(20017, '88.179.189.139', '1407437747'),
(20018, '90.14.136.243', '1407438885'),
(20019, '79.95.203.26', '1407441871'),
(20020, '109.11.211.161', '1407492019'),
(20021, '78.241.11.111', '1407497723'),
(20022, '69.156.73.69', '1407499035'),
(20023, '82.230.67.49', '1407502446'),
(20024, '90.21.231.144', '1407502694'),
(20025, '80.219.100.192', '1407504311'),
(20026, '46.193.139.216', '1407511390'),
(20027, '90.22.58.209', '1407517672'),
(20028, '62.210.141.26', '1407586515'),
(20029, '78.121.83.116', '1407618001'),
(20030, '77.129.18.136', '1407672688'),
(20031, '82.230.175.194', '1407700902'),
(20032, '92.102.229.11', '1407706707'),
(20033, '91.176.31.13', '1407763822'),
(20034, '109.130.91.232', '1407775889'),
(20035, '84.98.39.158', '1407776969'),
(20036, '86.220.41.147', '1407790792'),
(20037, '92.134.99.196', '1407841616'),
(20038, '78.227.221.122', '1407921090'),
(20039, '82.226.21.32', '1407946821'),
(20040, '88.141.240.60', '1408016584'),
(20041, '80.215.227.132', '1408048460'),
(20042, '82.238.216.85', '1408050529'),
(20043, '83.199.238.179', '1408091314'),
(20044, '90.6.144.58', '1408109408'),
(20045, '64.246.187.42', '1408248729'),
(20046, '77.193.150.157', '1408365733'),
(20047, '109.10.108.113', '1408377357'),
(20048, '88.125.112.87', '1408475248'),
(20049, '79.88.178.126', '1408489704'),
(20050, '93.29.103.238', '1408530588'),
(20051, '91.176.3.118', '1408537943'),
(20052, '86.210.165.181', '1408621175'),
(20053, '77.129.15.139', '1408728832'),
(20054, '85.201.171.6', '1408819697'),
(20055, '91.177.226.4', '1408874205'),
(20056, '87.67.215.187', '1408994374'),
(20057, '83.204.184.252', '1409039515'),
(20058, '86.199.15.157', '1409040284'),
(20059, '86.71.218.30', '1409060713'),
(20060, '78.126.88.170', '1409160015'),
(20061, '204.8.156.142', '1409163122'),
(20062, '197.204.243.57', '1409168756'),
(20063, '31.36.63.60', '1409170591'),
(20064, '88.168.220.69', '1409172754'),
(20065, '83.196.132.211', '1409256376'),
(20066, '64.246.165.160', '1409286739'),
(20067, '80.201.76.161', '1409307310'),
(20068, '91.176.36.44', '1409325063'),
(20069, '90.3.77.27', '1409332755'),
(20070, '92.131.98.208', '1409346498'),
(20071, '208.43.245.104', '1409558405'),
(20072, '208.43.252.203', '1409558892'),
(20073, '90.41.225.199', '1409558906'),
(20074, '91.176.39.97', '1409611056'),
(20075, '145.129.25.141', '1409662247'),
(20076, '86.216.176.207', '1409677234'),
(20077, '90.14.141.247', '1409912521'),
(20078, '90.22.171.52', '1409930860'),
(20079, '92.141.234.249', '1410080308'),
(20080, '82.226.226.112', '1410125243'),
(20081, '2.5.215.140', '1410127316'),
(20082, '92.144.132.98', '1410280290'),
(20083, '64.246.165.140', '1410338137'),
(20084, '87.67.202.172', '1410369376'),
(20085, '176.222.49.32', '1410384789'),
(20086, '41.250.240.136', '1410609275'),
(20087, '109.25.98.160', '1410681628'),
(20088, '91.177.197.116', '1410887467'),
(20089, '81.51.59.109', '1411000185'),
(20090, '91.177.237.221', '1411146365'),
(20091, '188.141.190.182', '1411214285'),
(20092, '31.38.58.63', '1411304565'),
(20093, '128.78.29.104', '1411310177'),
(20094, '37.58.100.87', '1411371819'),
(20095, '64.246.178.34', '1411452494'),
(20096, '37.58.100.85', '1411459924'),
(20097, '37.58.100.190', '1411465703'),
(20098, '213.245.64.132', '1411497738'),
(20099, '37.58.100.228', '1411556619'),
(20100, '37.58.100.68', '1411604268'),
(20101, '37.58.100.183', '1411706034'),
(20102, '37.58.100.158', '1411747658'),
(20103, '78.115.206.57', '1411773675'),
(20104, '88.175.27.126', '1411824541'),
(20105, '109.130.99.208', '1411894603'),
(20106, '82.66.45.51', '1411895258'),
(20107, '217.118.23.115', '1411895289'),
(20108, '54.210.240.185', '1411895327'),
(20109, '85.25.120.34', '1411895350'),
(20110, '46.193.143.95', '1412014584'),
(20111, '82.230.43.105', '1412014765'),
(20112, '89.145.95.2', '1412031484'),
(20113, '37.58.100.229', '1412054113'),
(20114, '37.58.100.74', '1412087621'),
(20115, '88.167.12.148', '1412089439'),
(20116, '80.201.85.26', '1412170270'),
(20117, '37.58.100.79', '1412215793'),
(20118, '37.58.100.235', '1412313758');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `process_statut`
--
ALTER TABLE `process_statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `process_statut`
--
ALTER TABLE `process_statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20119;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
