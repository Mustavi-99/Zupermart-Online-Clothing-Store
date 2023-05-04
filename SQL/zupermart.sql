-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 06:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zupermart`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `AID` int(11) NOT NULL,
  `StorePURL` varchar(255) NOT NULL,
  `BrandPURL` varchar(255) NOT NULL,
  `AboutDesc` mediumtext NOT NULL,
  `FounderPURL` varchar(255) NOT NULL,
  `FounderName` varchar(255) NOT NULL,
  `FounderDesc` mediumtext NOT NULL,
  `Address` mediumtext NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `WhatsApp` varchar(255) NOT NULL,
  `LocationLink` mediumtext NOT NULL,
  `FBURL` mediumtext NOT NULL,
  `WAURL` mediumtext NOT NULL,
  `YTURL` mediumtext NOT NULL,
  `INSTAURL` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`AID`, `StorePURL`, `BrandPURL`, `AboutDesc`, `FounderPURL`, `FounderName`, `FounderDesc`, `Address`, `Email`, `Phone`, `WhatsApp`, `LocationLink`, `FBURL`, `WAURL`, `YTURL`, `INSTAURL`) VALUES
(1, 'images/about-us/store.jpg', 'images/about-us/logo_big.png', 'Founded on October 27th, 2017 by young entrepreneur Farhan Chowdhury Mahir, ZuperMart has come a long way. \r\n              <br><br>\r\n              The owner Farhan himself is a fashion enthusiast. \r\n              All the clothing, accessories are handpicked and designed to \r\n              always suit the current trend. In your busy lives, keeping you \r\n              effortlessly stylish is our mission.\r\n              You don’t need to go to various shops, you will find all your \r\n              needs here. Shirts, T-shirts, Pants, Shoes, Accessories and more.\r\n              <br><br>\r\n              Unlike any other, we are always following our customer needs and \r\n              keeping track of their satisfaction through the large community we \r\n              have built. ', 'images/about-us/farhan-small.png', 'Farhan Chowdhury Mahir', 'A fashion enthusiast himself who always dreamt about being in the fashion industry.\r\n               From a young age did modelling for various brands and developed a kin sense of \r\n               fashion himself. And at a young age of 19, he opened the shop he always dreamt \r\n               about which reflected sharp and trendy fashion sense that he has.\r\n              <br><br>  \r\n              ZuperMart is not just a store, it’s the passion of someone who loves fashion.\r\n              ', 'Mojumdari (opposite of fulkoli) 3100 Sylhet, Sylhet Division, Bangladesh', 'zupermartbd@gmail.com', '01715-820393', '+880 1758-535543', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.6581639011292!2d91.86912261447856!3d24.9096391494205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375055b6871dec83%3A0x31cf28bdbaa8934c!2sZuper%20mart%20bd!5e0!3m2!1sen!2sbd!4v1632077375288!5m2!1sen!2sbd', 'https://www.facebook.com/zupermartbd', 'https://api.whatsapp.com/send?phone=8801758535543&fbclid=IwAR2EjUOyETF9AsxWD7sNDDktkXU7z_V_lXLLyqIpkbR_36asLOqObjFqmxA', 'https://www.youtube.com/channel/UC_AX5dZCKM2Ahr6BuOEQRGA', 'https://www.instagram.com/zupermartbd/');

-- --------------------------------------------------------

--
-- Table structure for table `allproducts`
--

CREATE TABLE `allproducts` (
  `PID` int(11) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `PType` varchar(255) NOT NULL,
  `PBrand` varchar(255) NOT NULL,
  `PRating` float NOT NULL,
  `PSold` varchar(255) NOT NULL,
  `Showcase` int(11) NOT NULL DEFAULT 0,
  `Pimgurl` varchar(255) NOT NULL,
  `inStock` int(11) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `PAddDate` date NOT NULL,
  `SDescription` varchar(255) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Exclusivity` int(11) NOT NULL DEFAULT 0,
  `S` int(11) NOT NULL DEFAULT 0,
  `M` int(11) NOT NULL DEFAULT 0,
  `L` int(11) NOT NULL DEFAULT 0,
  `Sale` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allproducts`
--

INSERT INTO `allproducts` (`PID`, `PName`, `PType`, `PBrand`, `PRating`, `PSold`, `Showcase`, `Pimgurl`, `inStock`, `Price`, `PAddDate`, `SDescription`, `Description`, `Exclusivity`, `S`, `M`, `L`, `Sale`) VALUES
(1, 'Men\'s Casual Shirt', 'Casual Shirt', 'Yellow BD', 4.8, '', 1, 'images/product-preview/casual-shirt-1 (0).jpg', 0, '৳ 1,695.00', '2021-10-01', 'This Is a casual shirt', '100% Cotton, Printed smart casual shirt for men. \r\n                NB: Depending on your computer or mobile screen resolution, product color may vary slightly.', 0, 1, 1, 0, 10),
(2, 'Men\'s Casual Shirt', 'Casual Shirt', 'Yellow BD', 4.5, '3', 0, 'images/product-preview/casual-shirt-2 (0).jpg', 7, '৳ 1,695.00', '2021-10-02', 'This Is a casual shirt', '100% Cotton, Printed smart casual shirt for men.', 0, 0, 1, 0, 0),
(3, 'Men\'s Casual Shirt', 'Casual Shirt', 'Yellow BD', 4, '1', 0, 'images/product-preview/casual-shirt-3 (0).jpeg', 3, '৳ 1,695.00', '2021-10-03', 'Casual Shirt which is 100% cotton. Comfortable.', '100% Cotton, Printed smart casual shirt for men.', 0, 8, 4, 1, 25),
(4, 'Men\'s Casual Shirt', 'Casual Shirt', 'Yellow BD', 3.5, '1', 1, 'images/product-preview/casual-shirt-4 (0).jpg', 5, '৳ 1,795.00', '2021-10-02', 'Striped round necked Casual Shirt. Good for a rough uses.', '100% Cotton, round necked smart casual shirt for men. Hand or machine washable. Long sleeve.', 0, 1, 2, 2, 0),
(5, 'Men\'s Casual Shirt', 'Casual Shirt', 'Yellow BD', 3.9, '2', 0, 'images/product-preview/casual-shirt-5 (0).jpg', 1, '৳ 1,695.00', '2021-09-30', 'Night black casual shirt perfect for you night out', 'Dotted, night black casual shirt. Full cotton. Comfortable. Easily washable.', 0, 0, 0, 1, 0),
(6, 'Men\'s Casual Shirt', 'Casual Shirt', 'Yellow BD', 4.4, '5', 0, 'images/product-preview/casual-shirt-6 (0).jpg', 3, '৳ 1,695.00', '2021-09-27', 'Bright colored formal-casual Shirt.', 'A Shirt that you can use on formal occasion as well as casual occasion. Striped bright color looks fashionable. 100% cotton material gives you comfort.', 0, 1, 1, 1, 40),
(7, 'Striped Polo', 'Polo Tshirt', 'Cats Eye', 3.5, '0', 0, 'images/product-preview/prd (1).jpg', 12, '৳ 1,350.00', '2021-10-03', 'Striped Polo T-shirt. Great for Summer.', 'Solid Pique Polo Structured Fit T Shirt For Men. Contrasting Placket For A More Trendy Look. Depending On Your Computer Or Mobile Screen Resolution, Product Color May Vary Slightly.', 0, 1, 5, 6, 0),
(8, 'Basic Polo', 'Polo Tshirt', 'Cats Eye', 3.5, '0', 1, 'images/product-preview/prd (2).jpg', 18, '৳ 1,250.00', '2021-10-03', 'Basic, solid colored designed Polo Tshirt for men', 'Solid Pique Polo Structured Fit T Shirt For Men. Contrasting Placket For A More Trendy Look. Depending On Your Computer Or Mobile Screen Resolution, Product Color May Vary Slightly.', 0, 6, 6, 6, 20),
(9, 'Solid Color Casual Pants', 'Casual Pants', 'Cats Eye', 4.8, '5', 0, 'images/product-preview/prd (3).jpg', 5, '৳ 1,950.00', '2021-09-29', 'Very few things can go wrong with a solid colored casual pant', 'Casual Pants for men. Solid Color which can go with pretty much anything. Trendy, fashionable, comfortable. Hand/machine wash. Depending on your computer or mobile screen resolution, product color may vary slightly.', 0, 3, 0, 2, 25),
(10, 'Solid Colour Casual Pants', 'Casual Pants', 'Cats Eye', 5, '9', 1, 'images/product-preview/prd (4).jpg', 5, '৳ 2,390.00', '2021-09-29', 'Treandy Solid Colored Casual Pants', 'Casual Pants for men. Solid Color which can go with pretty much anything. Trendy, fashionable, comfortable. Hand/machine wash. Depending on your computer or mobile screen resolution, product color may vary slightly.', 0, 0, 2, 3, 0),
(11, 'Check Casual Pants', 'Casual Pants', 'Cats Eye', 4.8, '3', 0, 'images/product-preview/prd (5).jpg', 9, '৳ 1,950.00', '2021-09-23', 'Checkered Formal-Casual Pant', 'Casual Pants for men. The checkered design gives it a formal vibe. Ironing it is recommended. Machine/hand washable. Depending on your computer or mobile screen resolution, product color may vary slightly.', 0, 3, 3, 3, 0),
(12, 'Solid Colour Formal Pant', 'Formal Pants', 'Cats Eye', 4, '0', 0, 'images/product-preview/prd (6).jpg', 18, '৳ 2,150.00', '2021-10-03', 'Solid Ash Colored Formal Pant for men', 'Formal Pant for Men. Ash Color. Can match with ash colored suits. Handwash recommended. Depending on your computer or mobile screen resolution, product color may vary slightly.', 0, 6, 6, 6, 20),
(13, 'Original Adidas Face Mask', 'Facemask', 'Adidas', 4.9, '30', 0, 'images/exclusive/mask-adidas-1.jpg', 70, '৳ 1,800.00', '2021-08-15', 'Original Adidas Face Mask', 'Original Exported Top Quality Adidas Face Mask. Washable. Multilayered. Comfortable to wear. ', 1, 35, 35, 0, 0),
(14, 'Vercase Cap', 'Cap', 'Vercase', 5, '12', 0, 'images/exclusive/cap-1.jpg', 12, '৳ 695.00', '2021-10-02', 'Original Exported Vercase Cap', 'Original Exported Brand Content. Available in various colors. Breathable. Cotton in-seam. Superior stiches. Washable. Unisize.', 1, 4, 4, 4, 0),
(15, 'Premium slim fit T-shirt', 'Tshirt', 'Zupermart BD', 4.3, '3', 0, 'images/exclusive/premium tshirt-1.jpg', 18, '৳ 990.00', '2021-09-24', 'Premium quality regular slim fit T-shirt', 'Handmade in our own factory, this product is of top quality. Short Sleeved, Regular slim fit, hand/machine wash. Color may vary a little.', 1, 6, 6, 6, 0),
(16, 'Premium quality shirt', 'Casual Shirt', 'Zupermart BD', 4.1, '2', 0, 'images/exclusive/premium shirt-1.jpg', 3, '৳ 1,195.00', '2021-10-02', 'Premium quality regular slim fit shirt', 'Made in our own factory, we ensure premium quality for this product. Regular slim fit, hawaian style shirt perfect for you vacation outings. Hand/Machin wash.', 1, 1, 0, 2, 0),
(17, 'Premium Quality Jeans', 'Jeans', 'Zupermart BD', 4, '1', 0, 'images/exclusive/premium jeans-1.jpg', 2, '৳ 1,490.00', '2021-09-30', 'Premium quality, slim fit jeans for men', 'Made in our own factory, these premium jeans comes in 3 colors - Blue, Olive, Black. These trendy jeans can be worn with any fashion. Handwash recommended.', 1, 0, 1, 1, 0),
(18, 'Premium Silk Shirt', 'Casual Shirts', 'Zupermart BD', 3.5, '0', 0, 'images/exclusive/silk shirt-1.jpg', 6, '৳ 1,390.00', '2021-09-30', 'Premium Quality Silk Shirt ', 'Premium Quality Silk shirt for men. Uniquely designed, fashionable. Stay trendy with this unique design and material and stand out of the crowd. Handwash recommended. Iron with caution.', 1, 3, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Adress` int(11) DEFAULT NULL,
  `ImageURL` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `ActivationCode` int(11) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CID`, `UserName`, `Email`, `Password`, `Phone`, `Adress`, `ImageURL`, `Status`, `ActivationCode`, `CreatedDate`) VALUES
(101, 'Baba Yaga', 'doglover@gmail.com', 'pencil11@', '1', NULL, '', 0, NULL, '2021-09-23 21:09:25'),
(102, 'mustavi', 'mustavi.sadim99@gmail.com', 'solo6@', '01619333661', NULL, 'images/users/102-mustavi.jpg', 1, NULL, '2021-09-23 21:21:16'),
(105, 'arman', '54@gmail.com', 'minato54!', '0196666456', NULL, 'images/users/105-arman.jpg', 1, NULL, '2021-09-24 14:59:09'),
(106, 'Kakashi', 'kakashi@gmail.com', 'ichaicha95!', '01556633222', NULL, '', 1, NULL, '2021-10-06 21:34:20'),
(107, 'minato', 'arman@gmail.com', 'arman54!', '0196666479', NULL, '', 0, NULL, '2021-10-07 20:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Message` mediumtext NOT NULL,
  `SubmitDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MID`, `FullName`, `Email`, `Phone`, `Message`, `SubmitDate`) VALUES
(1, 'Mustavi Sadim', 'mustavi.sadim99@gmail.com', '01619333661', 'Testing', '2021-09-26 01:02:03'),
(2, 'Mustavi Sadim', 'mustavi.sadim99@gmail.com', '01619333661', 'Testing 2', '2021-09-26 01:04:27'),
(3, 'Kakashi', 'kakashi@gmail.com', '001556633222', 'I am the only remaining student of fourth hokage, Minato.', '2021-10-07 01:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `ColID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Colors` varchar(255) NOT NULL,
  `Availability` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcolor`
--

INSERT INTO `productcolor` (`ColID`, `PID`, `Colors`, `Availability`) VALUES
(1, 1, 'Black', 1),
(2, 1, 'White', 1),
(3, 2, 'Sky Blue', 1),
(4, 2, 'Orange', 1),
(5, 3, 'Violet', 1),
(6, 3, 'Sky Blue', 1),
(7, 4, 'Purple Striped', 1),
(8, 4, 'Brown Striped', 1),
(9, 5, 'Black Dotted', 1),
(10, 5, 'Purple Dotted', 1),
(11, 6, 'Sky Blue', 1),
(12, 6, 'Light Green', 1),
(13, 7, 'Pink-Black Striped', 1),
(14, 7, 'Green-Black Striped', 1),
(15, 8, 'Green', 1),
(16, 8, 'Orange', 1),
(17, 8, 'Black', 1),
(18, 8, 'Brown', 1),
(19, 9, 'Olive', 1),
(20, 9, 'Ash', 1),
(21, 9, 'Black', 1),
(22, 10, 'Beige', 1),
(23, 10, 'Brown', 1),
(24, 11, 'Ash', 1),
(25, 11, 'Black', 1),
(26, 12, 'Grey', 1),
(27, 13, 'black', 1),
(28, 13, 'Navy Blue', 1),
(29, 14, 'sky blue', 1),
(30, 14, 'White', 1),
(31, 15, 'Black', 1),
(32, 15, 'White', 1),
(33, 16, 'Black', 1),
(34, 17, 'Sky Blue', 1),
(35, 17, 'Black', 1),
(36, 17, 'Olive', 1),
(37, 18, 'Black Golden Dotted', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productspecification`
--

CREATE TABLE `productspecification` (
  `SID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Specifications` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productspecification`
--

INSERT INTO `productspecification` (`SID`, `PID`, `Specifications`) VALUES
(1, 1, 'Casual'),
(2, 1, 'Half Sleeve'),
(3, 1, '100% Cotton'),
(4, 1, 'Printed design'),
(5, 1, 'Hand/machine wash'),
(6, 1, 'Slim fit'),
(7, 2, 'Casual'),
(8, 2, 'Half Sleeve'),
(9, 2, '100% Cotton'),
(10, 2, 'Printed design'),
(11, 2, 'Hand/machine wash'),
(12, 2, 'Slim fit'),
(13, 3, 'Casual'),
(14, 3, 'Half Sleeve'),
(15, 3, '100% Cotton'),
(16, 3, 'Printed design'),
(17, 3, 'Hand/machine wash'),
(18, 3, 'Slim fit'),
(19, 4, 'Casual'),
(20, 4, 'Half Sleeve'),
(21, 4, '100% Cotton'),
(22, 4, 'Printed design'),
(23, 4, 'Hand/machine wash'),
(24, 4, 'Slim fit'),
(25, 5, 'Casual'),
(26, 5, 'Half Sleeve'),
(27, 5, '100% Cotton'),
(28, 5, 'Printed design'),
(29, 5, 'Hand/machine wash'),
(30, 5, 'Slim fit'),
(31, 6, 'Casual'),
(32, 6, 'Half Sleeve'),
(33, 6, '100% Cotton'),
(34, 6, 'Printed design'),
(35, 6, 'Hand/machine wash'),
(36, 6, 'Slim fit'),
(37, 7, 'Casual'),
(38, 7, 'half Sleeve'),
(39, 7, '100% Cotton'),
(40, 7, 'Polo T-shirt'),
(41, 7, 'Hand/machine wash'),
(42, 7, 'Slim fit'),
(43, 8, 'Casual'),
(44, 8, 'Half Sleeve'),
(45, 8, '100% Cotton'),
(46, 8, 'Polo T-shirt'),
(47, 8, 'Hand/machine wash'),
(48, 8, 'Slim fit'),
(49, 9, 'Casual'),
(50, 9, 'Full Pant'),
(51, 9, 'Gabardine'),
(52, 9, 'Slim Fit'),
(53, 9, 'Hand/machine wash'),
(54, 10, 'Casual'),
(55, 10, 'Full Pant'),
(56, 10, 'Gabardine'),
(57, 10, 'Slim Fit'),
(58, 10, 'Hand/machine wash'),
(59, 11, 'Casual'),
(60, 11, 'Full Pant'),
(61, 11, 'Fabric'),
(62, 11, 'Casual Fit'),
(63, 11, 'Hand/machine wash'),
(64, 12, 'Casual'),
(65, 12, 'Full Pant'),
(66, 12, 'Fabric'),
(67, 12, 'Casual Fit'),
(68, 12, 'Hand/machine wash'),
(69, 13, 'CoronaVirus'),
(70, 13, 'FaceMask'),
(71, 13, 'Fabric'),
(72, 13, 'Multi Layered'),
(73, 13, 'Hand/machine wash'),
(74, 14, 'Sun cap'),
(75, 14, 'Cotton Fabric'),
(76, 14, 'Breathable'),
(77, 14, 'Adjustible Size'),
(78, 14, 'Hand/machine wash'),
(79, 15, 'Premium Tshirt'),
(80, 15, '100% Cotton'),
(81, 15, 'Breathable'),
(82, 15, 'Slim fit'),
(83, 15, 'Hand/machine wash'),
(84, 16, 'Premium Shirt'),
(85, 16, 'Cotton'),
(86, 16, 'Hawaiyan'),
(87, 16, 'Slim fit'),
(88, 16, 'Hand/machine wash'),
(89, 17, 'Premium Jeans'),
(90, 17, 'Stretchy materials'),
(91, 17, 'Slim Fit'),
(92, 17, 'Treandy'),
(93, 17, 'Hand/machine wash'),
(94, 18, 'Premium Shirt'),
(95, 18, 'Silk Material'),
(96, 18, 'Hawaiyan'),
(97, 18, 'Regular Fit'),
(98, 18, 'Hand/machine wash');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `MemberID` int(11) NOT NULL,
  `MemName` varchar(255) NOT NULL,
  `MemStudentID` varchar(255) NOT NULL,
  `MemDescription` mediumtext NOT NULL,
  `MemFBlink` varchar(255) NOT NULL,
  `MemWAlink` varchar(255) NOT NULL,
  `MemLIlink` varchar(255) NOT NULL,
  `MemGHlink` varchar(255) NOT NULL,
  `MemIMGURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`MemberID`, `MemName`, `MemStudentID`, `MemDescription`, `MemFBlink`, `MemWAlink`, `MemLIlink`, `MemGHlink`, `MemIMGURL`) VALUES
(1, 'Arman Sakif Chowdhury', '180204054', 'Tenacious, meets an obstacle he keeps at it. \n              Whatever grey matter he lacks in his brain he makes up for it with sheer hard work. \n              Stays calm under pressure, and a box of ideas.', 'https://www.facebook.com/arman.sakif', 'https://wa.me/8801521335337', 'https://www.linkedin.com/in/arman-sakif-09/', 'https://github.com/arman-sakif', 'images/teams/arman.jpg'),
(2, 'Mustavi Ibne Masum', '180204040', 'Known for his energy, he’s always excited about his work. \r\n              Some people are lazy but genius, some are the opposite. But he’s the full package. \r\n              A genius who works hard. Gets a bit crazy under pressure, \r\n              but it only makes his processor run faster.', 'https://www.facebook.com/mustavi.sadim', 'https://wa.me/8801619333661', 'https://www.linkedin.com/in/mustavi-ibne-masum-73abb4177/2', 'https://github.com/Mustavi-99', 'images/teams/mustavi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `Discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WID`, `PID`, `CID`, `Discount`) VALUES
(1, 1, 101, NULL),
(12, 2, 102, 0),
(14, 1, 102, 0),
(15, 12, 102, 0),
(16, 13, 102, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `allproducts`
--
ALTER TABLE `allproducts`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`ColID`);

--
-- Indexes for table `productspecification`
--
ALTER TABLE `productspecification`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `MemGHlink` (`MemLIlink`,`MemGHlink`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allproducts`
--
ALTER TABLE `allproducts`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `ColID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `productspecification`
--
ALTER TABLE `productspecification`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
