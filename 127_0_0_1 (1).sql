-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 04:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intrasys`
--
CREATE DATABASE IF NOT EXISTS `intrasys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `intrasys`;
--
-- Database: `is3102`
--
CREATE DATABASE IF NOT EXISTS `is3102` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `is3102`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userId` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `dateJoined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `accountId` int(11) NOT NULL,
  `accountTypeName` varchar(64) DEFAULT NULL,
  `numOfUsers` int(11) DEFAULT NULL,
  `numOfWarehouses` int(11) DEFAULT NULL,
  `numOfStores` int(11) DEFAULT NULL,
  `numOfProductTypes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(64) DEFAULT NULL,
  `lastName` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shippingAddress` text,
  `contact` int(11) DEFAULT NULL,
  `dateJoined` datetime DEFAULT NULL,
  `activationStatus` tinyint(1) DEFAULT NULL,
  `membershipStatus` varchar(64) DEFAULT NULL,
  `loyaltyPoints` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeerole`
--

CREATE TABLE `employeerole` (
  `employeeRoleId` int(11) NOT NULL,
  `roleName` varchar(64) DEFAULT NULL,
  `roleDesc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemDesc` text,
  `EPC` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `itemStatus` varchar(64) DEFAULT NULL,
  `isDefective` tinyint(1) DEFAULT NULL,
  `productCategoryId` int(11) DEFAULT NULL,
  `productTypeId` int(11) DEFAULT NULL,
  `locationId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationId` int(11) NOT NULL,
  `locationName` varchar(64) NOT NULL,
  `address` text,
  `contact` varchar(64) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `productCatId` int(11) NOT NULL,
  `productName` varchar(64) DEFAULT NULL,
  `productDesc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `productTypeId` int(11) NOT NULL,
  `productTypeName` varchar(64) DEFAULT NULL,
  `productTypeDesc` text,
  `colour` varchar(64) DEFAULT NULL,
  `dimension` text,
  `storePrice` double DEFAULT NULL,
  `webstorePrice` double DEFAULT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `locationId` int(11) DEFAULT NULL,
  `productCategoryId` int(11) DEFAULT NULL,
  `column_11` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `retailerId` int(11) NOT NULL,
  `retailerName` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `activationStatus` tinyint(1) NOT NULL,
  `accountType` varchar(64) NOT NULL,
  `paymentType` varchar(64) NOT NULL,
  `loyaltyPoints` int(11) NOT NULL,
  `contractStartDate` datetime NOT NULL,
  `contractEndDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierId` int(11) NOT NULL,
  `supplierName` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `employeerole`
--
ALTER TABLE `employeerole`
  ADD PRIMARY KEY (`employeeRoleId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`productCatId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`productTypeId`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`retailerId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeerole`
--
ALTER TABLE `employeerole`
  MODIFY `employeeRoleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `productCatId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `productTypeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `retailerId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT;--
-- Database: `is4100`
--
CREATE DATABASE IF NOT EXISTS `is4100` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `is4100`;

-- --------------------------------------------------------

--
-- Table structure for table `kbarticles`
--

CREATE TABLE `kbarticles` (
  `approved` varchar(5) DEFAULT NULL,
  `ArticleID` int(11) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `Problem` mediumtext,
  `Solution` mediumtext,
  `Title` varchar(250) DEFAULT NULL,
  `Views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kbarticles`
--

INSERT INTO `kbarticles` (`approved`, `ArticleID`, `Category`, `DateCreated`, `Problem`, `Solution`, `Title`, `Views`) VALUES
('1', 2, 'ASPRunnerPro', '2007-04-24', 'Microsoft OLE DB Provider for ODBC Drivers error \'80004005\'rr[Microsoft][ODBC Microsoft Access Driver] Operation must use an updateable query. /tablename\\_edit.asp, line xxx ', 'The solution to this problem can be found here:rhttp://xlinesoft.com/asprunner/docs/troubleshooting\\_\\_operation\\_must\\_use\\_an\\_updateable\\_query\\_\\_errors.htm ', 'Error: Operation must use an updateable query', 4),
('1', 3, 'General', '2007-04-24', 'Tryed to install ASPRunner Professional on a windows 2003 server but when I try to launch the program it will not run , nothing happens. ', 'Please try the following:r1. Proceed to Start->Settings->Control panel->System.r2. On the Advanced tab, under Performance, click Settings. r3. On the Data Execution Prevention tab, use one of the following procedures: Click \"Turn on DEP for essential Windows programs and services only\" r4. Click OK two times. rrRun ASPRunnerPro again to see if it runs okay.rrMore info: rhttp://www.microsoft.com/technet/security/prodtech/windowsxp/depcnfxp.mspx#EQD ', 'ASPRunnerPro/PHPRunner doesnt start ', 1),
('1', 4, 'General', '2007-04-24', 'Is there a way to change the display on list page? Instead of bgcolor I would like to display image. Can I change this in the style sheet (CSS)? ', 'Modify include/style.css to set an image as a background.rrbody r{rbackground-image:rurl(\'bgdesert.jpg\')r} ', 'How to set image as a background ', 1),
(NULL, 5, 'PHPRunner', '2007-04-24', 'Warning:rmain(include/locale.php): failed to open stream: No such file or directory in /tmp/disk/home/webmaster/Files/WWW/NewUsers/include/Users\\_functions.phpron line 2rrWarning: main(): Failed openingr\'include/locale.php\' for inclusion (include\\_path=\':/usr/lib/php/pear\') in /tmp/disk/home/webmaster/Files/WWW/NewUsers/include/Users\\_functions.php', 'you have unusual setting for \"include\\_path\" PHP configuration option.rPlease change include\\_path setting in your php.ini file to:r<if Unix>rinclude\\_path=\".:/usr/lib/php/...\"r<if Windows>rinclude\\_path=\".;c:\\php\\...\"rrThen restart your web server.', 'Incorrect include\\_path PHP option ', 1),
(NULL, 6, 'PHPRunner', '2007-04-24', 'Warning: session\\_start... ', 'To make your pages working do the following:r- open with any text editor file c:\\windows\\php.inir- find the string started with session.save\\_path= r- make sure this directory existsr- make sure Internet Information Server or Apache account has read/write permissions on this directoryr- Make sure that in php.ini file \"session.save\\_handler\" is set to \"files\"r----------------------------------------r. [Session]r; Handler used to store/retrieve data.rsession.save\\_handler = files r----------------------------------------', 'Warning: session\\_start... ', 0),
('1', 7, 'ASPRunnerPro', '2007-04-22', 'How to set default values to a date field in advanced search with \"between\" condition so we can show only records updated within the last two days?', 'You can do this by adding the following three lines in the beginning of list page right before rSession.LCID = 1033 line.rrSession(\"SearchOption\\_\" & strTableName & \"\\_DateField\") = \"Between\"rSession(\"SearchFor1\\_\" & strTableName & \"\\_DateField\") = FormatDatetime(DateAdd(\"d\", -2, now()),2)rSession(\"SearchFor2\\_\" & strTableName & \"\\_DateField\") = FormatDatetime(now(), 2)r', 'How to set default values to a date field in advanced search.', 0),
(NULL, 8, 'ASPRunnerPro', '2007-04-25', ' I am wondering if there is a way to save advanced searches so that it\'s easy to view the database based on certain criteria without having to enter the critera each time? Just a simple way to bookmark/link the search results page would suit my needs', 'You will need to make a change on advanced search page to see generated URL. rrTo dipslay parameters open ...\\_search.asp in text editor and change FORM tag to use GET instead of POST. Do required search and copy URL. Change form back to POST. Use this URL to setup direct link to advanced search results.', 'How to setup link to advanced search results page', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kbcategories`
--

CREATE TABLE `kbcategories` (
  `Category` varchar(50) DEFAULT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kbcategories`
--

INSERT INTO `kbcategories` (`Category`, `CategoryID`) VALUES
('ASPRunner', 1),
('ASPRunnerPro', 2),
('General', 3),
('PHPRunner', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kbcomments`
--

CREATE TABLE `kbcomments` (
  `access` varchar(50) DEFAULT NULL,
  `ArticleID` int(11) DEFAULT NULL,
  `comment` mediumtext,
  `CommentID` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kbcomments`
--

INSERT INTO `kbcomments` (`access`, `ArticleID`, `comment`, `CommentID`, `email`) VALUES
('test', 2, 'my comment', 1, 'jane@test.com'),
('admin', 2, 'admin', 2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kbusers`
--

CREATE TABLE `kbusers` (
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kbusers`
--

INSERT INTO `kbusers` (`email`, `fullname`, `password`, `username`) VALUES
('admin@admin.com', 'admin', 'admin', 'admin'),
('test@test.com', 'test user', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `memoptions`
--

CREATE TABLE `memoptions` (
  `Cancelpage` varchar(255) DEFAULT NULL,
  `Email_text` mediumtext,
  `ID` int(11) NOT NULL,
  `IPNaddress` varchar(255) DEFAULT NULL,
  `Pay_subj` varchar(255) DEFAULT NULL,
  `Ppconfirm` int(11) DEFAULT NULL,
  `Ppemail` varchar(255) DEFAULT NULL,
  `Reg_subj` varchar(255) DEFAULT NULL,
  `Reg_text` mediumtext,
  `Regconfirm` int(11) DEFAULT NULL,
  `Successpage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memoptions`
--

INSERT INTO `memoptions` (`Cancelpage`, `Email_text`, `ID`, `IPNaddress`, `Pay_subj`, `Ppconfirm`, `Ppemail`, `Reg_subj`, `Reg_text`, `Regconfirm`, `Successpage`) VALUES
('http://localhost:8085/login.php', 'Dear ##username##,\n\nthank you for your payment!\n\nYou now may login at ##login_link##\n\nWebsite administration', 1, 'http://localhost:8085/ipn.php', 'Payment notification', 1, 'kornilov@xlinesoft.com', 'Registration noification', 'Dear ##username##,\n\nthank you for registration!\n\nNow you can proceed to ##payment_link## to pay for your membership.\n\nWebsite administration', 1, 'http://localhost:8085/login.php');

-- --------------------------------------------------------

--
-- Table structure for table `memprices`
--

CREATE TABLE `memprices` (
  `Dcount` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `Price` double DEFAULT NULL,
  `Label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memprices`
--

INSERT INTO `memprices` (`Dcount`, `ID`, `Price`, `Label`) VALUES
(0, 1, 1, 'Lifetime'),
(1, 2, 0.01, 'for month'),
(2, 3, 0.02, 'for 2 months');

-- --------------------------------------------------------

--
-- Table structure for table `memusers`
--

CREATE TABLE `memusers` (
  `Beginpay` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Endpay` date DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Paypal` int(11) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memusers`
--

INSERT INTO `memusers` (`Beginpay`, `Email`, `Endpay`, `ID`, `Password`, `Paypal`, `Username`) VALUES
('2008-01-01', 'test@test.com', '2008-01-01', 1, 'admin', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vacareas`
--

CREATE TABLE `vacareas` (
  `Area` varchar(50) DEFAULT NULL,
  `AreaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacareas`
--

INSERT INTO `vacareas` (`Area`, `AreaID`) VALUES
('Corolla', 1),
('Kill Devil Hills', 2),
('Kitty Hawk', 3),
('Nags Head', 4),
('South Nags Head', 5),
('Southern Shores', 6);

-- --------------------------------------------------------

--
-- Table structure for table `vacbathrooms`
--

CREATE TABLE `vacbathrooms` (
  `bathrooms` int(11) DEFAULT NULL,
  `bathroomsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacbathrooms`
--

INSERT INTO `vacbathrooms` (`bathrooms`, `bathroomsID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `vacbedrooms`
--

CREATE TABLE `vacbedrooms` (
  `bedrooms` int(11) DEFAULT NULL,
  `bedroomsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacbedrooms`
--

INSERT INTO `vacbedrooms` (`bedrooms`, `bedroomsID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `vaclocations`
--

CREATE TABLE `vaclocations` (
  `Location` varchar(50) DEFAULT NULL,
  `LocationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaclocations`
--

INSERT INTO `vaclocations` (`Location`, `LocationID`) VALUES
('Golf course', 1),
('Oceanfront', 2),
('Oceanview', 3),
('Semi-Oceanfront', 4),
('Semi-Oceanview', 5),
('Soundside', 6);

-- --------------------------------------------------------

--
-- Table structure for table `vacproperties`
--

CREATE TABLE `vacproperties` (
  `AddressNumber` int(11) DEFAULT NULL,
  `AirConditioning` int(11) DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `BedLinensProvided` int(11) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `CableTV` int(11) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `CommunityClubHouse` int(11) DEFAULT NULL,
  `CommunityFacilities` int(11) DEFAULT NULL,
  `CommunityPool` int(11) DEFAULT NULL,
  `CommunityTennisCourts` int(11) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Description` mediumtext,
  `Dishwasher` int(11) DEFAULT NULL,
  `DVDVCR` int(11) DEFAULT NULL,
  `Elevator` int(11) DEFAULT NULL,
  `EnclosedOutsideShower` int(11) DEFAULT NULL,
  `Fireplace` int(11) DEFAULT NULL,
  `FromPrice` int(11) DEFAULT NULL,
  `GameRoom` int(11) DEFAULT NULL,
  `Golf` int(11) DEFAULT NULL,
  `Grill` int(11) DEFAULT NULL,
  `HandicapFriendly` int(11) DEFAULT NULL,
  `HeatedPool` int(11) DEFAULT NULL,
  `HighSpeedInternet` int(11) DEFAULT NULL,
  `HotTub` int(11) DEFAULT NULL,
  `Kitchen` int(11) DEFAULT NULL,
  `ListingDescription` mediumtext,
  `ListingPhoto` varchar(500) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Microwave` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `NonSmoking` int(11) DEFAULT NULL,
  `PetsAllowed` int(11) DEFAULT NULL,
  `Photo1` varchar(500) DEFAULT NULL,
  `Photo10` varchar(500) DEFAULT NULL,
  `Photo11` varchar(500) DEFAULT NULL,
  `Photo12` varchar(500) DEFAULT NULL,
  `Photo13` varchar(500) DEFAULT NULL,
  `Photo14` varchar(500) DEFAULT NULL,
  `Photo15` varchar(500) DEFAULT NULL,
  `Photo2` varchar(500) DEFAULT NULL,
  `Photo3` varchar(500) DEFAULT NULL,
  `Photo4` varchar(500) DEFAULT NULL,
  `Photo5` varchar(500) DEFAULT NULL,
  `Photo6` varchar(500) DEFAULT NULL,
  `Photo7` varchar(500) DEFAULT NULL,
  `Photo8` varchar(500) DEFAULT NULL,
  `Photo9` varchar(500) DEFAULT NULL,
  `PoolTable` int(11) DEFAULT NULL,
  `PrivatePool` int(11) DEFAULT NULL,
  `PropertyID` int(11) NOT NULL,
  `ScreenedPorch` int(11) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `sType` varchar(50) DEFAULT NULL,
  `WasherDryer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacproperties`
--

INSERT INTO `vacproperties` (`AddressNumber`, `AirConditioning`, `Area`, `bathrooms`, `BedLinensProvided`, `bedrooms`, `CableTV`, `City`, `CommunityClubHouse`, `CommunityFacilities`, `CommunityPool`, `CommunityTennisCourts`, `Country`, `Description`, `Dishwasher`, `DVDVCR`, `Elevator`, `EnclosedOutsideShower`, `Fireplace`, `FromPrice`, `GameRoom`, `Golf`, `Grill`, `HandicapFriendly`, `HeatedPool`, `HighSpeedInternet`, `HotTub`, `Kitchen`, `ListingDescription`, `ListingPhoto`, `Location`, `Microwave`, `Name`, `NonSmoking`, `PetsAllowed`, `Photo1`, `Photo10`, `Photo11`, `Photo12`, `Photo13`, `Photo14`, `Photo15`, `Photo2`, `Photo3`, `Photo4`, `Photo5`, `Photo6`, `Photo7`, `Photo8`, `Photo9`, `PoolTable`, `PrivatePool`, `PropertyID`, `ScreenedPorch`, `State`, `Street`, `sType`, `WasherDryer`) VALUES
(8793, -1, 'Nags Head', 4, 0, 6, -1, 'Nags Head', 0, -1, -1, -1, 'USA', '<H3><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rental Description</FONT></H3><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>From Sunrise to Sunset &amp; All Times in between, this Outstanding Semi-Oceanfront will be Sure to Please Your Entire Group! Centrally Located Close to Area Dining, Shopping, Fishing, &amp; Family Entertainment, &amp; the Beach is Just Minutes Away (Beach Access is 50\' Across Beach Road). This Home is Loaded w/All the Extras &amp; has Ocean to Sound Views.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><U><B><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Ground Level:</FONT></U></B><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> <B>Rec. Room w/Full Size Pool Table</B>, CATV, Queen Sleep Sofa, Laundry, Bedroom w/Queen, Full Bath, &amp; Access to the Pool Patio Area w/Picnic Table, <B>Private Swimming Pool, Hot Tub</B> (Closed Nov 1, 2006 to April 1, 2007), Enclosed Outside Shower, &amp; Park Grill.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><U><B><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Mid Level:</FONT></U></B><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> 4 bedrooms (1 Master Suite w/King &amp; Full Bath w/Jacuzzi, 2 w/Queens, &amp; 1 w/Duo Bunk &amp; Single), 2 Full Baths, &amp; Covered Deck.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><U><B><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Top Level:</FONT></U></B><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> Living/Dining/Kitchen Area, TV Entertainment System, Gas Fireplace, Half Bath, Sun Deck, &amp; Master Suite w/King &amp; Full Bath w/Jacuzzi.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><U>Features include:</U> C/AC &amp; Heat, Washer/Dryer, Dishwasher, Microwave, Phone, 4 CATV\'s, 4 VCR\'s, Stereo w/CD, Wireless Internet Access, Baby Equipment (High Chair, Baby Gate, &amp; Pac-N-Play), Pool &amp; Deck Furniture, &amp; Ocean Views. No Pets. This is a Non-Smoking Unit. </FONT></FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Optional Bed Linens 125.00, Optional Bed Linens &amp; Towels 225.00</FONT></P><H3><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rates - Sunday Check-in.</FONT></H3><CENTER><TABLE class=ratestable style=\"WIDTH: 484px; HEIGHT: 505px\" cellPadding=4 border=1><TBODY><TR><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Start Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>End Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rate</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>12/31/2006</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/05/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/06/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/19/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 950.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/20/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/02/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,195.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/03/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/09/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/10/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/16/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/17/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/30/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>07/01/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/11/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/12/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/18/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/19/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/25/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/26/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/01/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/02/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/15/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,195.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/16/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/13/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 950.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/14/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/17/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/18/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/24/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 950.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/25/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>01/05/2008</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 795.00/wk.</FONT></TH></TR></TBODY></TABLE><CENTER><SPAN class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><B>Security Deposit:</B> $300</FONT></FONT></SPAN></CENTER></CENTER>', -1, -1, 0, -1, -1, 795, -1, 0, -1, -1, 0, -1, -1, -1, 'From Sunrise to Sunset & All Times in between, this Outstanding Semi-Oceanfront will be Sure to Please Your Entire Group! Centrally Located Close to Area Dining, Shopping, Fishing, & Family Entertainment, & the Beach is Just Minutes Away (Beach Access is 50\' Across Beach Road).', 'sun-1-20070419-212743.jpg', 'Semi-Oceanfront', -1, 'Sunset', -1, 0, 'sun-1-20070419-212743.jpg', 'sun-10-20070419-212811.jpg', NULL, NULL, NULL, NULL, NULL, 'sun-2-20070419-212747.jpg', 'sun-3-20070419-212750.jpg', 'sun-4-20070419-212752.jpg', 'sun-5-20070419-212756.jpg', 'sun-6-20070419-212759.jpg', 'sun-7-20070419-212802.jpg', 'sun-8-20070419-212806.jpg', 'sun-9-20070419-212809.jpg', -1, -1, 2, 0, 'NC', 'S. Virginia DareTrail MP: 16.3', 'House', -1),
(9602, -1, 'South Nags Head', 3, 0, 4, -1, 'South Nags Head', -1, 0, -1, -1, 'USA', '<P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><B>THE PRIVATE SWIMMING POOL WILL BE OPEN STARTING APRIL 1, 2007! CAN BE HEATED FOR $150.00 PER WEEK.</B> </FONT></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1>This gorgeous South Nags Head vacation home was completely remodeled in 2006 and is a wonderful choice for your families Outer Banks retreat. You will enjoy lovely Ocean Views from the Great Room and marvel at the Spectacular Sunsets &amp; Views over Ponds, Pines, &amp; the Roanoke Sound from the Dining Area &amp; Sun Deck. The Ocean is Just a Minutes Walk Away Across the Beach Road (Only 400 Ft. to Beach w/Direct Access). Your family will love spending time on the Beach, playing in the <B>Large 20 x 40 Private Swimming Pool</B> or Relaxing in the <B>Hot Tub</B>. Located in South Creek Acres, this home offers Access to a <B>Community Swimming Pool &amp; Tennis Courts.</B></FONT></FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><B><U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Ground Level:</FONT></B></U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> Parking for 4 Cars, Basketball Hoop, Enclosed Outside Shower, <B>Hot Tub, Private Swimming Pool</B> (Can be Heated for $150.00 Per Week), &amp; Gas Grill.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><B><U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Mid Level:</FONT></B></U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> 3 bedrooms (Master Suite w/Queen &amp; Full Bath &amp; 2 w/Duo Bunks w/Trundles), 1 Shared Full Bath, <B>Small Rec. Room w/Foosball</B>, &amp; 2 Covered Decks.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><B><U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Top Level:</FONT></B></U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> Nicely Decorated &amp; Very Comfortable Living/Dining/Kitchen Area w/ Ocean to Sound Views, CATV/VCR/DVD, Gas Fireplace, Bedroom w/Queen, CATV/DVD, Full Bath, Covered Deck, &amp; Sun Deck.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><U>Features include:</U> C/AC &amp; Heat, Washer/Dryer, Dishwasher, Microwave, Phone, CATV\'s, DVD/VCR Combo, Baby Equipment (High Chair), &amp; Deck &amp; Pool Furniture. No Pets. This is a Non-Smoking Unit. Optional Bed Linens 95.00, Optional Bed Linens &amp; Towels 170.00</FONT></FONT></P><H3><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rates - Saturday Check-in.</FONT></H3><CENTER><TABLE class=ratestable style=\"WIDTH: 475px; HEIGHT: 392px\" cellPadding=4 border=1><TBODY><TR><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Start Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>End Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rate</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>12/30/2006</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/04/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 750.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/05/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/18/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/19/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/01/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,095.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/02/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/08/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/09/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/15/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/16/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/29/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,350.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/30/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/10/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/11/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/17/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,695.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/18/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/24/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/25/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/31/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/01/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/14/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/15/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/12/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/13/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/16/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/17/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/23/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/24/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>01/04/2008</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 795.00/wk.</FONT></TH></TR></TBODY></TABLE><CENTER><SPAN class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><B>Security Deposit:</B> $300</FONT></FONT></SPAN></CENTER></CENTER>', -1, 0, 0, -1, 0, 750, -1, 0, -1, 0, 0, -1, 0, -1, 'This gorgeous South Nags Head vacation home was completely remodeled in 2006 and is a wonderful choice for your families Outer Banks retreat.rTHE PRIVATE SWIMMING POOL WILL BE OPEN STARTING APRIL 1, 2007! ', 'fay-1-20070410-140659.jpg', 'Semi-Oceanview', -1, 'Fay\'s Sunny Daze', -1, 0, 'fay-1-20070410-140659.jpg', 'fay-10-20070410-140911.jpg', 'fay-11-20070410-140915.jpg', 'fay-12-20070410-140918.jpg', 'fay-13-20070410-140921.jpg', 'fay-14-20070410-140926.jpg', NULL, 'fay-2-20070410-140702.jpg', 'fay-3-20070410-140706.jpg', 'fay-4-20070410-140710.jpg', 'fay-5-20070410-140855.jpg', 'fay-6-20070410-140859.jpg', 'fay-7-20070410-140902.jpg', 'fay-8-20070410-140906.jpg', 'fay-9-20070410-140909.jpg', 0, -1, 3, 0, 'NC', 'S. Old Oregon Inlet Rd. MP: 19.5', 'House', -1),
(1731, -1, 'Kill Devil Hills', 6, 0, 7, -1, 'Kill Devil Hills', 0, 0, 0, 0, 'USA', '<P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Built in 2003, this Fabulous Home (Just 1 Block from Beach) will be your Family\'s Favorite Vacation Get-A-Way for Years. Located on a Quiet Cul-de-Sac, Octopus\'s Garden offers a Short Walk to the Beach &amp; Lots of Amenities, including 5 Master Suites, a <B>Private Pool, Hot Tub, Game Room w/Pool Table</B>, Basketball Goal, Horseshoe Pits, 2 Dishwashers, 2 Microwaves, 2 Refrigerators, &amp; a Fax Machine. With Something for Everyone, this Cottage is the Ideal Spot for Holidays, Family Gatherings, Weddings, &amp; even Business Retreats. This Spacious, Non-Smoking, Pet Free Cottage is the Perfect Place to Relax &amp; Enjoy the Charm of the Outer Banks.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><B><U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Ground Level:</FONT></B></U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> 3 bedrooms (Master Suite w/Queen &amp; Full Bath, 1 w/2 Bunk Sets, &amp; 1 w/Duo Bunk), 2 Full Baths, Game Room w/Pool Table, Wet Bar w/Full Size Refrigerator, CATV Entertainment Center &amp; Access to the Pool Patio area.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><B><U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Middle Level:</FONT></B></U><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1> 4 Master Suites w/Private Baths (2 w/Kings, 2 w/Queens), &amp; 2 Covered Decks (one w/Hot Tub).</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><B><U>Top Floor:</U></B> Huge Living/Dining/Kitchen Area w/2 Sitting areas, Large Kitchen w/Breakfast Bar.</FONT></FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><U>Features include:</U> C/AC &amp; Heat, Washer/Dryer, 2 Ice Makers, 6 Phone\'s, 9 CATV\'s, 7 CATV/VCR\'s, 2 VCR/DVD\'s, 2 Stereo\'S, 7 Ceiling Fans, Wet Bar, Gas Fireplace, Baby Equipment (High Chair, Baby Gate, &amp; Pac-N-Play), Pool &amp; Deck Furniture, Outside Shower, Enclosed Outside Shower, &amp; Park Grill. No Pets. This is a Non-Smoking Unit!</FONT></FONT></P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Optional Bed Linens 135.00, Optional Bed Linens &amp; Towels 240.00 </FONT><P></P><H3><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Brochure Corrections</FONT></H3><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>2007 Security deposit is listed incorrectly. Prices for Sept 15 thru Oct 13 are incorrect.</FONT></P><H3><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rates - Saturday Check-in.</FONT></H3><CENTER><TABLE class=ratestable style=\"WIDTH: 486px; HEIGHT: 502px\" cellPadding=4 border=1><TBODY><TR><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Start Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>End Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rate</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>12/30/2006</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/04/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/05/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/18/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/19/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/01/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/02/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/08/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,195.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/09/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/15/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/16/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/29/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,495.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/30/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/10/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/11/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/17/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,495.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/18/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/24/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/25/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/31/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/01/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/14/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/15/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/12/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,150.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/13/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/16/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 895.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/17/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/23/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,150.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/24/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>01/04/2008</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 895.00/wk.</FONT></TH></TR></TBODY></TABLE><CENTER><SPAN class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><B>Security Deposit:</B> $400</FONT></FONT></SPAN></CENTER></CENTER>', -1, -1, 0, -1, -1, 895, -1, 0, -1, 0, 0, -1, -1, -1, 'Built in 2003, this Fabulous Home (Just 1 Block from Beach) will be your Family\'s Favorite Vacation Get-A-Way for Years.', 'oct-1-20070409-081802.jpg', 'Semi-Oceanview', -1, 'Octopus\'s Garden', -1, 0, 'oct-1-20070409-081802.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'oct-2-20070409-081833.jpg', 'oct-3-20070409-081835.jpg', 'oct-4-20070409-081846.jpg', 'oct-5-20070409-081849.jpg', NULL, NULL, NULL, NULL, -1, -1, 4, -1, 'NC', 'Bobby Lee Trail MP: 07.0', 'House', -1),
(9531, -1, 'South Nags Head', 7, -1, 10, -1, 'South Nags Head', 0, 0, 0, 0, 'USA', '<P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>You are invited to enjoy this Paradise in the Sand! This home offers you everything Imaginable for a Fabulous Vacation Retreat! It is Large enough to accommodate a Magical Family Reunion, yet Spacious enough to allow Family &amp; Friends the chance for Privacy &amp; a Peaceful Vacation Get-A-Way. </FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>The Twisted Fish is only a few steps away from the Magnificent Atlantic Ocean and the views are Spectacular!. This home is located directly in front of a Life Guarded Beach. The Dune Top Deck features a storage locker loaded w/Buckets, Shovels, &amp; other must haves for Fun in the Sun and Sand. You will also find a Shower/Foot Wash Station on this Deck Area. </FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>The Ramped Walkway leads you to the <B>18 x 30 Private Pool</B> (Can Be Heated for $400.00 Per Week), there is a Video Monitor which covers the entire Pool Area, &amp; also 2 Outside Showers along w/Outdoor Speakers &amp; a Gas Grill on the lower Deck Area.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Inside the Home on the 1st Floor is a Well Equipped Kitchenette w/Wet Bar, Bar Seating, Dishwasher, Microwave, &amp; Full Size Refrigerator w/Ice Maker, a <B>Game Room w/Pool Table</B>, Large Screen CATV w/Surround Sound, Game Table, Washer/Dryer Unit, Powder Room, Master Suite w/King, TV/VCR and Full Bath, 1 w/2 Bunk Sets, TV/VCR &amp; 1 w/Duo Bunk w/Trundle and a shared Full Bath. From the Game Room you will access to Pool Patio aera.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>The 2nd Floor offers 2 Oceanfront Master Suites w/Kings, TVs and Full Baths (1 is Handicapped Accessible), 1 w/Queen and TV/VCR, 1 w/2 Singles and TV, 1 w/Duo Bunk w/Trundle, Full Hallway Bath, Washer/Dryer, Linen Closet and 2 Covered Decks. A Hot Tub is located on the Oceanfront Deck where you can relax and enjoy the Ocean Views.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>A Magnificent Great Room on the 3rd floor greets you endless Ocean Views, Sun Deck w/Picnic Table and furniture, Gas Fireplace, DVD, VHS, Game Library Cabinet, Reading Library, Computer w/Wireless High Speed Internet Access, Fax Machine, Big Screen CATV, Surround Sound, Wet Bar w/Icemaker, Dining Area w/Tile Floors, Extraordinary Kitchen w/2 Dishwashers, 2 Sink areas, 2 Range Ovens, Refrigerator, Large Pantry Closet, Bar Area w/Seating for 6, a Master Suite w/King w/Completely Tiled 2 Person Shower, 1 w/Queen, &amp; Full Bath.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>South Nags Head is a Perfect Location for Your Next Outer Banks Vacation. It offers the Peace &amp; Quite of a Residential Neighborhood, but the Convenience of Close Proximity to Restaurants, Shopping, Miniature Golf, Jet Ski Rentals, Charter Fishing, Manteo Attractions, 18 Hole Golf, &amp; So Very Much More.</FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><U>Features Include:</U> <B>Elevator</B>, C/AC &amp; Heat, 3 Ice Makers, Chest Freezer, 8 Phones, Nintendo Game Cube w/Games, 11 CATV\'s, 8 Ceiling Fans, Bean Bag/Video Rockers, Baby Equipment (High Chair, Baby Gates, Port-A-Crib, &amp; Umbrella Stroller), Sun Decks, Covered Decks, Extensive Deck &amp; Pool Furniture, Gas Grill, Park Grill, Basketball Goal, &amp; Picnic Tables. No Pets. This is a Non-Smoking Unit! </FONT></FONT></P><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1></FONT><P><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Bed Linens &amp; Towels Provided (Beds Not Made) w/Full Week Rental</FONT></P><H3><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rates - Saturday Check-in.</FONT></H3><CENTER><TABLE class=ratestable style=\"WIDTH: 516px; HEIGHT: 509px\" cellPadding=4 border=1><TBODY><TR><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Start Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>End Date</FONT></TH><TH class=rateheads><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>Rate</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>12/30/2006</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/04/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/05/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/18/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>05/19/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/01/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/02/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/08/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 4,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/09/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/15/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 6,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/16/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/29/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 9,695.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>06/30/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/10/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 10,195.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/11/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/17/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 8,495.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/18/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/24/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 6,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/25/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>08/31/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 5,495.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/01/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/14/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>09/15/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/12/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 2,795.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>10/13/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/16/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,995.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/17/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/23/2007</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 3,295.00/wk.</FONT></TH></TR><TR><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>11/24/2007</FONT></TD><TD class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>01/04/2008</FONT></TD><TH class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\" size=1>$ 1,995.00/wk.</FONT></TH></TR></TBODY></TABLE><CENTER><SPAN class=rates><FONT face=\"Verdana, Arial, Helvetica, sans-serif\"><FONT size=1><B>Security Deposit:</B> $500</FONT></FONT></SPAN></CENTER></CENTER>', -1, -1, 0, -1, -1, 1995, -1, 0, -1, 0, -1, -1, -1, -1, 'You are invited to enjoy this Paradise in the Sand! This home offers you everything Imaginable for a Fabulous Vacation Retreat! It is Large enough to accommodate a Magical Family Reunion, yet Spacious enough to allow Family & Friends the chance for Privacy & a Peaceful Vacation Get-A-Way. ', 'tf-1-20070419-211958.jpg', 'Oceanfront', -1, 'Twisted Fish', -1, 0, 'tf-1-20070419-211958.jpg', 'tf-10-20070419-212114.jpg', 'tf-11-20070419-212117.jpg', 'tf-12-20070419-212121.jpg', 'tf-13-20070419-212125.jpg', 'tf-14-20070419-212129.jpg', NULL, 'tf-2-20070419-212001.jpg', 'tf-3-20070419-212003.jpg', 'tf-4-20070419-212008.jpg', 'tf-5-20070419-212011.jpg', 'tf-6-20070419-212050.jpg', 'tf-7-20070419-212055.jpg', 'tf-8-20070419-212059.jpg', 'tf-9-20070419-212110.jpg', -1, -1, 11, -1, 'NC', 'S. Old Oregon Inlet Rd. MP: 19.5', 'House', -1);

-- --------------------------------------------------------

--
-- Table structure for table `vacpropertytype`
--

CREATE TABLE `vacpropertytype` (
  `propertytype` varchar(50) DEFAULT NULL,
  `propertytypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacpropertytype`
--

INSERT INTO `vacpropertytype` (`propertytype`, `propertytypeID`) VALUES
('Condominium', 1),
('House', 2),
('Room', 3),
('Townhome', 4),
('Twinhome', 5),
('Hotel Room', 6),
('Studio', 7);

-- --------------------------------------------------------

--
-- Table structure for table `vacreservations`
--

CREATE TABLE `vacreservations` (
  `FromDate` varchar(50) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `RentersAddress` varchar(50) DEFAULT NULL,
  `RentersName` varchar(50) DEFAULT NULL,
  `RentersPhoneNumber` varchar(50) DEFAULT NULL,
  `ReservationID` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `ToDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacreservations`
--

INSERT INTO `vacreservations` (`FromDate`, `PropertyID`, `RentersAddress`, `RentersName`, `RentersPhoneNumber`, `ReservationID`, `status`, `ToDate`) VALUES
('2007-6-9', 2, '1234 Woodland Dr, Maple Grove, MN 55311', 'John Adams', '763-123-4565', 1, 3, '2007-6-16'),
('2007-4-14', 2, '45981 Village Rd, Herndon, VA', 'Sam Kesler', '777-111-1515', 2, 2, '2007-4-21'),
('2007-7-1', 3, '154 Smith Ave, Bloomington, WA', 'Emy Mollins', NULL, 3, 1, '2007-7-8'),
('2007-8-18', 4, '987 15th street n, Wwooddale, PA ', 'Jenny Hockins', NULL, 4, 2, '2007-8-25'),
('2007-5-12', 4, '9615 West Knollwood dr, Duluth, ND', 'Michael Olson', NULL, 5, 3, '2007-5-19');

-- --------------------------------------------------------

--
-- Table structure for table `vacstates`
--

CREATE TABLE `vacstates` (
  `State` varchar(50) DEFAULT NULL,
  `StateAbbreviation` varchar(50) DEFAULT NULL,
  `StateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacstates`
--

INSERT INTO `vacstates` (`State`, `StateAbbreviation`, `StateID`) VALUES
('ALABAMA', 'AL', 1),
('ALASKA', 'AK', 2),
('ARIZONA ', 'AZ', 3),
('ARKANSAS', 'AR', 4),
('CALIFORNIA ', 'CA', 5),
('COLORADO ', 'CO', 6),
('CONNECTICUT', 'CT', 7),
('DELAWARE', 'DE', 8),
('DISTRICT OF COLUMBIA', 'DC', 9),
('FLORIDA', 'FL', 10),
('GEORGIA', 'GA', 11),
('HAWAII', 'HI', 12),
('IDAHO', 'ID', 13),
('ILLINOIS', 'IL', 14),
('INDIANA', 'IN', 15),
('IOWA', 'IA', 16),
('KANSAS', 'KS', 17),
('KENTUCKY', 'KY', 18),
('LOUISIANA', 'LA', 19),
('MAINE', 'ME', 20),
('MARYLAND', 'MD', 21),
('MASSACHUSETTS', 'MA', 22),
('MICHIGAN', 'MI', 23),
('MINNESOTA', 'MN', 24),
('MISSISSIPPI', 'MS', 25),
('MISSOURI', 'MO', 26),
('MONTANA', 'MT', 27),
('NEBRASKA', 'NE', 28),
('NEVADA', 'NV', 29),
('NEW HAMPSHIRE', 'NH', 30),
('NEW JERSEY', 'NJ', 31),
('NEW MEXICO', 'NM', 32),
('NEW YORK', 'NY', 33),
('NORTH CAROLINA', 'NC', 34),
('NORTH DAKOTA', 'ND', 35),
('OHIO', 'OH', 36),
('OKLAHOMA', 'OK', 37),
('OREGON', 'OR', 38),
('PENNSYLVANIA', 'PA', 39),
('RHODE ISLAND', 'RI', 40),
('SOUTH CAROLINA', 'SC', 41),
('SOUTH DAKOTA', 'SD', 42),
('TENNESSEE', 'TN', 43),
('TEXAS', 'TX', 44),
('UTAH', 'UT', 45),
('VERMONT', 'VT', 46),
('VIRGINIA ', 'VA', 47),
('WASHINGTON', 'WA', 48),
('WEST VIRGINIA', 'WV', 49),
('WISCONSIN', 'WI', 50),
('WYOMING', 'WY', 51);

-- --------------------------------------------------------

--
-- Table structure for table `vacstatus`
--

CREATE TABLE `vacstatus` (
  `status` varchar(50) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacstatus`
--

INSERT INTO `vacstatus` (`status`, `ID`) VALUES
('No payment received', 1),
('Deposit received', 2),
('Paid in full', 3),
('Deposit returned', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vacusers`
--

CREATE TABLE `vacusers` (
  `email` varchar(50) DEFAULT NULL,
  `group` varchar(50) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacusers`
--

INSERT INTO `vacusers` (`email`, `group`, `ID`, `password`, `username`) VALUES
(NULL, 'admin', 1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kbarticles`
--
ALTER TABLE `kbarticles`
  ADD PRIMARY KEY (`ArticleID`);

--
-- Indexes for table `kbcategories`
--
ALTER TABLE `kbcategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `kbcomments`
--
ALTER TABLE `kbcomments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `kbusers`
--
ALTER TABLE `kbusers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `memoptions`
--
ALTER TABLE `memoptions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `memprices`
--
ALTER TABLE `memprices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `memusers`
--
ALTER TABLE `memusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vacareas`
--
ALTER TABLE `vacareas`
  ADD PRIMARY KEY (`AreaID`);

--
-- Indexes for table `vacbathrooms`
--
ALTER TABLE `vacbathrooms`
  ADD PRIMARY KEY (`bathroomsID`);

--
-- Indexes for table `vacbedrooms`
--
ALTER TABLE `vacbedrooms`
  ADD PRIMARY KEY (`bedroomsID`);

--
-- Indexes for table `vaclocations`
--
ALTER TABLE `vaclocations`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `vacproperties`
--
ALTER TABLE `vacproperties`
  ADD PRIMARY KEY (`PropertyID`);

--
-- Indexes for table `vacpropertytype`
--
ALTER TABLE `vacpropertytype`
  ADD PRIMARY KEY (`propertytypeID`);

--
-- Indexes for table `vacreservations`
--
ALTER TABLE `vacreservations`
  ADD PRIMARY KEY (`ReservationID`);

--
-- Indexes for table `vacstates`
--
ALTER TABLE `vacstates`
  ADD PRIMARY KEY (`StateID`);

--
-- Indexes for table `vacstatus`
--
ALTER TABLE `vacstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vacusers`
--
ALTER TABLE `vacusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kbarticles`
--
ALTER TABLE `kbarticles`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kbcategories`
--
ALTER TABLE `kbcategories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kbcomments`
--
ALTER TABLE `kbcomments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `memoptions`
--
ALTER TABLE `memoptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `memprices`
--
ALTER TABLE `memprices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `memusers`
--
ALTER TABLE `memusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vacareas`
--
ALTER TABLE `vacareas`
  MODIFY `AreaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vacbathrooms`
--
ALTER TABLE `vacbathrooms`
  MODIFY `bathroomsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vacbedrooms`
--
ALTER TABLE `vacbedrooms`
  MODIFY `bedroomsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vaclocations`
--
ALTER TABLE `vaclocations`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vacproperties`
--
ALTER TABLE `vacproperties`
  MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vacpropertytype`
--
ALTER TABLE `vacpropertytype`
  MODIFY `propertytypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vacreservations`
--
ALTER TABLE `vacreservations`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vacstates`
--
ALTER TABLE `vacstates`
  MODIFY `StateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `vacstatus`
--
ALTER TABLE `vacstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vacusers`
--
ALTER TABLE `vacusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `myblog`
--
CREATE DATABASE IF NOT EXISTS `myblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myblog`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `category`, `author`, `created`, `modified`) VALUES
(1, 'First Blog Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget urna sit amet erat pellentesque posuere mattis sit amet quam. Cras elementum quis eros id blandit. Suspendisse quis est ultricies, bibendum purus sed, lacinia felis. Sed scelerisque sapien sit amet massa imperdiet imperdiet.', 'Technology', 'Brad Traversy', '2017-02-01 00:00:00', '2017-02-01 00:00:00'),
(2, 'Second blog post', 'Suspendisse a sem vitae risus placerat imperdiet. Donec orci justo, maximus quis quam in, sagittis consequat justo. Duis gravida lacus vel diam semper ullamcorper at porta dui. Vivamus dolor tortor, convallis eget turpis at, scelerisque lacinia ex. Etiam at finibus felis. Nam ex nisi, fringilla vitae luctus et, consequat non mi.', 'Business', 'John Doe', '2017-02-04 00:00:00', '2017-02-04 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;--
-- Database: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydb`;
--
-- Database: `myprojects`
--
CREATE DATABASE IF NOT EXISTS `myprojects` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myprojects`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- in use(#1932 - Table 'myprojects.categories' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`categories`' at line 1)

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--
-- in use(#1932 - Table 'myprojects.clients' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`clients`' at line 1)

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--
-- in use(#1932 - Table 'myprojects.notes' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`notes`' at line 1)

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--
-- in use(#1932 - Table 'myprojects.projects' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`projects`' at line 1)

-- --------------------------------------------------------

--
-- Table structure for table `projects_tags`
--
-- in use(#1932 - Table 'myprojects.projects_tags' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`projects_tags`' at line 1)

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--
-- in use(#1932 - Table 'myprojects.tags' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`tags`' at line 1)

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- in use(#1932 - Table 'myprojects.users' doesn't exist in engine)
-- Error reading data: (#1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `myprojects`.`users`' at line 1)
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'test2', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"intrasys\",\"intrasys_1\",\"mydb\",\"myprojects\",\"phpmyadmin\",\"test\",\"test2\"],\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"excel_columns\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_use_transaction\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(2, 'root', 'server', 'is3102', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"intrasys\",\"is3102\",\"myblog\",\"mydb\",\"myprojects\",\"phpmyadmin\"],\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"excel_columns\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_use_transaction\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-02-07 02:35:23', '{\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
