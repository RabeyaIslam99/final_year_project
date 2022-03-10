-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 07:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `text` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `name`, `email`, `message`, `text`) VALUES
(1, 'User', 'freya@doctorportal.com', '015', 'asd f'),
(5, 'mnbv', 'ytytry@gmail.com', '5547895214', 'abc'),
(6, 'rabeya456', 'ytytry@gmail.com', '452113', 'I have a problem');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `customer_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `customer_contact` varchar(20) CHARACTER SET utf8 NOT NULL,
  `customer_email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `customer_address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`id`, `order_date`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, '2022-03-02 08:10:58', 'fahadchowdhury6', 'asad', 'da@gnajk', 'dsa'),
(2, '2022-03-02 08:50:45', 'fahadchowdhury6', 'zszd', 'gn@gma.com', ' vbn'),
(3, '2022-03-02 09:35:50', 'fahadchowdhury6', 'sd', 'alihosn@gmail.com', 'asd '),
(4, '2022-03-03 03:43:16', 'rabeya456', '1233445655', 'ytytry@gmail.com', 'vfb'),
(5, '2022-03-03 03:45:32', 'rabeya456', '5547895214', 'ytytry@gmail.com', 'abcccc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(36, 'Rabeya islam', 'islam23', '250cf8b51c773f3f8dc8b4be867a9a02'),
(40, 'Admin', 'admin45', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(712, 'Chowmin', 'Food_category_512.jpg', 'Yes', 'Yes'),
(715, 'Rice', 'Food_category_451.jpg', 'Yes', 'Yes'),
(718, 'Chicken', 'Food_category_588.jpg', 'Yes', 'Yes'),
(719, 'drinks', 'Food_category_691.jpg', 'Yes', 'Yes'),
(720, 'Snacks', 'Food_category_399.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(27, 'Fries', '  made with potato', '250.00', 'Food_name_9124.jpg', 720, 'Yes', 'Yes'),
(28, 'Fried Chicken', '  Made with chicken', '120.00', 'Food_name_7780.jpg', 718, 'Yes', 'Yes'),
(33, 'Soup', '  Made with corn and chicken', '190.00', 'Food_name_2260.jpg', 711, 'Yes', 'Yes'),
(34, 'Wedges', '  Made with potato', '120.00', 'Food_name_6615.jpg', 720, 'Yes', 'Yes'),
(35, 'Baked pasta', '  Baked pasta', '280.00', 'Food_name_7687.jpg', 720, 'Yes', 'Yes'),
(36, 'MOMO', '  Made with chicken', '100.00', 'Food_name_1982.jpg', 720, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `payment`) VALUES
(1, 'Soup', '200.00', 1, '200.00', '2021-12-27 04:42:53', 'Delivered', 'Tonny', '01254486214', 'hfd44@gmail.com', '45-ghhjb', ''),
(2, 'Soup', '200.00', 1, '200.00', '2021-12-27 06:02:07', 'Delivered', 'nila', '45676', 'dfe@gmail.com', '12vxdg', ''),
(3, 'Soup', '200.00', 2, '400.00', '2021-12-28 07:02:50', 'ordered', 'Rina ', '01554862', 'nhu@gmail.com', '12hiu', ''),
(4, 'Corn Soup', '96.00', 1, '96.00', '2022-01-07 01:46:25', 'ordered', 'Tonny', '01254486214', 'dfe@gmail.com', '47biuhj', ''),
(5, 'Corn Soup', '96.00', 3, '288.00', '2022-03-02 04:56:38', 'Ordered', 'tonny123', '01254486214', 'dfe@gmail.com', 'vgkuyfgyhgvf', ''),
(6, 'Corn Soup', '96.00', 1, '96.00', '2022-03-02 04:57:36', 'Ordered', 'tonny123', '45676', 'islamtonny56@gmail.com', 'as  sd', ''),
(7, 'Corn Soup', '96.00', 1, '96.00', '2022-03-02 04:59:14', 'Ordered', 'tonny123', '45676', 'islamtonny56@gmail.com', 'as  sd', ''),
(8, 'Corn Soup', '96.00', 1, '96.00', '2022-03-02 04:59:15', 'Ordered', 'tonny123', '45676', 'islamtonny56@gmail.com', 'as  sd', ''),
(9, 'Corn Soup', '96.00', 1, '96.00', '2022-03-02 04:59:17', 'Ordered', 'tonny123', '45676', 'islamtonny56@gmail.com', 'as  sd', ''),
(10, 'Soup', '200.00', 1, '200.00', '2022-03-02 05:04:54', 'Ordered', 'tonny123', '45676', 'nhu@gmail.com', 'hj', ''),
(11, 'Soup', '200.00', 1, '200.00', '2022-03-02 05:05:38', 'Ordered', 'tonny123', '45676', 'nhu@gmail.com', 'hj', ''),
(12, 'Soup', '200.00', 1, '200.00', '2022-03-02 05:10:47', 'Ordered', 'tonny123', '45676', 'nhu@gmail.com', 'df', ''),
(13, 'Soup', '200.00', 1, '200.00', '2022-03-02 05:12:05', 'ordered', 'tonny123', '45676', 'nhu@gmail.com', 'df', ''),
(14, 'Soup', '200.00', 1, '200.00', '2022-03-02 05:14:23', 'Ordered', 'tonny123', '45676', 'nhu@gmail.com', 'df', ''),
(15, 'Soup', '200.00', 1, '200.00', '2022-03-02 05:14:54', 'Ordered', 'tonny123', '01554862', 'hfd44@gmail.com', 'ami ou order disi', ''),
(16, 'Corn Soup', '96.00', 1, '96.00', '2022-03-02 06:33:08', 'Ordered', 'rabeya45', '5547895214', 'ytytry@gmail.com', 'dfgarg', ''),
(17, 'Vegetable Chowmin', '150.00', 3, '450.00', '2022-03-04 03:50:49', 'Ordered', 'rabeya456', '5547895214', 'ytytry@gmail.com', 'nm', ''),
(18, 'Wedges', '100.00', 5, '500.00', '2022-03-04 03:51:18', 'Ordered', 'rabeya456', '1233445655', 'ytytry@gmail.com', 'jk', ''),
(19, 'Wedges', '100.00', 5, '500.00', '2022-03-04 03:51:33', 'Ordered', 'rabeya456', '1233445655', 'ytytry@gmail.com', 'lk', ''),
(20, 'Pasta', '200.00', 2, '400.00', '2022-03-06 07:06:38', 'Ordered', 'rabeya456', '5547895214', 'ytytry@gmail.com', 'bnm', ''),
(21, 'Pasta', '200.00', 3, '600.00', '2022-03-07 06:25:32', 'Ordered', 'rabeya456', '12335478', 'bhj@gmail.com', 'bnm', ''),
(22, 'Pasta', '200.00', 5, '1000.00', '2022-03-07 06:26:10', 'Ordered', 'rabeya456', '456987', 'tyutuy@gmail.com', 'adfdfd', ''),
(23, 'Wings', '140.00', 2, '280.00', '2022-03-07 06:31:35', 'Ordered', 'rabeya456', '452113', 'sdfsd@gmail.com', 'vjhg', ''),
(24, 'Wings', '140.00', 3, '420.00', '2022-03-07 06:32:14', 'Ordered', 'rabeya456', '1233445655', 'sdfsd@gmail.com', 'bjhj', ''),
(25, 'Wings', '140.00', 3, '420.00', '2022-03-07 06:32:39', 'Ordered', 'rabeya456', '789456', 'sdfsd@gmail.com', 'bhjgj', ''),
(26, 'Wings', '140.00', 4, '560.00', '2022-03-07 06:33:32', 'Ordered', 'rabeya456', '12335478', 'sdfsd@gmail.com', 'bjhbgjh', ''),
(27, 'Fried Chicken', '120.00', 3, '360.00', '2022-03-07 08:31:12', 'Ordered', 'rabeya456', '456987', 'ytytry@gmail.com', 'abc', ''),
(28, 'Wedges', '120.00', 1, '120.00', '2022-03-08 06:29:19', 'Ordered', 'rabeya456', '01745402702', 'islamtonny56@gmail.com', 'Tv gate', ''),
(29, 'Wedges', '120.00', 1, '120.00', '2022-03-08 06:53:30', 'Ordered', 'rabeya456', '01745402702', 'islamtonny56@gmail.com', 'Tv gate', ''),
(30, 'Wedges', '120.00', 1, '120.00', '2022-03-08 06:53:51', 'Ordered', 'rabeya456', '01745402702', 'islamtonny56@gmail.com', 'Tb gate', ''),
(31, 'Pasta', '250.00', 1, '250.00', '2022-03-08 08:14:01', 'Ordered', 'rabeya456', '01628334593', 'islamtonny56@gmail.com', 'Sahi eidgha', 'bkash'),
(32, 'Corn Soup', '140.00', 1, '140.00', '2022-03-08 08:18:07', 'Delivered', 'rabeya456', '01254486214', 'islamtonny56@gmail.com', 'Hawapara', 'Cash on Delivery'),
(33, 'Fried Chicken', '120.00', 1, '120.00', '2022-03-08 09:47:14', 'Ordered', 'rabeya456', '01628334593', 'islamtonny56@gmail.com', 'Valley City', 'Cash on Delivery'),
(34, 'Fried Chicken', '120.00', 1, '120.00', '2022-03-09 02:10:32', 'ordered', 'rabeya456', '01745402702', 'islamtonny56@gmail.com', 'Abcccc', 'bkash'),
(35, ' Fried Chicken ,Soup ,Baked pasta ,', '590.00', 0, '0.00', '2022-03-09 06:59:40', 'Ordered', 'rabeya456', '01745402702', 'islamtonny56@gmail.com', 'ABCDEF', 'bkash'),
(36, ' Fried Chicken ,Baked pasta ,', '400.00', 0, '0.00', '2022-03-09 07:53:21', 'Ordered', 'rabeya456', '01745402702', 'islamtonny56@gmail.com', 'Valley city', 'bkash'),
(37, ' Fries ,Soup ,', '440.00', 0, '0.00', '2022-03-09 07:54:58', 'Ordered', 'rabeya456', '01254486214', 'islamtonny56@gmail.com', 'abc', 'bkash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'rina67', '$2y$10$05h/i0go5M671J2UNA1Ssu7cPLK/SLjgrvFqwx3AzLE1vyC79NrnS', '2022-01-18 20:20:05'),
(2, 'raima23', '$2y$10$qZAijj5vV7MZhpSxGJpD5Oqz6RXtmhbNGWp.SmDQE4SRN1FLbnG9a', '2022-01-18 22:00:21'),
(3, 'tonny123', '$2y$10$z6m8gxoYo/2ars/WxDNoOeV31oNQ3i9/EajdhtuFCMcest4PUir0y', '2022-03-02 21:26:34'),
(4, 'rabeya45', '$2y$10$zH.BlbuORiumD8pU0rmqjecYdLt3WUgXERvNkJ6O8JLLl0eAP9dPe', '2022-03-02 23:30:33'),
(5, 'rabeya456', '$2y$10$QUEipCmvtBzYcRaq23v7keaCsfEc8bupQUyJyzVPUWLLe84PMBjbK', '2022-03-03 20:42:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=724;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
