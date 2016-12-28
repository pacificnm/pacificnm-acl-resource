-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2016 at 11:22 PM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pacificnm_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_resource`
--

CREATE TABLE IF NOT EXISTS `acl_resource` (
`acl_resource_id` int(20) unsigned NOT NULL,
  `acl_resource_name` varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_resource`
--
ALTER TABLE `acl_resource`
 ADD PRIMARY KEY (`acl_resource_id`), ADD UNIQUE KEY `acl_resource_name` (`acl_resource_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_resource`
--
ALTER TABLE `acl_resource`
MODIFY `acl_resource_id` int(20) unsigned NOT NULL AUTO_INCREMENT;SET FOREIGN_KEY_CHECKS=1;
