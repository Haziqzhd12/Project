-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 07:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myportofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_name` varchar(255) NOT NULL,
  `about_title` text NOT NULL,
  `about_desc` text NOT NULL,
  `about_photo` varchar(255) NOT NULL,
  `about_age` varchar(100) NOT NULL,
  `about_free` varchar(255) NOT NULL,
  `about_email` varchar(255) NOT NULL,
  `about_address` varchar(255) NOT NULL,
  `about_lang` varchar(255) NOT NULL,
  `about_exp` varchar(255) NOT NULL,
  `about_skill` varchar(255) NOT NULL,
  `about_exp_yrs` varchar(255) NOT NULL,
  `about_project` varchar(255) NOT NULL,
  `about_awards` varchar(255) NOT NULL,
  `about_happy` varchar(100) NOT NULL,
  `about_button` varchar(255) NOT NULL,
  `about_hire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_name`, `about_title`, `about_desc`, `about_photo`, `about_age`, `about_free`, `about_email`, `about_address`, `about_lang`, `about_exp`, `about_skill`, `about_exp_yrs`, `about_project`, `about_awards`, `about_happy`, `about_button`, `about_hire`) VALUES
(1, 'Haziq Zahidi Bin Khairul Azha', 'About Me', 'Driven and adaptable student that enthusiastic to acquire hands-on experience through an internship in the management and administration industry. Aiming to apply academic knowledge, gain practical insights, and develop professionally within a dynamic work environment to achieve both personal and organizational objectives.', 'about-file-1720528611.jpg', '21', 'Available', 'Haziqzahidi0@gmail.com', 'Batu Pahat, Johor , Malaysia', 'English | Malay | Mandarin', 'Internship Trainee At University Malaysia Pahang Al-Sultan Abdullah (UMPSA)', 'Networking | Web Design | Web Developer', '', '', '', '', 'drive.google.com/file/d/1a2QPegXKoyBhQ3Op08As2_wSl5ePEb7W/view?usp=sharing', '01130356986');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_photo` varchar(100) NOT NULL,
  `blog_status` int(11) NOT NULL,
  `p_created` datetime NOT NULL,
  `p_updated` datetime NOT NULL,
  `blog_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_desc`, `blog_photo`, `blog_status`, `p_created`, `p_updated`, `blog_url`) VALUES
(63, 'Internship at UMPSA', 'UMPSA', 'blog-photo-1721116991.png', 1, '2024-07-16 13:03:11', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/1Tlj1MLeyL50isatPCE5TdiOzE2SNulT-/view?usp=sharing'),
(65, 'Introduce myself', 'Introduce myself in mandarin', 'blog-photo-1721117694.jpg', 1, '2024-07-16 13:14:54', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/1Oovz5KV-NE9XfGIvRfi45_jiq-0mVPXZ/view?usp=sharing'),
(66, 'Project UMPSA HOSTEL', 'Project UMPSA HOSTEL DUHAM', 'blog-photo-1721117968.jpg', 1, '2024-07-16 13:19:28', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/1E4-kDQI0ItLD5oZ23SBWbQ48Ew-Ysj9s/view?usp=drive_link');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_info` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_fb` varchar(255) NOT NULL,
  `contact_tw` varchar(255) NOT NULL,
  `contact_insta` varchar(255) NOT NULL,
  `contact_wts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_info`, `contact_email`, `contact_phone`, `contact_address`, `contact_fb`, `contact_tw`, `contact_insta`, `contact_wts`) VALUES
(1, 'Welcome to my Personal Site ! ', 'Haziqzahidi0@gmail.com', '01130356986', 'Batu Pahat , Johor', 'mohdhaziq.zahidi', '-', 'hzqzahidi._', '01130356986');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `education_year` varchar(255) NOT NULL,
  `education_title` varchar(255) NOT NULL,
  `education_desc` text NOT NULL,
  `education_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `education_year`, `education_title`, `education_desc`, `education_status`) VALUES
(53, '(2016-2018)', 'MALAYSIAN CERTIFICATE OF EDUCATION (SPM)', 'Sekolah Menengah Kebangsaan Seri Pekan , Pahang', '1'),
(54, '(2021 - 2023)', 'DIPLOMA IN COMPUTER SYSTEM &amp; NETWORKING', 'Kolej Poly-Tech MARA Batu Pahat (KPTM BP) , Johor', '1'),
(55, '2023 - Now', 'BACHELOR OF INFORMATION TECHNOLOGY IN CYBER SECURITY', 'University Poly-Tech Malaysia (UPTM)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `portifolio`
--

CREATE TABLE `portifolio` (
  `portifolio_id` int(11) NOT NULL,
  `portifolio_title` varchar(255) NOT NULL,
  `portifolio_desc` text NOT NULL,
  `portifolio_photo` varchar(100) NOT NULL,
  `portifolio_status` int(11) NOT NULL,
  `p_created` datetime NOT NULL,
  `p_updated` datetime NOT NULL,
  `portifolio_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portifolio`
--

INSERT INTO `portifolio` (`portifolio_id`, `portifolio_title`, `portifolio_desc`, `portifolio_photo`, `portifolio_status`, `p_created`, `p_updated`, `portifolio_url`) VALUES
(36, 'Website | MYID-UMPSA', 'Website for New Student and Staff UMPSA', 'portifolio-photo-1720530883.png', 1, '2024-07-09 18:14:43', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/1pkXVuxPTwJ0HccVZSk0ZEI25A8w4SpkA/view'),
(37, 'WEBSITE | MyDermaIkhlas.my', 'A website for contributions will be built as part of this project.', 'portifolio-photo-1720603316.png', 1, '2024-07-10 14:21:56', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/1cLU63UT5neomOJv9aQQXkYEghu8GhF72/view?usp=drive_link'),
(38, 'CCNAv7: Switching, Routing, and Wireless Essentials', 'Cisco Certification', '../portifolio-photo-1720604176.jpg', 1, '2024-07-10 14:35:20', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/18ltq9o-m8X_SPCiPt9ASMqfIWwIoEtv7/view?usp=drive_link'),
(39, 'CCNAv7: Enterprise Networking, Security, and Automation', 'Cisco Certification', 'portifolio-photo-1720604271.jpg', 1, '2024-07-10 14:37:51', '0000-00-00 00:00:00', 'https://drive.google.com/file/d/1TeCUTaVm3HsC9IPvCQzEzIqJ44HLwt4K/view?usp=drive_link');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `settings_id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_description` text NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_from_title` varchar(255) NOT NULL,
  `seo_meta_title` varchar(100) NOT NULL,
  `seo_meta_tags` varchar(100) NOT NULL,
  `seo_meta_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`settings_id`, `site_name`, `site_description`, `site_logo`, `email_from`, `email_from_title`, `seo_meta_title`, `seo_meta_tags`, `seo_meta_description`) VALUES
(1, 'PORTFOLIO', 'MyPortfolio', 'logo-file-1720531521.jpg', 'support@tanzahost.com', 'TanzaMe', 'PORTFOLIO', 'PORTFOLIO HAZIQ', 'Haziq Zahidi');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill_icon` varchar(255) NOT NULL,
  `skill_title` varchar(255) NOT NULL,
  `value_skill` varchar(11) NOT NULL,
  `skill_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_icon`, `skill_title`, `value_skill`, `skill_status`) VALUES
(61, 'c-plus-plus', 'C++', '50', '1'),
(62, 'php', 'PHP', '50', '1'),
(63, 'html5', 'HTML', '80', '1'),
(64, 'python', 'Python', '50', '1'),
(66, 'Wordpress', 'Wordpress', '85', '1'),
(67, 'joomla', 'Joomla', '85', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL,
  `reg_token` varchar(255) NOT NULL,
  `token_time` varchar(255) NOT NULL,
  `user_date_created` datetime NOT NULL,
  `user_date_updated` datetime NOT NULL,
  `user_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_full_name`, `email`, `user_name`, `user_password`, `user_photo`, `user_status`, `reg_token`, `token_time`, `user_date_created`, `user_date_updated`, `user_last_login`) VALUES
(43, 'Haziq Zahidi', 'Haziqzahidi0@gmail.com', 'Haziqzhd', '$2y$10$dK0JXNd7o0EoGwIX/sVsku/iej0m0np09DTUMi9BSgyNtjkKeYDle', 'admin-photo-1720439630.jpg', 1, '', '', '2024-07-08 16:53:50', '0000-00-00 00:00:00', '2024-07-16 14:02:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `portifolio`
--
ALTER TABLE `portifolio`
  ADD PRIMARY KEY (`portifolio_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `portifolio`
--
ALTER TABLE `portifolio`
  MODIFY `portifolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
