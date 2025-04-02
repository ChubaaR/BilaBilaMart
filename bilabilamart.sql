-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 12:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilabilamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `AdminID` int(10) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminEmail` varchar(100) NOT NULL,
  `AdminPassword` varchar(100) NOT NULL,
  `create_dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdminID`, `AdminName`, `AdminEmail`, `AdminPassword`, `create_dateTime`) VALUES
(1, 'Admin A', 'adminA@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-02 05:11:19'),
(2, 'Admin B', 'adminB@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-02 05:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductPrice` double(10,2) NOT NULL,
  `ProductQty` int(200) NOT NULL,
  `ProductImage` varchar(200) NOT NULL,
  `TotalPrice` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Instant Food'),
(2, 'Frozen Food'),
(3, 'Snack'),
(4, 'Beverage'),
(5, 'Health Care'),
(6, 'Personal Care'),
(7, 'Pet Product');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(10) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `CustomerEmail` varchar(100) NOT NULL,
  `CustomerPassword` varchar(100) NOT NULL,
  `register_date` date NOT NULL DEFAULT current_timestamp(),
  `register_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerEmail`, `CustomerPassword`, `register_date`, `register_time`) VALUES
(1, 'userA', 'userA@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-27', '14:29:29'),
(2, 'userB', 'userB@gmail.com', '8b4cf0258846b23e0a8272bee22c38dd', '2024-04-27', '14:29:29'),
(3, 'userc', 'userC@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-27', '14:29:29'),
(4, 'userO', 'userO@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-27', '14:29:29'),
(5, 'userI', 'userI@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-27', '14:29:29'),
(6, 'user T', 'userT@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-27', '14:30:07'),
(7, 'userM', 'userM@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-01', '07:32:12'),
(8, 'userR', 'userR@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-01', '07:33:12'),
(9, 'userH', 'userH@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-02', '09:32:34'),
(10, 'userZ', 'userZ@gmail.com', '733d7be2196ff70efaf6913fc8bdcabf', '2024-05-03', '12:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `CustName` varchar(50) NOT NULL,
  `OrderProducts` mediumtext NOT NULL,
  `OrderDate` date NOT NULL DEFAULT current_timestamp(),
  `OrderTime` time NOT NULL DEFAULT current_timestamp(),
  `OrderQty` int(11) NOT NULL,
  `OrderAmount` double(10,2) NOT NULL,
  `OrderAddress` varchar(200) NOT NULL,
  `PickupStore` varchar(200) NOT NULL,
  `CustEmail` varchar(100) NOT NULL,
  `OrderPhoneNum` varchar(50) NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `PaymentStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustName`, `OrderProducts`, `OrderDate`, `OrderTime`, `OrderQty`, `OrderAmount`, `OrderAddress`, `PickupStore`, `CustEmail`, `OrderPhoneNum`, `OrderStatus`, `PaymentStatus`) VALUES
(1, 'User A', 'Maggi Hot Cup Asam Laksa Instant Noodle 59g(2), Dutch Lady Pure Farm Coffee UHT Milk 200ml  (5), Doritos Nacho Cheese Snack 190g (1)', '2024-05-03', '15:39:27', 8, 29.80, '', 'Segi Kota Damansara', '', '01236542989', 'Pending', 'Unpaid'),
(2, 'User B', 'Maggi Pedas Giler Seafood Berapi Mi Goreng 98g(5), Milo Actigen-E UHT Chocolate Drink 200ml (3), SIMPLE Kind to Skin Cleansing Facial Wipes 25s (1), Kinder Bueno T2 Chocolate 39g(2), Whiskas Kitten Ocean Fish Dry Cat Food 1.1KG (1), OPTREX Rehydrating Eye', '2024-05-03', '15:41:30', 13, 89.79, '10, Jalan Batu', 'TAR UMT', 'userB@gmail.com', '01425632547', 'Pending', 'Unpaid'),
(3, 'User C', 'Samyang Hot Chicken Rose Flavor Ramen Bowl 105g(2), Dutch Lady Pure Farm Strawberry UHT Milk 200ml  (3), Doritos Nacho Cheese Snack 190g (2)', '2024-05-03', '15:42:26', 7, 51.91, '31, Jalan K', 'Kiara Walk', 'userC@gmail.com', '13652894656', 'Pending', 'Unpaid'),
(4, 'user D', 'Maggi Pedas Giler Ayam Bakar Mi Goreng 98g(1), Maggi Pedas Giler Seafood Berapi Mi Goreng 98g(1), Samyang Buldak Hot Chicken Flavour Spicy Ramen Cup 70g (1), Super Ring Family Pack 14g x 10 (1)', '2024-05-03', '17:01:16', 4, 20.70, '', 'Segi Kota Damansara', '', '1632369677', 'Pending', 'Unpaid'),
(5, 'User E', 'Maggi Pedas Giler Seafood Berapi Mi Goreng 98g(1), Maggi Pedas Giler Ayam Bakar Mi Goreng 98g(1), Simplot Wedges Original 750g(1), Simplot Shoestring French Fries 1kg(1), Dutch Lady Pure Farm Coffee UHT Milk 200ml  (1), Maggi Hot Cup Tom Yam Instant Noodle 61g(1), Samyang Buldak Hot Chicken Flavour Spicy Ramen Cup 70g (1), Maggi Hot Cup Asam Laksa Instant Noodle 59g(1), Samyang Hot Chicken Rose Flavor Ramen Bowl 105g(1), CP Nasi Lemak With Chicken Rendang 245g (1), Samyang Hot Chicken Cheese Flavor Ramen Bowl 105g(1), Maggi Hot Cup Chicken Instant Noodle 56g(1), Samyang Hot Chicken Flavour Ramen Bowl 105g(1), Maggi Hot Cup Curry Instant Noodle 59g(1), Maggi Pedas Giler Tom Yummz Mi Goreng 97g (1), Simplot French Fries Crinkle Cut 1kg (1), Ramly Chicken Nuggets 1kg (1), Ramly Beef Frankfurter 340g(1), Ramly Chicken Frankfurter 340g(1), Ramly Fish Nuggets 1kg(1), Chipsmore! Hazelnut Chocolate Chip Cookies 153g (1), Super Ring Family Pack 14g x 10 (1), Doritos Nacho Cheese Snack 190g (1), Chipsmore! Original Chocolate Chip Cookies 153g (1), Oreo Sandwich Cookies 119.6g (1), Kinder Bueno T2 Chocolate 39g(1), Cadbury Chunky Dairy Milk 37g(1), Chipsmore! Double Choc Chocolate Chip Cookies 153g (1), Milo Actigen-E UHT Chocolate Drink 200ml (1), Dutch Lady Pure Farm Strawberry UHT Milk 200ml  (1), Tropicana Twister Apple Fruit Drink 355ml (1), Nescafe Original Milk Coffee Drink 240ml (1), Dutch Lady Pure Farm Chocolate UHT Milk 200ml  (1), OPTREX Rehydrating Eye Drops 10ml (1), Vicks Inhaler 0.5ml (1), Panadol 30pcs/pack (1), SIMPLE Kind to Skin Cleansing Facial Wipes 25s (1), CAREFREE FlexiComfort Aloe Vera Liners 40s (1), PEDIGREE Dog Dry Food Puppy Chicken,Egg & Milk 1.3kg (1), Whiskas Kitten Ocean Fish Dry Cat Food 1.1KG (1)', '2024-05-03', '17:58:16', 40, 320.24, '', 'Kiara Walk', '', '01236529456', 'Pending', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductPrice` double(10,2) NOT NULL,
  `ProductQty` int(200) NOT NULL,
  `ProductImage` varchar(200) NOT NULL,
  `ProductCategoryID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductPrice`, `ProductQty`, `ProductImage`, `ProductCategoryID`) VALUES
(1, 'Maggi Pedas Giler Tom Yummz Mi Goreng 97g ', 4.30, 30, '6631f1b8c2af8.jpg', 1),
(2, 'Maggi Pedas Giler Ayam Bakar Mi Goreng 98g', 4.30, 35, '6631f1cf1240b.jpg', 1),
(3, 'Maggi Pedas Giler Seafood Berapi Mi Goreng 98g', 4.30, 30, '6631f1f2ac7b6.jpg', 1),
(4, 'Maggi Hot Cup Curry Instant Noodle 59g', 2.50, 50, '6631f20a3dbb1.jpg', 1),
(5, 'Maggi Hot Cup Chicken Instant Noodle 56g', 2.50, 25, '6631f228b0bc0.jpg', 1),
(6, 'Maggi Hot Cup Asam Laksa Instant Noodle 59g', 2.50, 45, '6631f23f0caaa.jpg', 1),
(7, 'Maggi Hot Cup Tom Yam Instant Noodle 61g', 2.50, 53, '6631f26b38722.jpg', 1),
(8, 'Samyang Buldak Hot Chicken Flavour Spicy Ramen Cup 70g ', 5.90, 37, '6631f2eb192e6.jpg', 1),
(9, 'Samyang Hot Chicken Flavour Ramen Bowl 105g', 8.20, 35, '6631f307af561.jpg', 1),
(10, 'Samyang Hot Chicken Cheese Flavor Ramen Bowl 105g', 8.20, 33, '6631f31de8140.jpg', 1),
(11, 'Samyang Hot Chicken Rose Flavor Ramen Bowl 105g', 8.20, 28, '6631f33aebc62.jpg', 1),
(12, 'CP Nasi Lemak With Chicken Rendang 245g ', 7.50, 36, '6631f3505a876.jpg', 1),
(13, 'Simplot French Fries Crinkle Cut 1kg ', 13.99, 26, '66340856051dd.jpg', 2),
(14, 'Simplot Shoestring French Fries 1kg', 13.99, 50, '66340864b4136.jpg', 2),
(15, 'Simplot Wedges Original 750g', 16.99, 21, '6634087608a24.jpg', 2),
(16, 'Ramly Chicken Nuggets 1kg ', 17.20, 35, '6631f3fd80cea.jpg', 2),
(17, 'Ramly Fish Nuggets 1kg', 21.80, 30, '6631f41ba4881.jpg', 2),
(18, 'Ramly Chicken Frankfurter 340g', 7.50, 22, '6631f449842ed.jpg', 2),
(19, 'Ramly Beef Frankfurter 340g', 7.50, 29, '6631f45ea5074.jpg', 2),
(20, 'Doritos Nacho Cheese Snack 190g ', 14.50, 31, '6631f47c90d64.jpg', 3),
(21, 'Super Ring Family Pack 14g x 10 ', 6.00, 40, '6631f49ebce48.jpg', 3),
(22, 'Chipsmore! Hazelnut Chocolate Chip Cookies 153g ', 4.60, 60, '6631f4b2b8de4.jpg', 3),
(23, 'Chipsmore! Original Chocolate Chip Cookies 153g ', 4.60, 53, '6631f4c66118c.jpg', 3),
(24, 'Chipsmore! Double Choc Chocolate Chip Cookies 153g ', 4.60, 45, '6631f4e1147ce.jpg', 3),
(25, 'Cadbury Chunky Dairy Milk 37g', 3.10, 38, '6631f504b821e.jpg', 3),
(26, 'Kinder Bueno T2 Chocolate 39g', 5.00, 28, '6631f52b76f32.jpg', 3),
(27, 'Oreo Sandwich Cookies 119.6g ', 3.70, 41, '6631f542cfa7a.jpg', 3),
(28, 'Nescafe Original Milk Coffee Drink 240ml ', 2.90, 30, '6631f5754c389.jpg', 4),
(29, 'Milo Actigen-E UHT Chocolate Drink 200ml ', 2.50, 62, '6631f5884d27a.jpg', 4),
(30, 'Dutch Lady Pure Farm Coffee UHT Milk 200ml  ', 2.00, 33, '6631f59fdb9fa.jpg', 4),
(31, 'Dutch Lady Pure Farm Strawberry UHT Milk 200ml  ', 2.00, 25, '6631f5afc4f7d.jpg', 4),
(32, 'Dutch Lady Pure Farm Chocolate UHT Milk 200ml  ', 2.00, 30, '6631f5c434325.jpg', 4),
(33, 'Tropicana Twister Apple Fruit Drink 355ml ', 2.00, 42, '6631f5dae7a66.jpg', 4),
(34, 'Panadol 30pcs/pack ', 12.80, 37, '6631f5fba59da.jpg', 5),
(35, 'Vicks Inhaler 0.5ml ', 7.90, 32, '6631f611a9641.jpg', 5),
(36, 'OPTREX Rehydrating Eye Drops 10ml ', 13.00, 36, '6631f62595e39.jpg', 5),
(37, 'CAREFREE FlexiComfort Aloe Vera Liners 40s ', 9.60, 50, '6631f64730caf.jpg', 6),
(38, 'SIMPLE Kind to Skin Cleansing Facial Wipes 25s ', 19.70, 65, '6631f661e9bf1.jpg', 6),
(39, 'Whiskas Kitten Ocean Fish Dry Cat Food 1.1KG ', 17.20, 26, '6631f67782a77.jpg', 7),
(40, 'PEDIGREE Dog Dry Food Puppy Chicken,Egg & Milk 1.3kg ', 17.50, 20, '6631f68d497ba.jpg', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AdminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
