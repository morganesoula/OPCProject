-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 09, 2018 at 10:56 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Table structure for table `oc_advert`
--

CREATE TABLE `oc_advert` (
  `id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nb_applications` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_advert`
--

INSERT INTO `oc_advert` (`id`, `image_id`, `date`, `title`, `author`, `content`, `published`, `updated_at`, `nb_applications`, `slug`) VALUES
(2, 2, '2018-10-29 16:36:18', 'Recherche développeur Symfony.', 'Alexandre', 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…', 1, NULL, 2, ''),
(3, 3, '2018-10-29 16:36:18', 'Recherche développeur Symfony.', 'Alexandre', 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…', 1, '2018-10-29 16:36:50', 2, ''),
(4, 4, '2018-10-30 09:11:18', 'Recherche développeur Symfony.', 'Alexandre', 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…', 1, NULL, 2, 'recherche-developpeur-symfony'),
(5, 5, '2018-10-30 09:11:18', 'Recherche développeur Symfony.', 'Alexandre', 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…', 1, NULL, 2, 'recherche-developpeur-symfony-1'),
(6, 6, '2018-10-30 09:13:27', 'Recherche développeur Symfony.', 'Alexandre', 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…', 1, NULL, 2, 'recherche-developpeur-symfony-2'),
(7, NULL, '2018-10-30 00:00:00', 'PremierTest', 'Moi', 'Voici un contenu tout chaud', 1, NULL, 0, 'premiertest'),
(8, 7, '2018-10-31 09:00:00', 'Second test de publication', 'Toujours moi', 'Et hop, on est reparti pour un contenu sans grand intérêt.', 1, NULL, 0, 'second-test-de-publication'),
(9, 8, '2018-10-31 14:39:00', 'Une nouvelle annonce', 'Morgane', 'No lo se', 1, '2018-10-31 16:09:01', 0, 'une-nouvelle-annonce');

-- --------------------------------------------------------

--
-- Table structure for table `oc_advert_category`
--

CREATE TABLE `oc_advert_category` (
  `advert_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_advert_category`
--

INSERT INTO `oc_advert_category` (`advert_id`, `category_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oc_advert_skill`
--

CREATE TABLE `oc_advert_skill` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_advert_skill`
--

INSERT INTO `oc_advert_skill` (`id`, `advert_id`, `skill_id`, `level`) VALUES
(1, 2, 1, 'Expert'),
(2, 2, 2, 'Expert'),
(3, 2, 3, 'Expert'),
(4, 2, 4, 'Expert'),
(5, 2, 5, 'Expert'),
(6, 2, 6, 'Expert'),
(7, 2, 7, 'Expert'),
(8, 3, 1, 'Expert'),
(9, 3, 2, 'Expert'),
(10, 3, 3, 'Expert'),
(11, 3, 4, 'Expert'),
(12, 3, 5, 'Expert'),
(13, 3, 6, 'Expert'),
(14, 3, 7, 'Expert'),
(15, 4, 1, 'Expert'),
(16, 4, 2, 'Expert'),
(17, 4, 3, 'Expert'),
(18, 4, 4, 'Expert'),
(19, 4, 5, 'Expert'),
(20, 4, 6, 'Expert'),
(21, 4, 7, 'Expert'),
(22, 5, 1, 'Expert'),
(23, 5, 2, 'Expert'),
(24, 5, 3, 'Expert'),
(25, 5, 4, 'Expert'),
(26, 5, 5, 'Expert'),
(27, 5, 6, 'Expert'),
(28, 5, 7, 'Expert'),
(29, 6, 1, 'Expert'),
(30, 6, 2, 'Expert'),
(31, 6, 3, 'Expert'),
(32, 6, 4, 'Expert'),
(33, 6, 5, 'Expert'),
(34, 6, 6, 'Expert'),
(35, 6, 7, 'Expert');

-- --------------------------------------------------------

--
-- Table structure for table `oc_application`
--

CREATE TABLE `oc_application` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_application`
--

INSERT INTO `oc_application` (`id`, `advert_id`, `author`, `content`, `date`) VALUES
(3, 2, 'Marine', 'J\'ai toutes les qualités requises.', '2018-10-29 16:36:18'),
(4, 2, 'Pierre', 'Je suis très motivé.', '2018-10-29 16:36:18'),
(5, 3, 'Marine', 'J\'ai toutes les qualités requises.', '2018-10-29 16:36:18'),
(6, 3, 'Pierre', 'Je suis très motivé.', '2018-10-29 16:36:18'),
(7, 4, 'Marine', 'J\'ai toutes les qualités requises.', '2018-10-30 09:11:18'),
(8, 4, 'Pierre', 'Je suis très motivé.', '2018-10-30 09:11:18'),
(9, 5, 'Marine', 'J\'ai toutes les qualités requises.', '2018-10-30 09:11:18'),
(10, 5, 'Pierre', 'Je suis très motivé.', '2018-10-30 09:11:18'),
(11, 6, 'Marine', 'J\'ai toutes les qualités requises.', '2018-10-30 09:13:27'),
(12, 6, 'Pierre', 'Je suis très motivé.', '2018-10-30 09:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `oc_category`
--

CREATE TABLE `oc_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_category`
--

INSERT INTO `oc_category` (`id`, `name`) VALUES
(1, 'Développement web'),
(2, 'Développement mobile'),
(3, 'Graphisme'),
(4, 'Intégration'),
(5, 'Réseau'),
(7, 'panda roux');

-- --------------------------------------------------------

--
-- Table structure for table `oc_image`
--

CREATE TABLE `oc_image` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_image`
--

INSERT INTO `oc_image` (`id`, `url`, `alt`) VALUES
(2, 'http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg', 'Job de rêve'),
(3, 'http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg', 'Job de rêve'),
(4, 'http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg', 'Job de rêve'),
(5, 'http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg', 'Job de rêve'),
(6, 'http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg', 'Job de rêve'),
(7, 'http://s1.lprs1.fr/images/2017/08/23/7207599_1-0-1802443235_1000x625.jpg', 'panda'),
(8, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_pka2OvaMLGnGNWn27wa9QF7_EOrLVh3qPOHpz1rhpVCWekdfxg', 'panda roux');

-- --------------------------------------------------------

--
-- Table structure for table `oc_skill`
--

CREATE TABLE `oc_skill` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oc_skill`
--

INSERT INTO `oc_skill` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Symfony'),
(3, 'C++'),
(4, 'Java'),
(5, 'Photoshop'),
(6, 'Blender'),
(7, 'Bloc-note');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oc_advert`
--
ALTER TABLE `oc_advert`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B1931753DA5256D` (`image_id`);

--
-- Indexes for table `oc_advert_category`
--
ALTER TABLE `oc_advert_category`
  ADD PRIMARY KEY (`advert_id`,`category_id`),
  ADD KEY `IDX_435EA006D07ECCB6` (`advert_id`),
  ADD KEY `IDX_435EA00612469DE2` (`category_id`);

--
-- Indexes for table `oc_advert_skill`
--
ALTER TABLE `oc_advert_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_32EFF25BD07ECCB6` (`advert_id`),
  ADD KEY `IDX_32EFF25B5585C142` (`skill_id`);

--
-- Indexes for table `oc_application`
--
ALTER TABLE `oc_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_39F85DD8D07ECCB6` (`advert_id`);

--
-- Indexes for table `oc_category`
--
ALTER TABLE `oc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oc_image`
--
ALTER TABLE `oc_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oc_skill`
--
ALTER TABLE `oc_skill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oc_advert`
--
ALTER TABLE `oc_advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oc_advert_skill`
--
ALTER TABLE `oc_advert_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `oc_application`
--
ALTER TABLE `oc_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `oc_category`
--
ALTER TABLE `oc_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oc_image`
--
ALTER TABLE `oc_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oc_skill`
--
ALTER TABLE `oc_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oc_advert`
--
ALTER TABLE `oc_advert`
  ADD CONSTRAINT `FK_B1931753DA5256D` FOREIGN KEY (`image_id`) REFERENCES `oc_image` (`id`);

--
-- Constraints for table `oc_advert_category`
--
ALTER TABLE `oc_advert_category`
  ADD CONSTRAINT `FK_435EA00612469DE2` FOREIGN KEY (`category_id`) REFERENCES `oc_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_435EA006D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `oc_advert` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oc_advert_skill`
--
ALTER TABLE `oc_advert_skill`
  ADD CONSTRAINT `FK_32EFF25B5585C142` FOREIGN KEY (`skill_id`) REFERENCES `oc_skill` (`id`),
  ADD CONSTRAINT `FK_32EFF25BD07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `oc_advert` (`id`);

--
-- Constraints for table `oc_application`
--
ALTER TABLE `oc_application`
  ADD CONSTRAINT `FK_39F85DD8D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `oc_advert` (`id`);
