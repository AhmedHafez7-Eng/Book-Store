-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2022 at 01:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  `msg_status` varchar(25) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`, `msg_status`) VALUES
(2, 3, 'Omar Zaghlol', 'omar11@outlook.com', '01555348568', 'Hello, These Books are fantastic and waiting for more exciting books.', 'read'),
(3, 5, 'Noha Ahmed', 'noha@gmail.com', '01525345786', 'Hello, I like this site and its books so much & I\'m excited to see more awesome stories. Hello, I like this site and its books so much & I\'m excited to see more awesome stories.', 'read'),
(10, 18, 'Ahmed Hafez', 'ahmedh@gmail.com', '01234765543', 'This Book Store is so amazing & has very exciting stories.', 'read'),
(11, 18, 'Ahmed Hafez', 'ahmedh@gmail.com', '01123765598', 'Hi, I\'d like to ask about \"Die Empty\" Book and how much is it, please?', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(10, 18, 'Ahmed Hafez', '01010495597', 'ahmedhafezoffic@gmail.com', 'credit card', 'flat no7,Hawar st.,Dakahlia,Mansoura,Egypt-35511', ', Be Well Bee (3), The Girl of Ink & Stars (8)', 221, '06-Jun-2022', 'completed'),
(11, 18, 'Ahmed Hafez', '01522552273', 'ahmedhafezoffic@gmail.com', 'cash on delivery', 'flat no. 7, Hawar st., Dakahlia, Mansoura, Egypt - 35511', ', Radical Gardening (1), Red Queen (3), The World (1), Boring Girls A Novel (7), The Girl of Ink & Stars (1)', 370, '06-Jun-2022', 'completed'),
(12, 18, 'Ahmed Hafez', '01010495597', 'ahmedhafezoffic@gmail.com', 'mastercard', 'flat no. 7, Hawar st., Dakahlia, Mansoura, Egypt - 35511', ', Boring Girls A Novel (3), Be Well Bee (2)', 125, '06-Jun-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(18, 'Clever Lands (Lucy Crehan)', 23, 'clever_lands.jpg'),
(19, 'The World', 11, 'the_world.jpg'),
(20, 'The Happy Lemon', 14, 'the_happy_lemon.jpg'),
(21, 'Bash And Lucy', 22, 'bash_and_lucy-2.jpg'),
(22, 'Red Queen', 11, 'red_queen.jpg'),
(23, 'Free Fall', 33, 'freefall.jpg'),
(24, 'The Girl of Ink & Stars', 25, 'the_girl_of_ink_and_stars.jpg'),
(25, 'NightShade', 21, 'nightshade.jpg'),
(26, 'Radical Gardening', 42, 'radical_gardening.jpg'),
(27, 'Holy Ghosts', 50, 'holy_ghosts.jpg'),
(28, 'Be Well Bee', 7, 'be_well_bee.jpg'),
(29, 'Boring Girls A Novel', 37, 'boring_girls_a_novel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `p_image` varchar(255) NOT NULL DEFAULT 'default_avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `p_image`) VALUES
(2, 'Moaaz M. Hafez', 'moaaz@gmail.co', '9e45671b945ebbf15c05598a4fd37d7f', 'admin', 'pic-1.png'),
(3, 'Omar Zaghlol', 'omar11@outlook.com', '000fff6fe8a06ee93dd4c2079cae5f95', 'user', 'author-3.jpg'),
(5, 'Noha Ahmed', 'noha@gmail.com', '08fe4312330037fb533c112dc1f688ba', 'user', 'default_avatar.jpg'),
(15, 'Sandy Youssef', 'sandy7@gmail.com', 'c2077c244be57e3007a6adfd454708b8', 'admin', 'pic-2.png'),
(18, 'Ahmed M. Hafez', 'ahmedh@gmail.com', '188e31a2d165ef67e179165cf63b2975', 'user', 'author-5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ActiveDirectories_Cart_UserID` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ActiveDirectories_Msg_UserID` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ActiveDirectories_UserID` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_ActiveDirectories_Cart_UserID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_ActiveDirectories_Msg_UserID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_ActiveDirectories_UserID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
