-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2018 at 06:15 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.1.23-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(255) NOT NULL,
  `fullname` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `subject` varchar(80) DEFAULT NULL,
  `birth_dt` date DEFAULT NULL,
  `message` text,
  `recieved` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `fullname`, `email`, `subject`, `birth_dt`, `message`, `recieved`, `status`) VALUES
(1, 'Full Name', 'test@gmail.com', 'Hello', '1990-11-14', 'qwerty message', '2018-11-02 16:27:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'The title ', 'This is the post body.', '2018-11-01 14:51:45', '2018-11-02 13:40:28', 3),
(2, 'A title once again', 'And the post body follows.', '2018-11-01 14:51:45', NULL, 3),
(3, 'Title strikes back', 'This is really exciting! Not.', '2018-11-01 14:51:45', NULL, 3),
(4, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-11-01 16:19:00', '2018-11-01 16:19:00', 7),
(5, 'Tutorials & Examples', 'In this section, you can walk through typical CakePHP applications to see how all of the pieces come together.\r\nAlternatively, you can refer to the non-official CakePHP plugin repository CakePackages and the Bakery for existing applications and components.', '2018-11-01 18:35:24', '2018-11-01 18:39:40', 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `category` int(2) DEFAULT NULL COMMENT '1 => ''small'', 2 => ''Medium'', 3 => ''large''',
  `menu_order` int(20) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT '0' COMMENT 'De-active => 0, Active => 1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `menu_order`, `quantity`, `image`, `status`, `created`) VALUES
(2, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(3, 'Spritzer BonRica', 'Spritzer Bonrica Fibre Yogurt - 350ml X 18', 55.7, 2, 2, 1000, 'Spritzer-Bonrica-Fibre-Yogurt.jpeg', 1, '2018-11-05 17:49:42'),
(4, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P23170309144656.jpg', 0, '2018-11-11 10:50:25'),
(5, 'Spritzer Dispenser Series', 'sdf', 47.7, 2, 2, 1000, NULL, 0, '2018-11-11 10:54:09'),
(6, 'Spritzer Tinge', 'gfh', 32, 2, 8, 1000, NULL, 0, '2018-11-11 10:54:35'),
(7, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(8, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(9, 'Spritzer BonRica', 'Spritzer Bonrica Fibre Yogurt - 350ml X 18', 50.1, 2, 2, 1000, 'Spritzer-Bonrica-Fibre-Yogurt.jpeg', 0, '2018-11-05 17:49:42'),
(10, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(11, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(14, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(15, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(16, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(17, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(18, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(19, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(20, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(21, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(22, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(23, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(24, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(25, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(26, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(27, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(28, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(29, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(30, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(31, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(49, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(50, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 1, '2018-11-11 10:50:25'),
(58, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 1, '2018-11-11 10:50:25'),
(59, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 1, '2018-11-11 10:50:25'),
(60, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 1, '2018-11-11 10:50:25'),
(86, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(87, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(88, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(89, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(90, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(91, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(92, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(93, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(94, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(95, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(96, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(97, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(98, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(99, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(100, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(101, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(102, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(103, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(104, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(105, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(106, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(107, 'Spritzer BonRica', 'Spritzer Bonrica Fibre Yogurt - 350ml X 18', 55.7, 2, 2, 1000, 'Spritzer-Bonrica-Fibre-Yogurt.jpeg', 1, '2018-11-05 17:49:42'),
(108, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P23170309144656.jpg', 0, '2018-11-11 10:50:25'),
(109, 'Spritzer Dispenser Series', 'sdf', 47.7, 2, 2, 1000, NULL, 0, '2018-11-11 10:54:09'),
(110, 'Spritzer Tinge', 'gfh', 32, 2, 8, 1000, NULL, 0, '2018-11-11 10:54:35'),
(111, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(112, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(113, 'Spritzer BonRica', 'Spritzer Bonrica Fibre Yogurt - 350ml X 18', 50.1, 2, 2, 1000, 'Spritzer-Bonrica-Fibre-Yogurt.jpeg', 0, '2018-11-05 17:49:42'),
(114, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(115, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(116, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(117, 'Spritzer BonRica', 'Spritzer Bonrica Fibre Yogurt - 350ml X 18', 55.7, 2, 2, 1000, 'Spritzer-Bonrica-Fibre-Yogurt.jpeg', 1, '2018-11-05 17:49:42'),
(118, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P23170309144656.jpg', 0, '2018-11-11 10:50:25'),
(119, 'Spritzer Dispenser Series', 'sdf', 47.7, 2, 2, 1000, NULL, 0, '2018-11-11 10:54:09'),
(120, 'Spritzer Tinge', 'gfh', 32, 2, 8, 1000, NULL, 0, '2018-11-11 10:54:35'),
(121, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(122, 'Spritzer Dispenser Series', '(PR1MA) Spritzer Starter Pack - Mini Dispenser + Spritzer Mineral Water 9.5L (4 Cartons)', 108.99, 3, 1, 1, 'P98171108174247.png', 1, '2018-11-05 16:53:30'),
(123, 'Spritzer BonRica', 'Spritzer Bonrica Fibre Yogurt - 350ml X 18', 50.1, 2, 2, 1000, 'Spritzer-Bonrica-Fibre-Yogurt.jpeg', 0, '2018-11-05 17:49:42'),
(124, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(125, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(126, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(127, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(128, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(129, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(130, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(131, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(132, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(133, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(134, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(135, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(136, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(137, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(138, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(139, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(140, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(141, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(142, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(143, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(144, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(145, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(146, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'P22170921235523.png', 0, '2018-11-11 10:50:25'),
(147, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(148, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'IMG846180123082500--.jpg', 0, '2018-11-11 10:50:25'),
(149, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, NULL, 0, '2018-11-11 10:50:25'),
(152, 'Spritzer N/Mineral Water Cup', 'gf', 16.43, 2, 6, 230, 'IMG846180123082500--.jpg', 1, '2018-11-11 10:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'aadhar', '$2a$10$ONpEleJlquHtL6Qw0SHrJuT2iJt75WQbx.Y1ub10yyrWisih1VWQK', 'admin', '2018-11-01 17:38:38', '2018-11-01 17:38:38'),
(2, 'test', '$2a$10$Jy6sTs8i/v1Qfhr/Cio6BOtg0smQAcOC0kcr4Uboha6xOY2dESoqW', 'author', '2018-11-01 17:40:16', '2018-11-01 17:40:16'),
(3, 'author', '$2a$10$y7wsn0wo1vlrTKD4scnJKONWR7UmWVAUEV9VkJyg/GWEzKVq1ezE6', 'author', '2018-11-01 17:43:43', '2018-11-01 17:43:43'),
(7, 'admin', '$2a$10$rRaxgPVb1.UvvCuBPwgNA.XqDhqIFQLY7jwwG/MMMwJoCOqd./HVq', 'admin', '2018-11-01 17:45:02', '2018-11-01 17:45:02'),
(8, 'admin', '$2a$10$C1l0I1SAYc1JgkZopytiLemWvaFC/EC1l0WMJmbOF3gSRmEdMYl0C', 'admin', '2018-11-01 17:45:09', '2018-11-01 17:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `posts_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
