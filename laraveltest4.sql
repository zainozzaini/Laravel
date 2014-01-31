-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 01:10 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laraveltest4`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `objects_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attributes_objects1_idx` (`objects_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `objects_id`, `created_at`, `updated_at`) VALUES
(1, 'address', 1, NULL, NULL),
(2, 'latlng', 1, NULL, NULL),
(5, 'codeitem', 2, NULL, NULL),
(6, 'type', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `packages_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_objects_packages1_idx` (`packages_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `name`, `packages_id`, `created_at`, `updated_at`) VALUES
(1, 'location', 1, NULL, NULL),
(2, 'assets', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'package1', '2014-01-28 16:00:00', '2014-01-28 16:00:00'),
(2, 'package2', '2014-01-28 16:00:00', '2014-01-28 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_has_packages`
--

CREATE TABLE `users_has_packages` (
  `users_id` int(11) NOT NULL,
  `packages_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`users_id`,`packages_id`),
  KEY `fk_users_has_packages_packages1_idx` (`packages_id`),
  KEY `fk_users_has_packages_users_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `values`
--

CREATE TABLE `values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attributes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_values_attributes1_idx` (`attributes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `values`
--

INSERT INTO `values` (`id`, `data`, `created_at`, `updated_at`, `attributes_id`) VALUES
(1, 'Seksyen 13, Shah Alam', NULL, NULL, 1),
(2, 'S2 Height, Seremban', NULL, NULL, 1),
(3, 'C100934', NULL, NULL, 5),
(4, 'Almari', NULL, NULL, 6),
(5, 'K134456', '0000-00-00 00:00:00', NULL, 5),
(6, 'Kerusi', NULL, NULL, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `fk_attributes_objects1` FOREIGN KEY (`objects_id`) REFERENCES `objects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `fk_objects_packages1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_packages`
--
ALTER TABLE `users_has_packages`
  ADD CONSTRAINT `fk_users_has_packages_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_packages_packages1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `fk_values_attributes1` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

