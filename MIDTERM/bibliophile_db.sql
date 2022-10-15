-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 06:32 AM
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
-- Database: `bibliophile_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE `addtocart` (
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addtocart`
--

INSERT INTO `addtocart` (`cart_id`, `book_id`, `user_id`, `date`) VALUES
(1, 2, 1, '2022-10-09'),
(2, 2, 1, '2022-10-09'),
(3, 3, 2, '2022-10-09'),
(4, 1, 3, '2022-10-09'),
(5, 6, 1, '2022-10-10'),
(6, 8, 2, '2022-10-10'),
(7, 1, 7, '2022-10-11'),
(8, 5, 4, '2022-10-11'),
(9, 7, 4, '2022-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(40) NOT NULL,
  `book_description` varchar(500) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_description`, `book_author`, `book_price`) VALUES
(1, 'Strength in our scars', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Bianca Sparacino', 1000),
(2, 'Milk and Honey ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Rupi Kaur', 1900),
(3, 'The Courage To Be Disliked', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', ' Ichiro Kishimi & Fumitake Koga', 800),
(4, 'If I had your face', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Frances Cha', 500),
(5, 'Just Kids', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Patty Smith', 1010),
(6, 'We have always lived in a castle', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Shirley Jackson', 600),
(7, 'Dear John', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Nicholas Spark', 600),
(8, 'The House of Silk', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam doloribus non dolorem voluptas sed incidunt!', 'Anthony Horowitz', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `order_item_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`order_item_id`, `book_id`, `user_id`, `order_quantity`, `date`) VALUES
(1, 2, 1, 3, '2022-10-15 02:30:49'),
(2, 2, 1, 1, '2022-10-15 02:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `gender` text NOT NULL,
  `contact` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `gender`, `contact`, `email`, `username`, `password`) VALUES
(1, 'Reggie Reblando', 'Male', 98765467, 'reggiereblando@gmail.com', 'slewpyhead', 'ziezie'),
(2, 'Maricar Romero', 'Female', 94653274, 'mari123@gmail.com', '4maricar', 'mariebiscuit'),
(3, 'Alyssa Ragos', 'Female', 95736781, 'ragosalyssa@gmail.com', 'alyyxa', 'heinsberg'),
(4, 'Jayzielyn Oguira', 'Female', 98765434, 'celine@gmail.com', 'celine', 'abyss'),
(5, 'Juan dela Cruz', 'Male', 98765436, 'juan@gmail.com', 'thejuan', 'discombabulated'),
(6, 'Jie Reblando', 'Male', 98645456, 'jie@gmail.com', 'jienx', 'jeieeeeeie'),
(7, 'Mac Reblando', 'Male', 98765432, 'Rmac@gmail.com', 'macxlr', 'macz55665656'),
(8, 'Mon Reblando', 'Male', 98765423, 'mondie@gmail.com', 'mondemamon', 'mondroid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocart`
--
ALTER TABLE `addtocart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
