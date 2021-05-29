-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 12:19 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_record`
--

CREATE TABLE `book_record` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `room_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `payment_Method` varchar(255) NOT NULL,
  `booked_cid` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1=checked in , 2 = checked out',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_record`
--

INSERT INTO `book_record` (`id`, `ref_no`, `room_id`, `name`, `email`, `contact_no`, `date_in`, `date_out`, `payment_Method`, `booked_cid`, `status`, `date_updated`) VALUES
(1, '1578827998\n', 0, 'james', 'james@gmail.com', '12', '2021-05-29 11:25:00', '2021-06-01 11:25:00', 'Palawan', 6, 0, '2021-05-29 17:25:52'),
(2, '3347943239\n', 0, '132465', 'sdlkfj@gmail.com', '', '2021-05-29 11:40:00', '2021-06-01 11:40:00', 'Palawan', 6, 0, '2021-05-29 17:40:23'),
(3, '943637574\n', 0, 'james', 'kjh@gmailo.com', '123', '2021-06-05 11:41:00', '2021-07-01 11:41:00', 'Palawan', 7, 0, '2021-05-29 17:41:33'),
(4, '4785166756\n', 0, 'sdf', 'sdfs@gmail.com', '1621', '2021-06-05 11:44:00', '2021-07-01 11:44:00', 'Palawan', 3, 0, '2021-05-29 17:44:16'),
(5, '2490642643\n', 0, 'sdf', 'sdf@gmail.com', '123', '1970-01-01 11:47:00', '2021-05-31 11:47:00', 'Palawan', 6, 0, '2021-05-29 17:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `room_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `payment_Method` varchar(255) NOT NULL,
  `booked_cid` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1=checked in , 2 = checked out',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`id`, `ref_no`, `room_id`, `name`, `email`, `contact_no`, `date_in`, `date_out`, `payment_Method`, `booked_cid`, `status`, `date_updated`) VALUES
(1, '1578827998\n', 0, 'james', 'james@gmail.com', '12', '2021-05-29 11:25:00', '2021-06-01 11:25:00', 'Palawan', 6, 2, '2021-05-29 17:26:14'),
(2, '1899002005\n', 6, 'aldrin', 'sadfs@gmail.com', '1654', '2021-05-29 11:26:00', '2021-05-31 11:26:00', 'Palawan', 0, 2, '2021-05-29 17:31:17'),
(3, '1480150417\n', 7, 'sdfsdfds', 'sdf@gmail.com', '123', '2021-05-29 11:38:00', '2021-05-30 11:38:00', 'Palawan', 0, 2, '2021-05-29 17:39:30'),
(4, '3347943239\n', 0, '132465', 'sdlkfj@gmail.com', '', '2021-05-29 11:40:00', '2021-06-01 11:40:00', 'Palawan', 6, 2, '2021-05-29 17:41:00'),
(5, '943637574\n', 0, 'james', 'kjh@gmailo.com', '123', '2021-06-05 11:41:00', '2021-07-01 11:41:00', 'Palawan', 7, 2, '2021-05-29 17:41:59'),
(6, '4785166756\n', 0, 'sdf', 'sdfs@gmail.com', '1621', '2021-06-05 11:44:00', '2021-07-01 11:44:00', 'Palawan', 3, 2, '2021-05-29 17:46:55'),
(7, '2490642643\n', 0, 'sdf', 'sdf@gmail.com', '123', '1970-01-01 11:47:00', '2021-05-31 11:47:00', 'Palawan', 6, 1, '2021-05-29 17:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailables'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `category_id`, `status`) VALUES
(1, 'Room-101', 3, 1),
(4, 'Room-103', 3, 0),
(5, 'Room-104', 3, 0),
(6, 'Room-105', 7, 0),
(7, 'Room-106', 6, 0),
(8, 'Room-108', 4, 0),
(9, 'Room-109', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `price`, `cover_img`) VALUES
(2, 'Deluxe Room', 500, '1600480260_4.jpg'),
(3, 'Single Room', 120, '1600480680_2.jpg'),
(4, 'Family Room', 350, '1600480680_room-1.jpg'),
(6, 'Twin Bed Room', 200, '1600482780_3.jpg'),
(7, 'Twin Bird Bed Room', 5200, '7hotel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `hotel_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `hotel_name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'princesenpai Hotel', 'princesenpai@gmail.com', '+6948 8542 623', '1600478940_hotel-cover.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p class=&quot;OD&quot; style=&quot;font-family: Roboto, sans-serif; width: 0px; color: rgb(38, 38, 38); font-size: 13px;&quot;&gt;&lt;/p&gt;&lt;p class=&quot;IL&quot; style=&quot;font-family: Roboto, sans-serif;&quot;&gt;&lt;/p&gt;&lt;p class=&quot;Up pC&quot; id=&quot;:zy.av&quot; style=&quot;font-family: Roboto, sans-serif; position: absolute; height: 32px; left: -32px; top: 0px;&quot;&gt;&lt;/p&gt;&lt;p class=&quot;n291pb uaxL4e&quot; style=&quot;font-family: Roboto, sans-serif; position: relative;&quot;&gt;&lt;img src=&quot;https://lh3.googleusercontent.com/a-/AOh14GjuVXRWUxL7pc69LEt5SgGQqsqotkyDo3tLZbngcw=s32-c-k-no&quot; class=&quot;Yf&quot; alt=&quot;Jeric Baterna (19105136@usc.edu.ph)&quot; draggable=&quot;false&quot; title=&quot;Jeric Baterna (19105136@usc.edu.ph)&quot; tabindex=&quot;0&quot; role=&quot;link&quot; style=&quot;box-shadow: rgb(255, 255, 255) 0px 0px 1px; border-radius: 50%; display: block; user-select: none; border-width: initial; border-color: initial; border-image: initial; width: 32px; height: 32px;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p class=&quot;PD IF&quot; style=&quot;font-family: Roboto, sans-serif; vertical-align: top; padding: 7px 0px 1px; position: relative; border-radius: 0px 5px 5px; box-shadow: none; margin-left: 4px; color: rgb(38, 38, 38); font-size: 13px;&quot;&gt;&lt;/p&gt;&lt;p id=&quot;:zy.co&quot; class=&quot;JL&quot; style=&quot;font-family: Roboto, sans-serif; position: relative; color: rgb(38, 50, 56);&quot;&gt;&lt;/p&gt;&lt;p id=&quot;:104.ma&quot; class=&quot;Mu SP&quot; data-tooltip=&quot;May 26, 2021 at 4:58:57 PM UTC+8&quot; style=&quot;font-family: Roboto, sans-serif; font-size: 13px; line-height: 16px; margin-bottom: 6px; margin-left: 9px; margin-right: 9px; transition: opacity 0.218s ease 0s; opacity: 1; overflow-wrap: break-word; word-break: break-word;&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;text-align: center; &quot;&gt;&lt;span id=&quot;:104.co&quot; class=&quot;tL8wMe EMoHub&quot; dir=&quot;ltr&quot;&gt;&lt;b&gt;&amp;nbsp; princesenpai Hotel&lt;/b&gt;&lt;/span&gt;&lt;/h2&gt;&lt;p&gt;&lt;span class=&quot;tL8wMe EMoHub&quot; dir=&quot;ltr&quot;&gt;&lt;b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;h5 style=&quot;&quot;&gt;&lt;b&gt;&lt;span id=&quot;:104.co&quot; class=&quot;tL8wMe EMoHub&quot; dir=&quot;ltr&quot; style=&quot;&quot;&gt;&lt;b style=&quot;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; princesenpai &lt;/b&gt;Hotel&amp;nbsp;offers ultimate comfort and luxury. This is located near Nasipit Road, Talamban, Cebu City. This hotel is a beautiful combination of traditional grandeur and modern facilities.&amp;nbsp;The&amp;nbsp;255 exclusive guest rooms are furnished with a range of modern amenities such as television and internet access. International direct-dial phone and safe are also available in any of these rooms. Wake-up call facility is also available in these rooms. This provides you very comfort and relaxing moment and experiences to the guest and customers.&amp;nbsp;&lt;/span&gt;&lt;/b&gt;&lt;/h5&gt;&lt;h5 style=&quot;&quot;&gt;&lt;b&gt;&lt;span id=&quot;:104.co&quot; class=&quot;tL8wMe EMoHub&quot; dir=&quot;ltr&quot; style=&quot;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;b&gt;&lt;span class=&quot;tL8wMe EMoHub&quot; dir=&quot;ltr&quot;&gt;Guest Evaluations:&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;b&gt;&lt;span class=&quot;tL8wMe EMoHub&quot; dir=&quot;ltr&quot; style=&quot;&quot;&gt;&amp;nbsp; &amp;nbsp; &ldquo;Very clean rooms, excellent meals with talented live music at dinner, friendly staff, and nice location made this a wonderful place to stay.&rdquo; &ldquo;I loved the food and the staff.&rdquo;&lt;/span&gt;&lt;/b&gt;&lt;/h5&gt;&lt;p style=&quot;font-weight: bold;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-weight: bold;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-weight: bold;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-weight: bold;&quot;&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1),
(6, 'FrontDesk', 'frontdesk', 'frontdesk', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_record`
--
ALTER TABLE `book_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checked`
--
ALTER TABLE `checked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `book_record`
--
ALTER TABLE `book_record`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checked`
--
ALTER TABLE `checked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
