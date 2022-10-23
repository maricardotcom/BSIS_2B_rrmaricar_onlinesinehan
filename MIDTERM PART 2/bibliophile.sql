-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 09:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliophile`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` varchar(500) NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `fullname`, `email`, `password`, `role_id`, `date_joined`) VALUES
(4, '28c5fa9f-4f6a-11ed-80ca-088fc30176f9', 'Bibliophile Management', 'bibliophile@gmail.com', '8de2812d9dea605180e2d1df77e9cb20', '0ef146b3-4f4f-11ed-96e0-088fc30176f9', '2022-10-19'),
(5, '502df996-4f7c-11ed-bcaa-088fc30176f9', 'Juan Dela Cruz', 'juancruz@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '240c4236-4f4f-11ed-96e0-088fc30176f9', '2022-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_id` varchar(500) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(150) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_id`, `title`, `author`, `description`, `price`, `category`, `date_added`) VALUES
(1, 'b55ca5d3-4f81-11ed-bcaa-088fc30176f9', 'Loving the CEO', 'AuthorNene', 'Emily, a cashier at a small bookstore in New York meets Adam, CEO of Jacob Enterprises. He is seen as ruthless, arrogant and words that are not fit for the human ear to his employees because of the way he acts towards them. Emily is skeptical about being with Adam while Adam doesn\'t want to let go of his lifestyle that he enjoys. They both decide to let go of their fears and enter into a relationship that started off rocky but ended up being blissful and loving. They continue to grow with each other, but what they don\'t know is that external forces are planning to break them up and tragedy happens in the end that leaves Emily shaken to the core.', '655', 'Romance', '2022-10-19'),
(2, '9d5b0fad-4fa6-11ed-aac9-088fc30176f9', 'Appartment 239', 'Elford Alley', 'Abe Barrett is surrounded by ghosts - some of them are even his roommates! But now Abe\'s visions show something dark coming, and it wants Abe dead. When Abe Barrett\'s family died, he started seeing ghosts. Soon he was living with three of them, and it turns out ghosts are just as eccentric as people. Abe is bothered by the ghosts constantly since he doesn\'t want to solve their murders, avenge them or do much of anything. He just wants to do his job and relax. His dreams, however, have been getting darker as people in town start to disappear. Soon Abe realizes there is something hunting him, and that same threat was involved with his family\'s deaths. A legacy of darkness is chasing Abe Barrett, and his supernatural roommates may not be enough to save him.', '450', 'Horror', '2022-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `order_no` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `shipping_details_id` varchar(500) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `date_orderred` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_no`, `user_id`, `shipping_details_id`, `amount`, `status`, `payment_method`, `date_orderred`) VALUES
(5, 'f1a8a380-510f-11ed-84f8-088fc30176f9', 689228041, '502df996-4f7c-11ed-bcaa-088fc30176f9', '820dc239-4fad-11ed-aac9-088fc30176f9', '655', 'Processing', 'COD', '2022-10-21'),
(6, '10548f12-5112-11ed-84f8-088fc30176f9', 1425170072, '502df996-4f7c-11ed-bcaa-088fc30176f9', '820dc239-4fad-11ed-aac9-088fc30176f9', '1105', 'Processing', 'COD', '2022-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_item_id` varchar(500) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `book_id` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_orderred` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_item_id`, `order_id`, `book_id`, `quantity`, `date_orderred`) VALUES
(8, 'f1aa61b1-510f-11ed-84f8-088fc30176f9', 'f1a8a380-510f-11ed-84f8-088fc30176f9', 'b55ca5d3-4f81-11ed-bcaa-088fc30176f9', 1, '2022-10-21'),
(9, '1056511b-5112-11ed-84f8-088fc30176f9', '10548f12-5112-11ed-84f8-088fc30176f9', '9d5b0fad-4fa6-11ed-aac9-088fc30176f9', 1, '2022-10-21'),
(10, '10566363-5112-11ed-84f8-088fc30176f9', '10548f12-5112-11ed-84f8-088fc30176f9', 'b55ca5d3-4f81-11ed-bcaa-088fc30176f9', 1, '2022-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` varchar(500) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `role_name`) VALUES
(3, '0ef146b3-4f4f-11ed-96e0-088fc30176f9', 'Admin'),
(5, '240c4236-4f4f-11ed-96e0-088fc30176f9', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(11) NOT NULL,
  `shipping_details_id` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `barangay` varchar(200) NOT NULL,
  `street` varchar(100) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `contact_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `shipping_details_id`, `user_id`, `firstname`, `middlename`, `lastname`, `barangay`, `street`, `postal_code`, `city`, `province`, `contact_number`) VALUES
(6, '820dc239-4fad-11ed-aac9-088fc30176f9', '502df996-4f7c-11ed-bcaa-088fc30176f9', 'Juan', 'Dela', 'Cruz', 'Camagong', 'Purok 5', 4505, 'Oas', 'Albay', '09322550100');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `wishlist_id` varchar(500) NOT NULL,
  `book_id` varchar(500) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
