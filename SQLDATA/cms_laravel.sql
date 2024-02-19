-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 03:19 PM
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
-- Database: `cms_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `article_nb` int(11) NOT NULL,
  `article_title` text NOT NULL,
  `article_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `site_id`, `article_nb`, `article_title`, `article_content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Les 3 meilleures méthodes  BIOS', '<p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Voici les 3 m&eacute;thodes que nous d&eacute;taillerons dans ce tutoriel:</p><ol style=\"box-sizing: border-box; color: rgb(21, 35, 68); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bolder;\">Via le menu BIOS, avec l&rsquo;utilitaire de mise &agrave; jour.</strong></li></ol><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">C&rsquo;est la m&eacute;thode la plus fiable et la plus s&eacute;curis&eacute;e. Nous vous la recommandons.</p><ol start=\"2\" style=\"box-sizing: border-box; color: rgb(21, 35, 68); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bolder;\">Via Windows, avec l&rsquo;utilitaire sp&eacute;cifique de la marque du PC.</strong></li></ol><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">C&rsquo;est la m&eacute;thode la plus simple mais aussi la moins fiable&nbsp;: un plantage du programme ou de Windows peut mettre HS la carte m&egrave;re. Par ailleurs, l&rsquo;option de mise &agrave; jour du BIOS via Windows n&rsquo;est pas propos&eacute;e par toutes les marques.</p><ol start=\"3\" style=\"box-sizing: border-box; color: rgb(21, 35, 68); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bolder;\">Via un bouton d&eacute;di&eacute; &agrave; l&rsquo;arri&egrave;re la carte m&egrave;re.</strong></li></ol><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">La mise &agrave; jour via un bouton situ&eacute; sur la plaque E/S (ou I/O) de la carte m&egrave;re, est une m&eacute;thode totalement fiable, mais qui n&rsquo;est pas disponible sur tous les mod&egrave;les. Les noms de cette fonctionnalit&eacute; peuvent varier, MSI parle par exemple de &ldquo;Flash BIOS Button&rdquo;, et Asus de &ldquo;USB BIOS Flashback&rdquo;. Quelle que soit la marque, son avantage majeur est le suivant (voir tuto d&eacute;di&eacute;):</p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br></p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><img src=\"/storage/sites/articles/18fDGbnzQkPn8EaOuYGAqPIAIrTbtuSvCensn6NX.webp\" style=\"width: 697px;\" class=\"fr-fic fr-dib\"><img src=\"/storage/sites/articles/bOrKYH93zc4069XNuz04DGSwVDwrX92KqoZfjMNb.png\" style=\"width: 689px;\" class=\"fr-fic fr-dib\"></p>', '2024-02-19 12:21:33', '2024-02-19 12:21:33'),
(2, 1, 2, 'Identifier la version actuelle du firmware', '<p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Vous connaissez maintenant la r&eacute;f&eacute;rence exacte de votre carte m&egrave;re ou de votre ordinateur. Mais avant de t&eacute;l&eacute;charger la mise &agrave; jour du BIOS, il va falloir &eacute;galement rep&eacute;rer la version actuellement install&eacute;e.</p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Pour ce faire&nbsp;:</p><ul style=\"list-style-type: disc;\"><li style=\"text-align: left;\">Tapez &laquo; msinfo &raquo; dans la barre de recherche de Windows puis cliquez sur <strong style=\"box-sizing: border-box; font-weight: bolder;\">[Informations Syst&egrave;me]</strong>.</li><li style=\"box-sizing: border-box;\">Depuis l&rsquo;onglet <strong style=\"box-sizing: border-box; font-weight: bolder;\">[R&eacute;sum&eacute; syst&egrave;me]</strong>, rep&eacute;rez la version actuelle du BIOS, indiqu&eacute;e &agrave; la section <strong style=\"box-sizing: border-box; font-weight: bolder;\">[Version du BIOS/Date]</strong>. Ici, la version de BIOS est la 1.60.</li></ul><p><br></p><p><span class=\"fr-img-caption fr-fic fr-dib\" style=\"width: 736px;\"><span class=\"fr-img-wrap\"><img src=\"/storage/sites/articles/gcnVvoJjEzn7ROo6dgzUZGKBGQEysPsxqIbwoKGR.webp\" style=\"width: 736px;\" class=\"fr-fic fr-dib\"><lt-highlighter data-lt-linked=\"1\" style=\"display: none; z-index: 1 !important;\"></lt-highlighter><span class=\"fr-inner\" contenteditable=\"true\" data-lt-tmp-id=\"lt-441085\" spellcheck=\"false\" data-gramm=\"false\">comment flasher le BIOS&nbsp;</span></span></span></p>', '2024-02-19 12:23:34', '2024-02-19 12:23:34'),
(3, 2, 1, 'Compatibilité avec la carte mère', '<p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Pour v&eacute;rifier la compatibilit&eacute; entre le processeur et la carte m&egrave;re d&eacute;sir&eacute;e, effectuez syst&eacute;matiquement une recherche sur la page officielle de la carte m&egrave;re, dans la rubrique &laquo;&nbsp;Support&nbsp;&raquo; vous trouverez ici ou l&agrave; une liste des CPU compatibles, ou en anglais &laquo;&nbsp;CPU list compatibility&nbsp;&raquo;.</p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Ceci &eacute;vite les mauvaises surprises dans la mesure o&ugrave; (assez rarement) certains processeurs sont incompatibles avec certaines cartes m&egrave;res ou certains chipset, malgr&eacute; le fait que les deux soient de m&ecirc;me g&eacute;n&eacute;ration.</p><p style=\"box-sizing: border-box; padding: 1.25em 2.375em; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; background-color: rgb(210, 248, 233);\">Pour v&eacute;rifier automatiquement la compatibilit&eacute; entre vos composants, voir notre comparatif: <a rel=\"noreferrer noopener\" href=\"https://generationcloud.fr/post/meilleurs-configurateurs-pc-gamer-fixe-et-portable\" target=\"_blank\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(164, 87, 245);\">les meilleurs configurateurs de PC en ligne.</a>&nbsp; &nbsp;&nbsp;</p><p style=\"box-sizing: border-box; padding: 1.25em 2.375em; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; background-color: rgb(210, 248, 233);\"><br></p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Ceci &eacute;vite les mauvaises surprises dans la mesure o&ugrave; (assez rarement) certains processeurs sont incompatibles avec certaines cartes m&egrave;res ou certains chipset, malgr&eacute; le fait que les deux soient de m&ecirc;me g&eacute;n&eacute;ration.</p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br></p><p style=\"box-sizing: border-box; color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"fr-img-caption fr-fic fr-dib fr-bordered fr-rounded\" style=\"width: 875px;\"><span class=\"fr-img-wrap\"><img src=\"/storage/sites/articles/7bJjQcHn7xIUqPXYNSRSlz3l0ngdWB8OiWEkFrzX.webp\" style=\"width: 863px;\" class=\"fr-fic fr-dib fr-bordered fr-rounded\"><span class=\"fr-inner\">AMD 500 series &nbsp;&nbsp;<br></span></span></span></p><p><span style=\"color: rgb(39, 39, 39); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\" id=\"isPasted\">Sur l&rsquo;infographie ci-dessus on peut par exemple constater que le chipset AMD B550 &ndash; sorti avec la g&eacute;n&eacute;ration Ryzen 5000 &ndash; n&rsquo;est pas r&eacute;trocompatible avec les Ryzen 3000 int&eacute;grant des capacit&eacute;s graphiques (permettant d&rsquo;utiliser l&rsquo;ordinateur sans carte graphique d&eacute;di&eacute;e), mais est r&eacute;trocompatible avec les Ryzen 3000 sans partie graphique. En revanche, le chipset x570, sortit en m&ecirc;me temps que le B550, est lui r&eacute;trocompatible avec les deux types.</span></p>', '2024-02-19 12:29:10', '2024-02-19 12:29:10'),
(4, 3, 1, 'Comment installer AnyDesk sur Windows 10', '<ol style=\"box-sizing: border-box; color: rgb(21, 35, 68); font-family: Rubik, sans-serif; font-size: 19px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\"><li style=\"box-sizing: border-box;\"><span style=\"color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\" id=\"isPasted\">Selon une &eacute;tude r&eacute;alis&eacute;e par Opinion Way pour l&rsquo;Agence nationale pour la formation professionnelle des adultes, plus de la moiti&eacute; des employ&eacute;s ont d&eacute;j&agrave; chang&eacute; de m&eacute;tier ou de secteur d&rsquo;activit&eacute;. La reconversion professionnelle concerne ainsi une part importante de la population active. C&rsquo;est une &eacute;tape normale dans un parcours professionnel. Ce projet a toutefois un co&ucirc;t et prend du temps. Vous avez en revanche plusieurs options pour financer votre changement de carri&egrave;re, dont le Compte Personnel de Formation ou CPF. D&eacute;couvrez dans ce guide les conseils pour r&eacute;ussir votre projet de reconversion professionnelle.</span></li></ol>', '2024-02-19 12:36:40', '2024-02-19 13:07:29'),
(5, 3, 2, 'AnyDesk sur windows 10 et 11 ??', '<h2 style=\'box-sizing: border-box; color: rgb(53, 59, 71); font-family: \"Palanquin Dark\"; font-style: normal; font-weight: 500; margin: 2em 0px 0.8em; font-size: 1.6em; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\' id=\"isPasted\">Faire un bilan de comp&eacute;tences</h2><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Faire un bilan de comp&eacute;tences est une des premi&egrave;res &eacute;tapes de la reconversion professionnelle. Cela vous permet de conna&icirc;tre la voie &agrave; emprunter. Vous pouvez le r&eacute;aliser gratuitement aupr&egrave;s du Fongecif (Fonds de Gestion des Cong&eacute;s Individuels de Formation). Il est &eacute;galement possible de le faire financer par son entreprise. En outre, <strong style=\"box-sizing: border-box; font-weight: 700;\">vous pouvez le financer via votre Compte personnel de formation</strong> (CPF).</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br></p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><img src=\"/storage/sites/articles/uitktzKn6729eoyRcsTKCMUGVJ0YsIEdqwmFK9oZ.jpg\" style=\"width: 546px;\" class=\"fr-fic fr-dib\"></p>', '2024-02-19 12:38:03', '2024-02-19 13:08:53'),
(8, 5, 1, 'Dépasser ses peurs', '<p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Il n&rsquo;y a rien de pire que de se retrouver coinc&eacute; dans un travail o&ugrave; on ne peut pas s&rsquo;&eacute;panouir. Parfois, nous prenons des d&eacute;cisions pour faire plaisir &agrave; la famille ou pour suivre un chemin qui semblait tout trac&eacute;. Nous r&eacute;pondons &agrave; des attentes inconscientes et faisons des choix pour correspondre &agrave; ce que l&rsquo;on attend de nous. M&ecirc;me si le m&eacute;tier peut para&icirc;tre attractif, nous ne sommes pas tous enclins &agrave; embrasser une carri&egrave;re de professeur, d&rsquo;infirmier ou de commercial. Les sensibilit&eacute;s et les int&eacute;r&ecirc;ts sont diff&eacute;rents selon les individus. Il est parfois n&eacute;cessaire de se former pour changer de m&eacute;tier ou pour envisager une carri&egrave;re totalement diff&eacute;rente.&nbsp;</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Pour enfin s&rsquo;&eacute;panouir dans son m&eacute;tier, il est possible de suivre des formations dipl&ocirc;mantes ou qualifiantes en optant pour un cursus sp&eacute;cifique. Pour financer la formation, il existe le Compte Personnel de Formation. Il est attribu&eacute; &agrave; chaque salari&eacute; et est utilisable durant toute sa vie active m&ecirc;me si la personne est au ch&ocirc;mage. Ce dispositif est venu remplacer le DIF (Droit Individuel &agrave; la Formation). Vous trouverez <a rel=\"noreferrer noopener\" href=\"https://www.cpformation.com/\" target=\"_blank\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(53, 150, 218); text-decoration: none; transition: all 0.2s ease-in-out 0s;\">sur le site www.cpformation.com, mine d&rsquo;informations sur le CPF</a>.</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br></p><figure style=\"box-sizing: border-box; display: block; margin: 2.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\"><img width=\"1200\" height=\"816\" src=\"/storage/sites/articles/fGMVwNaYT7y4qEOj11BRiUbZoOY9zZ6r2J1M1sPl.png\" alt=\"Reconversion professionnelle\" data-lazy-sizes=\"(max-width: 1200px) 100vw, 1200px\" data-ll-status=\"loaded\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://cours-informatique-gratuit.fr/wp-content/uploads/2020/01/professionnelle-reconversion-personnel-1200x816.jpg 1200w, https://cours-informatique-gratuit.fr/wp-content/uploads/2020/01/professionnelle-reconversion-personnel-600x408.jpg 600w, https://cours-informatique-gratuit.fr/wp-content/uploads/2020/01/professionnelle-reconversion-personnel-768x522.jpg 768w, https://cours-informatique-gratuit.fr/wp-content/uploads/2020/01/professionnelle-reconversion-personnel.jpg 1241w\" style=\"box-sizing: border-box; border-style: none; max-width: 100%; height: auto;\" class=\"fr-fil fr-dib\"></figure>', '2024-02-19 12:51:24', '2024-02-19 12:51:24'),
(9, 5, 2, 'Suivre les bonnes formations', '<p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Faire une reconversion professionnelle implique de se familiariser avec les d&eacute;veloppements technologiques et commerciaux. L&rsquo;informatique et la ma&icirc;trise des outils informatiques n&eacute;cessaire pour toute reconversion. <strong style=\"box-sizing: border-box; font-weight: 700;\">La ma&icirc;trise de l&rsquo;anglais est &eacute;galement un atout pour envisager une reconversion professionnelle</strong> et avoir sa place sur le march&eacute; du travail, quel que soit le secteur d&rsquo;activit&eacute; que vous choisissez.</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Le CPF vous permet d&rsquo;acqu&eacute;rir des comp&eacute;tences reconnues (qualifications, certifications ou examens) ou les connaissances de base. Vous ne pouvez b&eacute;n&eacute;ficier du CPF que si vous obtenez une certification &agrave; la fin de votre formation. Il existe une liste officielle que vous pouvez consulter pour &ecirc;tre certain de votre choix.</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Pour la formation pendant le temps de travail, l&rsquo;accord de votre employeur est requis. En revanche, si elle a lieu en dehors de votre temps de travail, vous n&rsquo;avez pas besoin de l&rsquo;accord de votre employeur. Sachez que votre salaire est maintenu bien que la formation ait lieu pendant votre temps de travail. Vous avez besoin d&rsquo;informer votre employeur 60 jours avant la formation concernant une formation de moins de 6 mois et 120 jours avant si celle-ci dure plus de 6 mois.</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br></p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"fr-img-caption fr-fic fr-dib\" style=\"width: 878px;\"><span class=\"fr-img-wrap\"><img src=\"/storage/sites/articles/wpIELfQHUyZ31i9mvRdUbpUmL55Kqyz3YVZbmamc.jpg\" style=\"width: 878px;\" class=\"fr-fic fr-dib\"><lt-highlighter data-lt-linked=\"1\" style=\"display: none; z-index: 1 !important;\"></lt-highlighter><span class=\"fr-inner\" contenteditable=\"true\" data-lt-tmp-id=\"lt-540279\" spellcheck=\"false\" data-gramm=\"false\">just for fun !!</span></span></span></p>', '2024-02-19 12:52:29', '2024-02-19 12:52:29'),
(10, 6, 1, 'Pourquoi choisir le support de cours Xyoos ?', '<p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Des millions d&rsquo;internautes ont d&eacute;j&agrave; appris avec Xyoos, et tous sont unanimes : finalement, l&rsquo;informatique c&rsquo;est facile &agrave; comprendre avec Xyoos. Des s&eacute;niors jusqu&rsquo;&agrave; 90 ans sont venus, et ont appris en toute autonomie. Mon support de cours est am&eacute;lior&eacute; sans cesse depuis maintenant 10 ans !</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Alors ne vous emb&ecirc;tez pas &agrave; vous lancer sur cette piste, Xyoos propose des licences pour les pros qui sont abordables (&agrave; partir de 49&euro; seulement pour une licence jusqu&rsquo;&agrave; 100 personnes).</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><img src=\"/storage/sites/articles/CBz4WeIsk2MHQbMMTHM0oDcnb2U0EYmHM4d4P4e7.jpg\" style=\"width: 610px;\" class=\"fr-fic fr-dib\"></p>', '2024-02-19 13:12:37', '2024-02-19 13:12:37'),
(11, 6, 2, 'les ebooks', '<p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\" id=\"isPasted\">Aujourd&rsquo;hui Xyoos propose principalement 3 cours :</p><ul style=\"box-sizing: border-box; list-style-type: circle; margin: 1.5em 0px; padding: 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box; margin-left: 2.5em; margin-bottom: 8px;\">Les bases de Windows, souris et clavier, bureautique, Internet et multim&eacute;dia &agrave; partir de z&eacute;ro</li><li style=\"box-sizing: border-box; margin-left: 2.5em; margin-bottom: 8px;\">Les bases d&rsquo;Android pour bien utiliser son smartphone ou sa tablette</li><li style=\"box-sizing: border-box; margin-left: 2.5em; margin-bottom: 8px;\">Les bases d&rsquo;iOS pour bien utiliser son iPad ou iPhone d&rsquo;Apple</li></ul><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Les supports les plus utilis&eacute;s sont les ebook en <strong style=\"box-sizing: border-box; font-weight: 700;\">format PDF</strong> : faciles &agrave; imprimer, &agrave; distribuer &agrave; vos &eacute;l&egrave;ves.</p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br></p><p style=\"box-sizing: border-box; margin: 1.5em 0px; color: rgb(89, 97, 113); font-family: Rubik; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><img src=\"/storage/sites/articles/U94TJsMhqJQ0FOKIcqHL4yC1YsPQ6QUEaUp2etXf.jpg\" style=\"width: 674px;\" class=\"fr-fic fr-dib\"></p>', '2024-02-19 13:13:21', '2024-02-19 13:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font_color` varchar(7) NOT NULL,
  `background_color` varchar(7) NOT NULL,
  `section_separator_color` varchar(7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `font_color`, `background_color`, `section_separator_color`, `created_at`, `updated_at`) VALUES
(1, '#000000', '#ffffff', '#808080', '2024-02-19 12:19:04', '2024-02-19 12:19:04'),
(2, '#000000', '#ffffff', '#808080', '2024-02-19 12:26:55', '2024-02-19 12:26:55'),
(3, '#000000', '#ffffff', '#808080', '2024-02-19 12:34:59', '2024-02-19 12:34:59'),
(4, '#000000', '#ffffff', '#808080', '2024-02-19 12:42:06', '2024-02-19 12:42:06'),
(5, '#000000', '#ffffff', '#808080', '2024-02-19 12:50:45', '2024-02-19 12:50:45'),
(6, '#000000', '#ffffff', '#808080', '2024-02-19 13:01:39', '2024-02-19 13:01:39'),
(7, '#000000', '#ffffff', '#808080', '2024-02-19 13:02:26', '2024-02-19 13:02:26'),
(8, '#000000', '#ffffff', '#808080', '2024-02-19 13:04:16', '2024-02-19 13:04:16'),
(9, '#000000', '#ffffff', '#808080', '2024-02-19 13:06:29', '2024-02-19 13:06:29'),
(10, '#000000', '#ffffff', '#808080', '2024-02-19 13:07:29', '2024-02-19 13:07:29'),
(11, '#000000', '#ffffff', '#808080', '2024-02-19 13:08:53', '2024-02-19 13:08:53'),
(12, '#000000', '#ffffff', '#808080', '2024-02-19 13:10:06', '2024-02-19 13:10:06'),
(13, '#000000', '#ffffff', '#808080', '2024-02-19 13:10:41', '2024-02-19 13:10:41'),
(14, '#000000', '#ffffff', '#808080', '2024-02-19 13:11:51', '2024-02-19 13:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `likes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `site_id`, `parent_id`, `user_id`, `comment`, `likes`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 1, 'for more information , comments !!!!! have a  great times !!', 0, '2024-02-19 12:30:15', '2024-02-19 12:30:15'),
(2, 1, NULL, 1, 'Pour en apprendre plus sur le choix de carte mère et les mises à jour du BIOS qui peuvent être nécessaires, consultez notre tutoriel: comment choisir sa carte mère de PC gaming. !!!', 0, '2024-02-19 12:30:49', '2024-02-19 12:30:49'),
(3, 1, 2, 2, 'great blog ,, thank you :)', 0, '2024-02-19 12:38:54', '2024-02-19 12:38:54'),
(4, 1, NULL, 2, 'i lovet !!!!!!!!11', 0, '2024-02-19 12:39:09', '2024-02-19 12:39:09'),
(5, 2, 1, 2, 'mm mmmm  not good blog , just copy past bro  !!!', 0, '2024-02-19 12:39:48', '2024-02-19 12:39:48'),
(6, 3, NULL, 2, 'Le profil permet de limiter ou non ce que la personne distante peut faire sur le PC contrôlé. !!!', 0, '2024-02-19 12:40:23', '2024-02-19 12:40:23'),
(8, 5, NULL, 3, 'Pour la formation pendant le temps de travail, l’accord de votre employeur est requis', 0, '2024-02-19 12:52:47', '2024-02-19 12:52:47'),
(9, 1, NULL, 3, 'repérez la version actuelle du BIOS, indiquée à la section [Version du BIOS/Date]. Ici, la version de BIOS est la 1.60.', 0, '2024-02-19 12:53:18', '2024-02-19 12:53:18'),
(10, 1, 4, 3, 'hello Asta', 0, '2024-02-19 12:53:46', '2024-02-19 12:53:46'),
(11, 1, 4, 3, 'i say helloooo  !! :(', 0, '2024-02-19 12:54:00', '2024-02-19 12:54:00'),
(12, 2, NULL, 3, 'incompatibles avec certaines cartes mères ou certains chipset, malgré le fait que les deux soient de même génération.', 0, '2024-02-19 12:54:38', '2024-02-19 12:54:38'),
(13, 2, 1, 3, 'En revanche, le chipset x570, sortit en même temps que le B550, est lui rétrocompatible avec les deux types.', 0, '2024-02-19 12:54:49', '2024-02-19 12:54:49'),
(14, 3, 6, 3, 'Appuyez alors sur la touche « Entrer » de votre clavier pour lancer une invitation à votre interlocuteur.', 0, '2024-02-19 12:55:08', '2024-02-19 12:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `design_templates`
--

CREATE TABLE `design_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_type` enum('vertical_menu','horizontal_menu','burger_menu') NOT NULL DEFAULT 'vertical_menu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `design_templates`
--

INSERT INTO `design_templates` (`id`, `template_type`, `created_at`, `updated_at`) VALUES
(1, 'horizontal_menu', '2024-02-19 12:19:04', '2024-02-19 12:19:04'),
(2, 'burger_menu', '2024-02-19 12:26:55', '2024-02-19 12:26:55'),
(3, 'vertical_menu', '2024-02-19 12:34:59', '2024-02-19 12:34:59'),
(4, 'horizontal_menu', '2024-02-19 12:42:06', '2024-02-19 12:42:06'),
(5, 'horizontal_menu', '2024-02-19 12:50:45', '2024-02-19 12:50:45'),
(6, 'horizontal_menu', '2024-02-19 13:01:39', '2024-02-19 13:01:39'),
(7, 'horizontal_menu', '2024-02-19 13:02:26', '2024-02-19 13:02:26'),
(8, 'horizontal_menu', '2024-02-19 13:04:16', '2024-02-19 13:04:16'),
(9, 'vertical_menu', '2024-02-19 13:06:29', '2024-02-19 13:06:29'),
(10, 'vertical_menu', '2024-02-19 13:07:29', '2024-02-19 13:07:29'),
(11, 'vertical_menu', '2024-02-19 13:08:53', '2024-02-19 13:08:53'),
(12, 'horizontal_menu', '2024-02-19 13:10:06', '2024-02-19 13:10:06'),
(13, 'horizontal_menu', '2024-02-19 13:10:41', '2024-02-19 13:10:41'),
(14, 'horizontal_menu', '2024-02-19 13:11:51', '2024-02-19 13:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_08_150952_create_design_templates_table', 1),
(6, '2024_02_08_151004_create_colors_table', 1),
(7, '2024_02_08_151008_create_sites_table', 1),
(8, '2024_02_08_151012_create_articles_table', 1),
(9, '2024_02_08_151016_create_comments_table', 1),
(10, '2024_02_12_103646_create_site_visits_table', 1),
(11, '2024_02_12_104310_create_reactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `site_builder_id` bigint(20) UNSIGNED NOT NULL,
  `reaction_type` enum('like','dislike','love') NOT NULL DEFAULT 'like',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `site_id`, `user_id`, `site_builder_id`, `reaction_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'love', '2024-02-19 12:23:52', '2024-02-19 12:23:52'),
(2, 2, 1, 1, 'love', '2024-02-19 12:29:41', '2024-02-19 12:29:41'),
(3, 1, 2, 1, 'love', '2024-02-19 12:38:28', '2024-02-19 12:38:28'),
(4, 2, 2, 1, 'dislike', '2024-02-19 12:39:27', '2024-02-19 12:39:27'),
(5, 3, 2, 2, 'like', '2024-02-19 12:40:02', '2024-02-19 12:40:02'),
(7, 5, 3, 3, 'like', '2024-02-19 12:52:52', '2024-02-19 12:52:52'),
(8, 1, 3, 1, 'like', '2024-02-19 12:53:08', '2024-02-19 12:57:20'),
(9, 3, 3, 2, 'dislike', '2024-02-19 12:55:15', '2024-02-19 12:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `site_builder` text DEFAULT NULL,
  `Visitors` int(11) NOT NULL DEFAULT 0,
  `site_title` text NOT NULL,
  `introduction` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `BasicImage` varchar(255) DEFAULT NULL,
  `tags` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `design_template_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `user_id`, `site_builder`, `Visitors`, `site_title`, `introduction`, `logo`, `BasicImage`, `tags`, `link`, `design_template_id`, `color_id`, `is_public`, `is_accepted`, `created_at`, `updated_at`) VALUES
(1, 1, 'chaker yaakoub', 0, 'Mettre à jour le BIOS de sa carte mère en toute sécurité', 'Mettre à jour le firmware (BIOS ou UEFI) de sa carte mère, est une opération qui peut s’avérer délicate.\r\n\r\nÀ l’aide de ce tutoriel simple mais détaillé, vous apprendrez comment « flasher le BIOS » de votre carte mère en toute sécurité, sur PC portable ou sur PC de bureau.\r\n\r\nÉvidemment, nous prendrons soin de préciser les différences qui existent entre les marques principales de carte mère et de constructeurs (Asus, MSI, Gygabite, DELL, HP, Acer…).\r\n\r\nQue vous ayez fait monter votre PC à partir de pièces détachées, ou bien qu’il ait été acheté déjà assemblé, ce tutoriel exhaustif vous apportera l’expertise nécessaire !', 'sites/general/tUMGf4FcSxkbseH8IubM0kcvVZQCOIFtjTGQolrx.webp', 'sites/general/7uo7IArZJEZAPCKiKWz3Z3aNoEnbYJ3wYCxYGkwQ.webp', 'Google BIOS  Info', 'http://', 1, 1, 0, 1, '2024-02-19 12:19:04', '2024-02-19 12:19:04'),
(2, 1, 'chaker yaakoub', 0, 'Choisir son processeur de PC', 'Cet article est fait pour vous si vous êtes à la recherche du processeur parfait, mais ne savez pas par où commencer. Adapté aux débutants, vous y trouverez tout le nécessaire, ainsi que des liens vers de nombreuses ressources pour aller plus loin. \r\n\r\nVous retrouvez également ici et là les liens vers nos autres articles de la même série, pour vous aider dans le choix de chacun de vos composants PC.\r\n\r\nNous verrons donc dans cet article:\r\n\r\nComment choisir un processeur compatible avec précision.\r\nQuel processeur pour quel type d’utilisation, avec présentation des gammes de processeurs.\r\nComment effectuer un comparatif de performances depuis un site de benchs indépendant.\r\nComprendre la nomenclature des processeurs AMD et Intel (les noms/numéros).', 'sites/general/1oSLh4Yar8amBZCAZFzSI71KP9Dcbmrjn34EeMkv.png', 'sites/general/XuEZPA8KkhOV1JAZVUzVE917VWLLlO1SYnTTi0OF.png', 'processeur PC intel', 'http://', 2, 2, 0, 1, '2024-02-19 12:26:55', '2024-02-19 12:26:55'),
(3, 2, 'Asta Djam', 0, 'Installer et utiliser AnyDesk 7.1', 'Ce tutoriel pour débutant apprend à installer et utiliser AnyDesk sur Windows et MAC. En quelques étapes, vous pourrez vous connecter à votre partenaire ou recevoir une téléassistance informatique.\r\n\r\nAutres logiciels similaires: \r\n\r\nInstaller et utiliser TeamViewer.\r\nUtiliser “Assistance Rapide” sur Windows 11.\r\nVoir notre service:  assistance informatique en ligne.', 'sites/general/ktWsfyYz1WNClNh2AzQO7vIArnM0T5lnAtZMBXOC.jpg', 'sites/general/28i81e6KMLnmQQRalATLSM4GQVK1jifAZDb5kz56.webp', 'google info  software', 'http://', 11, 11, 0, 1, '2024-02-19 12:34:59', '2024-02-19 13:08:53'),
(5, 3, 'Paul  knaier', 0, 'Comment envisager une reconversion professionnelle', 'Selon une étude réalisée par Opinion Way pour l’Agence nationale pour la formation professionnelle des adultes, plus de la moitié des employés ont déjà changé de métier ou de secteur d’activité. La reconversion professionnelle concerne ainsi une part importante de la population active. C’est une étape normale dans un parcours professionnel. Ce projet a toutefois un coût et prend du temps. Vous avez en revanche plusieurs options pour financer votre changement de carrière, dont le Compte Personnel de Formation ou CPF. Découvrez dans ce guide les conseils pour réussir votre projet de reconversion professionnelle.', 'sites/general/aAXpJNnRGJs7S1AuTNVmFmIENMzKeyOJrHG0g0Li.jpg', 'sites/general/MmutZ3CMGjOWRHG0AObxPH8FHd3ioUBidAlm2eYV.jpg', 'professionnelle Opinion  laravel', 'http://', 5, 5, 0, 1, '2024-02-19 12:50:45', '2024-02-19 12:50:45'),
(6, 2, 'Asta Djam', 0, 'Créer et utiliser une clé USB d’installation de Windows 11', 'Vous êtes un professionnel, une association informatique, ou une collectivité territoriale et vous cherchez à créer un atelier informatique, mais voilà : la création du support de cours est une tâche complexe et chronophage', 'sites/general/0EZmrBftXOF213usQ3G3su08YEOMMFXLIXIiHl3v.png', 'sites/general/90SgpeyPE91kMm4gWNPDKGFblfttDvLAOJ9EwgzW.jpg', 'google bard test', 'http://', 14, 14, 0, 1, '2024-02-19 13:11:51', '2024-02-19 13:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `site_visits`
--

CREATE TABLE `site_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `site_builder_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_visits`
--

INSERT INTO `site_visits` (`id`, `site_id`, `site_builder_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '127.0.0.1', '2024-02-19 12:23:34', '2024-02-19 12:23:34'),
(2, 2, 1, '127.0.0.1', '2024-02-19 12:29:10', '2024-02-19 12:29:10'),
(3, 3, 2, '127.0.0.1', '2024-02-19 12:38:03', '2024-02-19 12:38:03'),
(5, 5, 3, '127.0.0.1', '2024-02-19 12:52:29', '2024-02-19 12:52:29'),
(6, 6, 2, '127.0.0.1', '2024-02-19 13:13:21', '2024-02-19 13:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chaker yaakoub', 'user@hotmail.com', NULL, '$2y$12$rx8YE4Zg7sAWyRx0ymozTeQqC2/07CDcZPIU9RUdbRAHXA6wem0Tq', 0, NULL, '2024-02-19 12:15:07', '2024-02-19 12:15:07'),
(2, 'Asta Djam', 'user2@hotmail.com', NULL, '$2y$12$jh9O3CF7hAyfysXs0UVxlOp8vfwGgAmFzGVsbcwlrxV13d/mjunVy', 0, NULL, '2024-02-19 12:31:31', '2024-02-19 12:31:31'),
(3, 'Paul  knaier', 'user3@hotmail.com', NULL, '$2y$12$zIAfmNN1F0kPJxdjpFEJcevdo2QVCvXxwldU1hO4j/lxq3P358x0y', 0, NULL, '2024-02-19 12:48:12', '2024-02-19 12:48:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_site_id_foreign` (`site_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_site_id_foreign` (`site_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `design_templates`
--
ALTER TABLE `design_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reactions_site_id_user_id_unique` (`site_id`,`user_id`),
  ADD KEY `reactions_user_id_foreign` (`user_id`),
  ADD KEY `reactions_site_builder_id_foreign` (`site_builder_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sites_user_id_foreign` (`user_id`),
  ADD KEY `sites_design_template_id_foreign` (`design_template_id`),
  ADD KEY `sites_color_id_foreign` (`color_id`);

--
-- Indexes for table `site_visits`
--
ALTER TABLE `site_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_visits_site_id_foreign` (`site_id`),
  ADD KEY `site_visits_site_builder_id_foreign` (`site_builder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `design_templates`
--
ALTER TABLE `design_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_visits`
--
ALTER TABLE `site_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_site_builder_id_foreign` FOREIGN KEY (`site_builder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reactions_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sites_design_template_id_foreign` FOREIGN KEY (`design_template_id`) REFERENCES `design_templates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `site_visits`
--
ALTER TABLE `site_visits`
  ADD CONSTRAINT `site_visits_site_builder_id_foreign` FOREIGN KEY (`site_builder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `site_visits_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
