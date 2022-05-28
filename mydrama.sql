-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: May 28, 2022 at 11:53 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint UNSIGNED NOT NULL,
  `mydrama` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `name` text COLLATE utf8_persian_ci,
  `title` text COLLATE utf8_persian_ci,
  `year` text COLLATE utf8_persian_ci,
  `your_rating` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `rating` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `watchers` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `reviews` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `screenwriter` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `director` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `genres` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `tags` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `country` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `type` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `episodes` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `aired` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `aired_on` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `original_network` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `duration` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `score` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `ranked` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `popularity` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `content_rating` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `favorites` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `story` text COLLATE utf8_persian_ci,
  `casts` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `mydrama`, `name`, `title`, `year`, `your_rating`, `rating`, `watchers`, `reviews`, `screenwriter`, `director`, `genres`, `tags`, `country`, `type`, `episodes`, `aired`, `aired_on`, `original_network`, `duration`, `score`, `ranked`, `popularity`, `content_rating`, `favorites`, `story`, `casts`) VALUES
(4, '28710-time', 'Time (2018)', 'Time', ' 2018', '0/10', '7.8/10 from 2,509 users', '8,326', '20 users', 'Choi Ho Chul', 'Jang Joon Ho', 'Mystery, Romance, Melodrama', 'Slight Romance, Revenge, Rich Man/Poor Woman, Investigation, Regret, Girls Generation (SNSD), Forbidden Love, Mourning, Power Struggle, Tearjerker (Vote or add tags)', 'South Korea', 'Drama', '32', 'Jul 25, 2018 - Sep 20, 2018', 'Wednesday, Thursday', 'MBC', '35 min.', '7.8 (scored by 2,509 users)', '#2155', '#1028', '15+ - Teens 15 or older', '0', 'This is the story of two polar opposite people that come together in tragedy. One remains stuck in time, whilst the other only has a limited amount of time left to live. Seol Ji Hyun is a woman who, although living a hard life, remains positive, upbeat and social. Cheon Soo Ho is the CEO of a restaurant and the son of a wealthy family with a terrible temper and no regard for other people. They both meet briefly under negative impressions of each other. However, their lives become entangled once more when Ji Hyuns sister dies unexpectedly in Soo Hos residence. From there, Ji Hyuns time stops and she becomes a cold, miserable person who finds nothing to live for. But Soo Hoo, who carries heavy guilt and is drawn to her, promises to himself to use the 6 months he has left to live to help her, whose life was destroyed because of him. In the process, Soo Ho falls in love with Ji Hyun, but how far can love develop when you only have a limited time left to live? (Source: AJ at MyDramaList) Edit Translation English Ελληνικά Polski Português', '{\"director\":\"Jang Joon Ho\",\"screenwriter\":\"Choi Ho Chul\",\"main role\":\"Kim Jung Hyun Cheon Soo Ho Main Role Seo Hyun Seol Ji Hyun Main Role Kim Joon Han Shin Min Seok Main Role Hwang Seung Eon Eun Chae A Main Role\",\"support role\":\"Choi Jong Hwan CEO Cheon [So Hoos Father] Support Role Jeon Soo Kyung Jang Ok Soon [Soo Hos Stepmother] Support Role Seo Hyun Woo Cheon Soo Chul [So Hoos Half-Brother] Support Role Cho Byeong Kyu Kim Bok Kyu Support Role Ahn Ji Hyun Oh Young Hee [Ji Hyuns Friend] Support Role Yoon Ji Won Seol Ji Eun [Ji Hyuns sister] Support Role Kim Hee Jung Yang Hee Sook [Ji Hyuns Mother] Support Role Choi Deok Moon Nam Dae Chul Support Role Kang Min Ah Miss Yang Support Role Heo Jung Do Kang In Beom Support Role Kim Jeong Tae Geum Tae Sung Support Role Joo In Young Manager Hong Support Role Kim Yong Joon Chef Wang Support Role Bae Hae Seon [Cheon Soo Hos mother] Support Role Kwon Ban Suk [Secretary] Support Role\",\"guest role\":\"Kim Hye Ji Yu Ri [Ji Euns Friend] Guest Role Seo Kwang Jae [Doctor who diagnosed Cheon Soo Ho] Guest Role Song Ji Woo Soo Chul [Young] Guest Role Kim Sa Hun Guest Role Jung Ji Hoon Guest Role Heo Dong Won Guest Role Han Seung Hyun [Reporter] Guest Role Kim Mi Hye [Reporter] Guest Role Moon Yong Il Guest Role Kim Bum Suk Guest Role Im Soo Hyun [Nurse] Guest Role Park Jin Soo [College student] Guest Role Yang Jo Ah [Reporter] Guest Role\",\"composer\":\"Jung Se Rin\",\"bit part\":\"Song Geul Song Geul [Anchor] Bit part Kim Byung Chul Bit part Jung Shi Yool [Image] Bit part\",\"unknown\":\"Bae Eun Woo Unknown\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
