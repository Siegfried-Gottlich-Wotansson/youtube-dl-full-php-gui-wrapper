--
-- Table structure for table `api_keys`
--

CREATE TABLE IF NOT EXISTS `api_keys` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `referrer` text NOT NULL,
  `key` text NOT NULL,
  `limit` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`ID`, `referrer`, `key`, `limit`) VALUES
(1, 'www.pitube.ml', '654cc68c-778d-4cee-8e0d-5dec5357346d', 9999999);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `externalid` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL DEFAULT 'file',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `accesed` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;