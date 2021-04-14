-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 07:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopted`
--

CREATE TABLE `adopted` (
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `addoption_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopted`
--

INSERT INTO `adopted` (`pet_id`, `user_id`, `addoption_date`) VALUES
(20, 6, '2021-04-14'),
(14, 6, '2021-04-14'),
(13, 6, '2021-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Fish'),
(4, 'Bird'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `pet_description` varchar(522) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `author_id` int(11) NOT NULL DEFAULT 1,
  `buyer_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `pet_name`, `category_id`, `age`, `pet_description`, `created_on`, `author_id`, `buyer_id`, `status`) VALUES
(3, 'Jerry', 5, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quae ea consequuntur culpa placeat nemo repudiandae excepturi expedita debitis maxime.', '2021-03-12 00:00:00', 1, NULL, 0),
(4, 'Rex', 1, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quae ea consequuntur culpa placeat nemo repudiandae excepturi expedita debitis maxime.', '2021-03-12 00:00:00', 1, NULL, 0),
(6, 'Jim', 4, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quae ea consequuntur culpa placeat nemo repudiandae excepturi expedita debitis maxime.', '2021-03-12 00:00:00', 1, NULL, 0),
(10, 'Dracula', 2, 18, 'Dracula is a ginger cat', '2021-03-12 00:00:00', 4, NULL, 0),
(11, 'Jolly', 1, 21, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, NULL, 0),
(12, 'Simba', 2, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, NULL, 0),
(13, 'Mekka', 3, 15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, 6, 1),
(14, 'Bishop', 1, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, 6, 1),
(15, 'Nuke', 5, 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, NULL, 0),
(16, 'Fenny', 4, 13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, NULL, 0),
(17, 'Perkí', 4, 11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2021-03-16 10:21:20', 1, NULL, 0),
(20, 'Laduuma', 4, 17, 'When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you', '2021-04-14 18:57:24', 6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `location`, `password`) VALUES
(1, 'Pet', 'Shop', 'Pet Shop', 'petshop@pestshop.com', '0202242525', 'Ongata Rongai', '$2y$10$GpNCkle45q67yOwEW7hWM.bgpM5dyy4zVsPKibqec7S64FXbO4uUa\r\n'),
(2, 'Chandler', 'Bing', 'Mr Big', 'djack@test.com', '0729170437', 'Nairobi, Kenya', '$2y$10$OZo3Fl1Nj72SadnHoaO03erb8uoOwqTG4mJSnasjb8kL9SYI6zROu'),
(3, 'des', 'mond', 'mondi', 'sam@test.com', '0712345698', 'Nairobi, Kenya', '$2y$10$EbUTIc87EsAOg4dc2Y9l7e5yhEOYXdZ3brhqy.LV3tuEloMgGrOWa'),
(4, 'new', 'person', 'newP', 'Np@email.com', '0798990989', 'Mukuru, Kenya', '$2y$10$Qt2vj1smZ7nFcz9s.hUNsePSf.xFzBhrRiobZbmw164Ip38XIRLqq'),
(6, 'Allan', 'Bing', 'Kondoo wa kutupa', 'test003@flasktest.com', '0765453678', 'Nairobi, Kenya', '$2y$10$l.24qiG.fv6P2ZT2qyZ8Ru6L0vTjDwSOwbwxO41kF/XfY2ZqAZojq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopted`
--
ALTER TABLE `adopted`
  ADD KEY `pet_id` (`pet_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`author_id`,`buyer_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopted`
--
ALTER TABLE `adopted`
  ADD CONSTRAINT `adopted_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adopted_ibfk_2` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pets_ibfk_3` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pets_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
