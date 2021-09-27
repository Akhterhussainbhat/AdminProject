-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2021 at 05:19 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addsubject`
--

DROP TABLE IF EXISTS `addsubject`;
CREATE TABLE IF NOT EXISTS `addsubject` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sid` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsubject`
--

INSERT INTO `addsubject` (`id`, `name`, `sid`) VALUES
(19, 'science', 1),
(2, 'English', 1),
(3, 'maths', 1),
(4, 'physical education', 2),
(5, 'java', 2),
(6, 'php', 2),
(18, 'math', 1),
(17, 'history', 1),
(9, 'physices', 3),
(10, 'maths', 3),
(11, 'chemistry', 1),
(12, 'physical education', 1),
(13, 'chemistry', 2),
(14, 'hindi', 2),
(15, 'java', 3),
(16, 'cpp', 3),
(20, 'dca', 1),
(21, 'java', 1),
(22, 'History', 5),
(23, 'tyrhtgrf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

DROP TABLE IF EXISTS `adminprofile`;
CREATE TABLE IF NOT EXISTS `adminprofile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`id`, `name`, `email`, `address`, `education`, `skills`, `image`) VALUES
(1, 'Akhter HUssain ', 'akhterhussainbhat14@gmail.com', 'Jammu and kashmir', 'B.tech computer science', 'java, php,Mysql,html,css ,Vuejs,c++', '../uploadPicture/akhter1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pimage` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pprice` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pimage`, `pname`, `pprice`, `qty`, `total`, `pcode`) VALUES
(1, '../uploadPicture/mensports3.jpeg', 'Shoes', 1470, 2, '2940', '8'),
(2, '../uploadPicture/facewash1.jpeg', 'Charcoal', 285, 2, '570', '4'),
(3, '../uploadPicture/kidsshirt1.jpeg', 'Tshirts', 784, 1, '784', '3'),
(4, '../uploadPicture/women1.jpeg', 'Necklace', 1862, 1, '1862', '1'),
(5, '../uploadPicture/mensportboxer1.jpeg', 'Shorts', 980, 1, '980', '2'),
(7, '../uploadPicture/kidstrackpant.jpeg', 'Lower', 475, 1, '475', '5'),
(8, '../uploadPicture/womenear1.jpeg', 'EarRing', 980, 1, '980', '6'),
(9, '../uploadPicture/kidsjacket1.jpeg', 'jeansJacket', 1470, 1, '1470', '7');

-- --------------------------------------------------------

--
-- Table structure for table `changepass`
--

DROP TABLE IF EXISTS `changepass`;
CREATE TABLE IF NOT EXISTS `changepass` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changepass`
--

INSERT INTO `changepass` (`id`, `username`, `password`) VALUES
(1, 'Akhter', 'ravi');

-- --------------------------------------------------------

--
-- Table structure for table `contactashon`
--

DROP TABLE IF EXISTS `contactashon`;
CREATE TABLE IF NOT EXISTS `contactashon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactashon`
--

INSERT INTO `contactashon` (`id`, `name`, `email`, `website`, `message`) VALUES
(1, 'Akhter HUssain Bhat', 'akhterhussainbhat14@gmail.com', 'SportsandStudy', 'i m intrested in your company');

-- --------------------------------------------------------

--
-- Table structure for table `formtable`
--

DROP TABLE IF EXISTS `formtable`;
CREATE TABLE IF NOT EXISTS `formtable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT 'o for reject, 1 for approve',
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formtable`
--

INSERT INTO `formtable` (`id`, `title`, `description`, `status`, `image`) VALUES
(1, 'Women', 'Women fashion is most moderated at this time', '0', '../uploadPicture/product-7.jpg'),
(2, 'Men ', 'Men show more power in beauty', '0', '../uploadPicture/product-2.jpg'),
(3, 'kids', 'kids shows cuteness', '1', '../uploadPicture/product-5.jpg'),
(4, 'Cosmetics', 'Cosmetics gives more revenue in the field', '1', '../uploadPicture/category-4.jpg'),
(9, 'Accessories', 'good', '1', '../uploadPicture/product-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `track_id` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `status` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `track_id`, `product_id`, `status`, `date`, `order_id`) VALUES
(1, 'AK5638860538', '8,4,3,1,2,5', 2, '2021-07-14 01:26:48', 'HUS5769064697HUSS'),
(2, 'AK4017599039', '8,4,3,1,2,5', 0, '2021-07-14 01:31:09', 'HUS8339365145HUSS'),
(3, 'AK4736649366', '8,4,3,1,2,5', 0, '2021-07-14 01:32:50', 'HUS5743114355HUSS'),
(4, 'AK7437125193', '8,4,3,1,2,5', 0, '2021-07-14 01:33:46', 'HUS6967509245HUSS'),
(5, 'AK1705824069', '8,4,3,1,2,5,6,7', 0, '2021-07-14 01:44:38', 'HUS2363243233HUSS'),
(6, 'AK1865613748', '8,4,3,1,2,5,6,7', 0, '2021-07-14 01:46:51', 'HUS4343689702HUSS');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES
(1, 'Akhter HUssain Bhat', 100, 'Complete', 'pay_HOdzSt33N9UoKQ', '2021-06-18 07:47:12'),
(2, 'Akhter HUssain Bhat', 100, 'Complete', '', '2021-06-18 08:02:38'),
(3, 'Akhter HUssain Bhat', 100, 'Complete', '', '2021-06-18 08:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

DROP TABLE IF EXISTS `productimages`;
CREATE TABLE IF NOT EXISTS `productimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proid` int(11) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `proid`, `product_image`) VALUES
(1, 1, 'women2.jpeg'),
(2, 1, 'women3.jpeg'),
(3, 1, 'women1.jpeg'),
(4, 2, 'mensportboxer2.jpeg'),
(5, 2, 'mensportboxer3.jpeg'),
(6, 2, 'mensportboxer4.jpeg'),
(7, 3, 'kidsshirt2.jpeg'),
(8, 3, 'kidsshirt3.jpeg'),
(9, 3, 'kidsshirt4.jpeg'),
(10, 4, 'facewash2.jpeg'),
(11, 4, 'facewash3.jpeg'),
(12, 4, 'facewash4.jpeg'),
(13, 5, 'kidstrackpant2.jpeg'),
(14, 5, 'kidstrackpant3.jpeg'),
(15, 5, 'kidstrackpant4.jpeg'),
(16, 6, 'womenear2.jpeg'),
(17, 6, 'womenear3.jpeg'),
(18, 6, 'womenear4.jpeg'),
(19, 7, 'kidsjacket2.jpeg'),
(20, 7, 'kidsjacket3.jpeg'),
(21, 7, 'kidsjacket4.jpeg'),
(22, 8, 'mensports4.jpeg'),
(23, 8, 'menshoes3.jpeg'),
(24, 8, 'menshoes4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `catid` int(100) NOT NULL,
  `subcatid` int(100) NOT NULL,
  `Producttitle` varchar(200) NOT NULL,
  `productdescription` varchar(200) NOT NULL,
  `actualPrice` int(100) NOT NULL,
  `discount` int(100) NOT NULL,
  `salesPrice` int(100) NOT NULL,
  `status` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catid`, `subcatid`, `Producttitle`, `productdescription`, `actualPrice`, `discount`, `salesPrice`, `status`, `image`) VALUES
(1, 1, 1, 'Necklace', 'Necklace is good for women', 1900, 2, 1862, 1, '../uploadPicture/women1.jpeg'),
(2, 2, 2, 'Shorts', 'shorts is very comfortable in summer', 1000, 2, 980, 1, '../uploadPicture/mensportboxer1.jpeg'),
(3, 3, 3, 'Tshirts', 'tshirts suits on kids', 800, 2, 784, 1, '../uploadPicture/kidsshirt1.jpeg'),
(4, 4, 4, 'Charcoal', 'charcoal face wash makes you shine', 300, 5, 285, 1, '../uploadPicture/facewash1.jpeg'),
(5, 3, 7, 'Lower', 'lower is comfortable in walking', 500, 5, 475, 1, '../uploadPicture/kidstrackpant.jpeg'),
(6, 1, 1, 'EarRing', 'ear rings suits on girls', 1000, 2, 980, 1, '../uploadPicture/womenear1.jpeg'),
(7, 3, 8, 'jeansJacket', 'jeans jackets is ever green', 1500, 2, 1470, 1, '../uploadPicture/kidsjacket1.jpeg'),
(8, 2, 2, 'Shoes', 'sports shoes are very good in running', 1500, 2, 1470, 1, '../uploadPicture/mensports3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirm` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `password`, `confirm`, `phoneno`) VALUES
(1, 'Akhter ', 'akhterhussainbhat14@gmail.com', '123456', '123456', '6005598533'),
(2, 'Akhter ', 'akhterhussain216@gmail.com', 'bhat', 'bhat', '6005598533');

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

DROP TABLE IF EXISTS `subcat`;
CREATE TABLE IF NOT EXISTS `subcat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `chooseone` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `catid`, `title`, `description`, `image`, `chooseone`) VALUES
(1, 1, 'Jewellery', 'women prefer jewellery more than other items', '../uploadPicture/shop-7.jpg', NULL),
(2, 2, 'Sports', 'Give men Anything He will wear', '../uploadPicture/cp-3.jpg', NULL),
(3, 3, 'Shirts', 'Everything suits on kids', '../uploadPicture/category-2.jpg', NULL),
(4, 4, 'FaceWash', 'This Facewash Shines your face', '../uploadPicture/facewash.jpg', NULL),
(6, 4, 'HairCare', 'Care your hair timely otherwise they will damage', '../uploadPicture/haircare.jpg', NULL),
(7, 3, 'Trackpant', 'check your size of your trackpant', '../uploadPicture/trackpant.jpg', NULL),
(8, 3, 'jackets', 'Jacket keeps your body warm', '../uploadPicture/jacket.jpg', NULL),
(11, 1, 'Jwellery', 'jweelery is best', '../uploadPicture/5.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `wimage` varchar(200) NOT NULL,
  `wname` varchar(200) NOT NULL,
  `wprice` varchar(200) NOT NULL,
  `wtotal` varchar(200) NOT NULL,
  `wcode` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `wimage`, `wname`, `wprice`, `wtotal`, `wcode`) VALUES
(1, '../uploadPicture/facewash1.jpeg', 'Charcoal', '285', '285', 4),
(2, '../uploadPicture/mensports3.jpeg', 'Shoes', '1470', '1470', 8),
(3, '../uploadPicture/kidsshirt1.jpeg', 'Tshirts', '784', '784', 3),
(4, '../uploadPicture/mensportboxer1.jpeg', 'Shorts', '980', '980', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
