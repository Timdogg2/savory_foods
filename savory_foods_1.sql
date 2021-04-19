-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 10:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savory_foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` tinyint(4) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `name`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `ingrediants` varchar(5000) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `Category_id` tinyint(4) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `Title`, `description`, `ingrediants`, `price`, `Category_id`, `image`) VALUES
(1, 'Gruyère, Bacon, and Spinach Scrambled Eggs', 'Scambled egges, green spinach, bacon, and touch of Dinjon mustard', '8 eggs, 1 sp of Dijon mustard, salt and pepper, 1 tbsp olive oil or butter, 2 peieces of bacon, 2 c spinach, torn, 2 oz. Gruyere cheese,', '5.00', 1, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/gruyere-bacon-and-spinach-scrambled-eggs-1608648723.jpg?cro'),
(2, 'Eggs bendict', 'Common English muffin breakfeast', 'English muffin, bacon or ham, poached egg, hollandaise sauce', '5.00', 1, 'https://mk0foodfornetcoviwv0.kinstacdn.com/wp-content/uploads/2015/06/shutterstock_275108951.jpg'),
(3, 'Quinoa Salad', 'Gluten free salad for seasonal holidays and family settings', '1/4 cup pomegranate juice\r\n1 Meyer lemon, zest and juice only\r\n1/4-1/2 cup extra virgin olive oil\r\nsalt and pepper, to taste\r\n2 cups cooked quinoa (in Instant Pot or over stovetop), cooled slightly\r\n1/3 cup walnuts (or any other seed or nut), toasted\r\n1/3 cup parsley leaves, roughly chopped\r\n1/3 cup green onion, sliced\r\n1 small pomegranate, arils only\r\n1/3 cup dried cherries or cranberries', '8.00', 2, 'https://www.brit.co/media-library/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbWFnZSI6Imh0dHBzOi8vYXNzZXRzLnJibC5tcy8yMTMwM'),
(4, 'Fluffernutter sandwich ', 'Peanut butter and marshmallow sandwich', '1 (10-ounce) bag of Dandies Mini Marshmallows or Dandies Marshmallows\r\nliquid from 1 can of chickpeas\r\n1 teaspoon coconut oil', '8.00', 2, 'https://www.brit.co/media-library/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbWFnZSI6Imh0dHBzOi8vYXNzZXRzLnJibC5tcy8yMTIwN'),
(5, 'Lemon Chicken', 'Baked chicken breasts glazed in lemon seasoning', '4\r\nBoneless chicken breasts (roughly 2.5 lbs)\r\n1/4 cup\r\nOlive oil\r\n2 tsp\r\nOregano, dried\r\n2 tsp\r\nThyme, dried\r\n2 tsp\r\nGarlic powder\r\n2 tsp\r\nSalt, divided\r\n½ tsp\r\nBlack pepper\r\n1/2 cup\r\nDry white wine\r\n2 tbsp\r\nMinced garlic (6 cloves)\r\n1 tbsp\r\nLemon zest (2 lemons)\r\n2 tbsp\r\nLemon juice, freshly squeezed\r\n1 tbsp\r\nBrown sugar\r\n1\r\nLemon, cut into 6 slices, optional', '10.00', 3, 'https://images.themodernproper.com/billowy-turkey/production/posts/2019/Lemon-Chicken-8.jpg?w=1200&auto=compress%2Cforma'),
(6, 'Crock Pot Chicken Tacos', 'Crock pot cooked taco meat, with regular soft or hard taco shelss', '1\r\n12 oz tub red salsa, preferably from the refrigerated section\r\n1.5 lbs\r\nBoneless skinless chicken breast\r\n1/4 taco seasoning', '10.00', 3, 'https://images.themodernproper.com/billowy-turkey/production/posts/2020/Crock-Pot-Chicken-Taco-Meat-9.jpg?w=667&auto=com'),
(7, 'Samoa Dessert Lasagna', 'This Samoa dessert lasagna recreates the cookie in four perfect layers. ', 'FOR THE CRUST\r\n1 1/2 c. crushed Nilla wafers\r\n1/2 c. toasted shredded coconut\r\n6 tbsp. melted butter\r\nFOR THE CARAMEL LAYER:\r\n1 (10.4-oz.) jar caramel\r\nFOR THE CHOCOLATE LAYER\r\n2 (3.9-oz.) boxes instant chocolate pudding\r\n2 c. cold milk\r\nFOR THE CREAM CHEESE LAYER\r\n2 c. heavy cream \r\n1 (8-oz.) block cream cheese, softened\r\n1/2 c. powdered sugar\r\nFOR TOPPING\r\n1 c. toasted, sweetened coconut flakes\r\n1/2 c. chocolate chips, melted\r\nCaramel, warmed, for drizzling', '6.00', 4, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/delish-samoa-dessert-lasagna-still001-1581098037.jpg?crop=0'),
(8, 'Oreo Truffles', 'Oreo balls', '1 (14 oz.) package Oreos \r\n8 oz. cream cheese, softened\r\n1 tsp. pure vanilla extract \r\n2 c. white chocolate chips, melted\r\n1/2 c. semisweet chocolate chips, melted', '5.00', 4, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/delish-oreo-truffles-094-1544218913.jpg?crop=0.668xw:1.00xh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'Mickey', 'Mouse', 'Funhouse', '123456', 2),
(2, 'Minie', 'Mouse', 'Clubhouse', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
