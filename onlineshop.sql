-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 07:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusaccount`
--

CREATE TABLE `cusaccount` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `del_flag` int(11) NOT NULL DEFAULT 0,
  `create_date` varchar(10) NOT NULL,
  `update_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cusaccount`
--

INSERT INTO `cusaccount` (`id`, `customer_id`, `email`, `password`, `del_flag`, `create_date`, `update_date`) VALUES
(1, 1, 'aungmk299@gmail.com', 'aung123', 0, '2021/11/24', NULL),
(2, 2, 'minkhant@gmail.com', 'minkhant123', 0, '2021/11/24', NULL),
(3, 5, 'cherry@gmail.com', '12345', 0, '2021/11/26', NULL),
(4, 7, 'phupwint@gmail.com', '1234', 0, '2021/11/26', NULL),
(5, 10, 'hate@gmail.com', '12345', 0, '2021/11/28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_lists`
--

CREATE TABLE `customer_lists` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `membership` varchar(2) NOT NULL,
  `total_orders` int(11) NOT NULL,
  `d_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_lists`
--

INSERT INTO `customer_lists` (`customer_id`, `name`, `email`, `phone`, `address`, `membership`, `total_orders`, `d_flag`) VALUES
(1, 'Aung Min Khant', 'aungmk299@gmail.com', '450-599-707', 'No.79,Min St, Sanchaung', '1', 0, 0),
(2, 'Min Khant', 'minkhant@gmail.com', '789-544-321', 'yankin,yangon', '1', 0, 0),
(3, 'Zaw Phyo Aung', 'justro@gmail.com', '789-311-432', 'myoukdagon,yangon', '0', 3, 0),
(4, 'Lin Ko Ko', 'exbrain@gmail.com', '789-443-055', 'Myay Ni Gone,Sanchaung', '0', 3, 0),
(5, 'Cherry Pho Khaing', 'cherry@gmail.com', '450-554-221', 'hlaetan,yangon', '1', 0, 0),
(6, 'Zar Ni Win Lwin', 'zarni@gmail.com', '313-244-646', 'MyoukDagon,Yangon', '0', 2, 0),
(7, 'Phu Pwint', 'phupwint@gmail.com', '987-458-121', '19st,Lan Ma Taw,Sanchaung', '1', 0, 0),
(8, 'Zay Yar', 'zayar@gmail.com', '458-221-114', 'Lan Ma taw,Yangon', '0', 9, 0),
(9, 'John', 'john@gmail.com', '458-221-111', 'Yangon', '0', 3, 0),
(10, 'Hater', 'hate@gmail.com', '444-111-333', 'mandalay', '1', 0, 0),
(11, 'Json', 'jason@gmail.com', '423-332-111', 'yangon', '0', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_adminlogin`
--

CREATE TABLE `m_adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `del_flag` int(11) NOT NULL DEFAULT 0,
  `create_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_adminlogin`
--

INSERT INTO `m_adminlogin` (`id`, `name`, `password`, `del_flag`, `create_date`) VALUES
(1, 'admin', 'admin123', 0, '18/11/2021');

-- --------------------------------------------------------

--
-- Table structure for table `m_product`
--

CREATE TABLE `m_product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(126) NOT NULL,
  `category` varchar(20) NOT NULL,
  `p_id` varchar(20) NOT NULL,
  `salePrice` int(11) NOT NULL,
  `initPrice` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `create_date` varchar(10) NOT NULL,
  `update_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_product`
--

INSERT INTO `m_product` (`product_id`, `name`, `category`, `p_id`, `salePrice`, `initPrice`, `rating`, `quantity`, `image`, `description`, `del_flg`, `create_date`, `update_date`) VALUES
(1, 'StrawBerry', 'fruits', 'F001', 2000, 1800, 4, 17, 'strawberry1.png', ' A strawberry is both a low-growing, flowering plant and also the name of the fruit that it produces.', 0, '2021/11/18', ''),
(2, 'Green Apple', 'fruits', 'F002', 1500, 1400, 4, 16, 'greenApple1.png', 'Green apples contain a compound called pectin, a fiber source that works as a prebiotic to promote the growth of healthy bacteria in your gut.', 0, '2021/11/18', ''),
(3, 'Cabbage', 'fruits', 'F003', 700, 650, 4, 17, 'cabbage.png', 'The cabbage plant, Brassica oleracea, is an herbaceous annual or biennial vegetable in the family Brassicaceae grown for its edible head. The head of the cabbage is round and forms on a short thick stem.', 0, '2021/11/18', ''),
(4, 'Carrots', 'vegetables', 'V001', 500, 500, 4, 17, 'carrot.png', 'carrot, (Daucus carota), herbaceous, generally biennial plant of the Apiaceae family that produces an edible taproot.', 0, '2021/11/18', ''),
(5, 'Chicken', 'meat', 'M001', 8000, 7000, 5, 14, 'chicken1.png', 'Chicken meat is known by its nutritional quality, as it contains significant amount of high-quality and easily digestible protein and a low portion of saturated fat.', 0, '2021/11/18', ''),
(6, 'FruitDragon', 'fruits', 'F004', 1500, 1400, 4, 20, 'fruitdragon.png', 'Dragon fruit may look exotic, but its flavors are similar to other fruits. Its taste has been described as a slightly sweet cross between a kiwi and a pear.', 0, '2021/11/18', ''),
(7, 'Grapes', 'fruits', 'F005', 5000, 4500, 4, 20, 'grape.png', 'Grapes are fleshy, rounded fruits that grow in clusters made up of many fruits of greenish, yellowish or purple skin.', 0, '2021/11/18', ''),
(8, 'Watermelon', 'fruits', 'F006', 2500, 2500, 4, 20, 'watermelon.png', 'The watermelon is a large fruit of a more or less spherical shape. It has an oval or spherical shape and a dark green and smooth rind, sometimes showing irregular areas of a pale green colour. It has a sweet, juicy, refreshing flesh of yellowish or reddis', 0, '2021/11/18', ''),
(9, 'Pork', 'meat', 'M002', 15000, 13000, 5, 17, 'Pork.png', 'The most desirable pork is grayish pink in colour, firm and fine-grained, well-marbled, and covered with an outer layer of firm white fat.', 0, '2021/11/18', ''),
(10, 'Avocado', 'fruits', 'F007', 1000, 1000, 4, 19, 'avocado.png', 'Avocado trees produce clusters of small, green-yellow flowers at the end of twigs and a large, fleshy, pear-shaped fruit with a single large seed.', 0, '2021/11/18', ''),
(11, 'Beef', 'meat', 'M003', 20000, 19000, 5, 16, 'beef.png', 'Beef, flesh of mature cattle, as distinguished from veal, the flesh of calves. The best beef is obtained from early maturing, special beef breeds. High-quality beef has firm, velvety, fine-grained lean, bright red in colour and well-marbled.', 0, '2021/11/18', ''),
(12, 'Cherry', 'fruits', 'F008', 8000, 7500, 4, 19, 'cherry.png', 'Cherry, any of various trees belonging to the genus Prunus and their edible fruits. The fruit is a fleshy drupe (stone fruit) that is generally heart-shaped to nearly globular,', 0, '2021/11/18', ''),
(13, 'Onion', 'vegetables', 'V002', 600, 550, 4, 19, 'onion.png', 'An onion is a round vegetable with a brown skin that grows underground. It has many white layers on its inside which have a strong, sharp smell and taste.', 0, '2021/11/18', ''),
(14, 'Celery', 'vegetables', 'V003', 500, 450, 4, 30, 'celery1.png', 'Celery is a vegetable with long petioles, meaty and succulent that are known by the name of stalks.', 0, '2021/11/18', ''),
(15, 'Peach', 'fruits', 'F009', 6000, 5500, 4, 19, 'peach1.png', 'A peach is a very sweet, juicy fruit with an edible peel and a hard pit in the middle. Peaches vary in color from almost white to yellow and pinkish-red.', 0, '2021/11/18', ''),
(16, 'Mangoo', 'fruits', 'F010', 1500, 1500, 4, 15, 'mango.png', 'A mango is a sweet tropical fruit, and it\'s also the name of the trees on which the fruit grows. Ripe mangoes are juicy, fleshy, and delicious.', 0, '2021/11/18', ''),
(17, 'Fish', 'meat', 'M004', 5000, 5000, 5, 19, 'fish.png', 'Fish is among the healthiest foods on the planet.\r\nIt’s loaded with important nutrients, such as protein and vitamin D.', 0, '2021/11/18', ''),
(18, 'Mutton Meat', 'meat', 'M005', 16000, 15000, 5, 17, 'muttonMeat.png', 'Mutton refers to the flesh of the mature ram or ewe at least one year old; the meat of sheep between 12 and 20 months old may be called yearling mutton.', 0, '2021/11/18', ''),
(19, 'Apple', 'fruits', 'F010', 3000, 2500, 4, 5, 'apple.png', ' fresh apple', 0, '2021/11/28', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_rating`
--

CREATE TABLE `m_rating` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_date` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_rating`
--

INSERT INTO `m_rating` (`id`, `name`, `feedback`, `rating`, `rating_date`, `customer_id`) VALUES
(1, 'Aung Min Khant', 'good development', 4, '2021/11/24', 1),
(2, 'Min khant', 'good quality product', 4, '2021/11/24', 2),
(3, 'justro', 'satisfied', 5, '2021/11/25', 3),
(4, 'Cherry', 'nice service!!!', 5, '2021/11/26', 5),
(5, 'Phu Pwint', 'fast delivery!', 5, '2021/11/26', 7),
(6, 'Zay Yar', 'Good!!', 5, '2021/11/28', 8),
(7, 'John', 'good quality', 4, '2021/11/28', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `del_flag` int(11) NOT NULL DEFAULT 0,
  `buy_date` varchar(10) NOT NULL,
  `updatae_date` varchar(10) NOT NULL,
  `create_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total_price`, `del_flag`, `buy_date`, `updatae_date`, `create_date`) VALUES
(1, 1, 7000, 0, '2021/11/24', '', '2021/11/24'),
(2, 2, 18000, 0, '2021/11/24', '', '2021/11/24'),
(3, 3, 18600, 0, '2021/11/25', '', '2021/11/25'),
(4, 4, 13000, 0, '2021/11/25', '', '2021/11/25'),
(5, 5, 11000, 0, '2021/11/26', '', '2021/11/26'),
(6, 6, 22700, 0, '2021/11/26', '', '2021/11/26'),
(7, 7, 39000, 0, '2021/11/26', '', '2021/11/26'),
(8, 8, 130000, 0, '2021/11/28', '', '2021/11/28'),
(9, 9, 20000, 0, '2021/11/28', '', '2021/11/28'),
(10, 10, 4200, 0, '2021/11/28', '', '2021/11/28'),
(11, 11, 3200, 0, '2021/12/08', '', '2021/12/08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `create_date` varchar(10) NOT NULL,
  `total_price` int(11) NOT NULL,
  `del_flag` int(11) NOT NULL DEFAULT 0,
  `update_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `create_date`, `total_price`, `del_flag`, `update_date`) VALUES
(1, 1, 'F001', 2, '2021/11/24', 2000, 0, ''),
(2, 1, 'F007', 1, '2021/11/24', 1000, 0, ''),
(3, 2, 'V001', 2, '2021/11/24', 500, 0, ''),
(4, 2, 'M002', 1, '2021/11/24', 15000, 0, ''),
(5, 3, 'M001', 2, '2021/11/25', 8000, 0, ''),
(6, 3, 'V002', 1, '2021/11/25', 600, 0, ''),
(7, 4, 'F002', 2, '2021/11/25', 1500, 0, ''),
(8, 4, 'F008', 1, '2021/11/25', 8000, 0, ''),
(9, 5, 'F010', 2, '2021/11/26', 1500, 0, ''),
(10, 5, 'F009', 1, '2021/11/26', 6000, 0, ''),
(11, 6, 'M003', 1, '2021/11/26', 20000, 0, ''),
(12, 6, 'F003', 1, '2021/11/26', 700, 0, ''),
(13, 7, 'F010', 3, '2021/11/26', 1500, 0, ''),
(14, 7, 'M005', 1, '2021/11/26', 16000, 0, ''),
(15, 7, 'F002', 1, '2021/11/26', 1500, 0, ''),
(16, 7, 'M002', 1, '2021/11/26', 15000, 0, ''),
(17, 8, 'M004', 1, '2021/11/28', 5000, 0, ''),
(18, 8, 'M005', 2, '2021/11/28', 16000, 0, ''),
(19, 8, 'M002', 1, '2021/11/28', 15000, 0, ''),
(20, 8, 'M001', 2, '2021/11/28', 8000, 0, ''),
(21, 8, 'M003', 3, '2021/11/28', 20000, 0, ''),
(22, 9, 'F001', 1, '2021/11/28', 2000, 0, ''),
(23, 9, 'M001', 2, '2021/11/28', 8000, 0, ''),
(24, 10, 'F002', 1, '2021/11/28', 1500, 0, ''),
(25, 10, 'F003', 1, '2021/11/28', 700, 0, ''),
(26, 11, 'F003', 1, '2021/12/08', 700, 0, ''),
(27, 11, 'V001', 1, '2021/12/08', 500, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(15) NOT NULL,
  `checks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `checks`) VALUES
(1, 'maintenance', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusaccount`
--
ALTER TABLE `cusaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_lists`
--
ALTER TABLE `customer_lists`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `m_adminlogin`
--
ALTER TABLE `m_adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `m_rating`
--
ALTER TABLE `m_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cusaccount`
--
ALTER TABLE `cusaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_lists`
--
ALTER TABLE `customer_lists`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_adminlogin`
--
ALTER TABLE `m_adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_product`
--
ALTER TABLE `m_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `m_rating`
--
ALTER TABLE `m_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
