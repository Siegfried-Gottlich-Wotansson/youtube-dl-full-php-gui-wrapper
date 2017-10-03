-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2017 at 12:12 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

CREATE TABLE IF NOT EXISTS `api_keys` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `referrer` text NOT NULL,
  `key` text NOT NULL,
  `limit` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

INSERT INTO `api_keys` (`ID`, `referrer`, `key`, `limit`) VALUES
(1, 'www.music-server.ml', '654cc68c-778d-4cee-8e0d-5dec5357346d', 9999905);

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `externalid` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL DEFAULT 'file',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `accesed` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;
