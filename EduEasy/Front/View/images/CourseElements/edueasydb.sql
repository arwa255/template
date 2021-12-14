-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 déc. 2021 à 18:45
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edueasydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Adem', 'adem@esprit.tn', 'esprit', 'avatar-7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

CREATE TABLE `administrator` (
  `userId` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`userId`, `userName`, `email`, `password`, `registrationDate`) VALUES
('2021ADM0', 'administrator', 'miguelonana1234@gmail.com', '$2y$10$OHeTJ2jC9v7c7..5zax51.mMJdGGjF2iNLBSpH3EIw9XGo0cLXGuW', '2021-11-30');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`) VALUES
(124, 'Offre Silver', '350', 'saxophone.jpg', 1, '350', '');

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `Identifiant` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `Date_activation` date NOT NULL,
  `Date_expiration` date NOT NULL,
  `nbptn` int(11) NOT NULL,
  `idclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `category` varchar(255) CHARACTER SET latin1 NOT NULL,
  `course_id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`id`, `nom`, `category`, `course_id`, `file`) VALUES
(0, 'Rourou', 'Math', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `free` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `numberOfStudentsRegistered` int(11) NOT NULL DEFAULT 0,
  `numberOfLikes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `teacher`, `teacher_image`, `free`, `image`, `numberOfStudentsRegistered`, `numberOfLikes`) VALUES
(1, 'C Programming', 'Programming and Computer Science', '2021TEA0', 't-5.jpg', 0, 'cu-1.jpg', 0, 0),
(2, 'Maths', 'Mathemathics', '2021TEA1', 't-5.jpg', 1, 'cu-1.jpg', 0, 0),
(7, 'projet web', 'php', '2021TEA0', 'favicon.png', 1, 'logo-2.png', 0, 0),
(8, 'test course', 'test ', '2021TEA0', 'favicon.png', 1, 'favicon.png', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `followcourse`
--

CREATE TABLE `followcourse` (
  `userId` varchar(255) NOT NULL,
  `courseId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `likecourse`
--

CREATE TABLE `likecourse` (
  `userId` varchar(255) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cr_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `cr_date`, `status`) VALUES
(5, 'Adem', 'Adem@esprit.tn', '2021-11-18 12:20:22', 0),
(5, 'Adem', 'Adem@esprit.tn', '2021-11-18 12:20:22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `number` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dateReceived` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`number`, `type`, `message`, `dateReceived`, `status`) VALUES
(2, 'delatedAccount', 'User Account Delated.  teacher, Adrien with User Id: 2021STU1 has deleted his EduEasy.', '2021-12-09 18:48:44', 'read'),
(3, 'delatedAccount', 'User Account Delated.  student, Adrien with User Id: 2021STU1 has deleted his EduEasy.', '2021-12-09 18:54:27', 'read');

-- --------------------------------------------------------

--
-- Structure de la table `onlineusers`
--

CREATE TABLE `onlineusers` (
  `userId` varchar(255) NOT NULL,
  `loginTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `coption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `question_number`, `is_correct`, `coption`) VALUES
(101, 1, 1, 'A. châtain clair'),
(102, 1, 0, 'B. châtains clair'),
(103, 1, 0, 'C. châtains clairs'),
(104, 2, 0, 'A. marrons'),
(105, 2, 1, 'B. bleus'),
(106, 2, 0, 'C. oranges'),
(107, 3, 0, 'A. acheté'),
(108, 3, 0, 'B. achetée'),
(109, 3, 1, 'C. achetées'),
(110, 4, 1, 'A. coffre-fort'),
(111, 4, 0, 'B. coffres-forts'),
(112, 4, 0, 'C. coffres-fort'),
(113, 5, 0, 'A. est'),
(114, 5, 1, 'B. soit'),
(115, 5, 0, 'C. a'),
(116, 6, 0, 'A'),
(117, 6, 1, '8'),
(118, 6, 0, '6');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(7, 'fgb', 'fffg@ghgg.com', '85565', 'gfggg', 'netbanking', 'Offre math(1)', '60'),
(8, 'ukkcj', 'hsjs@hjdjj', '444', 'ddd', 'netbanking', 'Offre Silver(1), Offre Silver(1)', '700');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(11) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `prix_prod` int(11) NOT NULL,
  `img_prod` varchar(200) NOT NULL,
  `quantite` int(11) NOT NULL,
  `code_prod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `nom_prod`, `prix_prod`, `img_prod`, `quantite`, `code_prod`) VALUES
(1, 'Offre Chimie', 200, 'aa.jpg', 0, ''),
(6, 'Offre math', 60, 'bombarde.jpg', 0, ''),
(7, 'Offre svt', 90, 'basson.jpg', 0, ''),
(8, 'Offre Silver', 350, 'saxophone.jpg', 0, ''),
(9, 'Offre Gold', 39, 'hot.jpg', 0, ''),
(10, 'Offre Pack', 170, 'caisse.jpg', 0, ''),
(11, 'Offre Physique', 392, 'bass drum.jpg', 0, ''),
(12, 'Offre Alpha', 2, 'gon.jpg', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question_id`, `question_number`, `question_text`) VALUES
(35, 1, 'J’ai des cheveux …'),
(36, 2, '2. Elle a acheté des rideaux …'),
(37, 3, '3. Les pommes qu’elle a … sont trop mûres.'),
(38, 4, '4. Dans les chambres d’hôtel, il y a souvent des …'),
(39, 5, '5. Je ne pense pas qu’il … malade.'),
(40, 6, 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `res` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `uid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `result`
--

INSERT INTO `result` (`id`, `fname`, `lname`, `email`, `res`, `date`, `uid`) VALUES
(38, 'abdoua', 'eag', 'tik@tak.tik', 2, '2021-12-04', 7802),
(39, 'boubou', 'zaef', 'vsdv@qsd.fqsd', 0, '2021-12-04', 9063),
(41, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 0, '2021-12-07', 69847),
(43, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 1, '2021-12-07', 63258),
(44, 'ARWA', 'ALI', 'ARWA.ali@esprit.tn', 3, '2021-12-07', 38213),
(45, 'adem', 'jannen', 'adem.janen@esprit.tn', 1, '2021-12-07', 537),
(46, 'bou', 'ali', 'bou@hghjv.com', 3, '2021-12-07', 7490),
(47, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 7, '2021-12-07', 95568),
(48, 'SJ', 'dfdf', 'damergi45@gmail.com', 3, '2021-12-07', 9530),
(49, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 3, '2021-12-07', 7544),
(50, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 5, '2021-12-09', 1764),
(51, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 0, '2021-12-12', 54371),
(52, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 0, '2021-12-12', 4892),
(53, 'Mehdi', 'Damergi55', 'damergi45@gmail.com', 0, '2021-12-12', 6087),
(54, 'gjgjg', 'yyuryr', 'miguelstephane.onana@esprit.tn', 4, '2021-12-12', 38301);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `userId` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL,
  `nbCoursesFollowed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`userId`, `userName`, `email`, `password`, `registrationDate`, `nbCoursesFollowed`) VALUES
('2021STU0', 'ONANA Miguel Stephane', 'miguelstephane.onana@esprit.tn', '$2y$10$KU1r964.J94kkodF9Uj21ecbSAzKTV2Pg96FTWtRXiR3jqxPtinOu', '2021-11-30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `secret` varchar(255) NOT NULL,
  `avator` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email`, `about`, `secret`, `avator`) VALUES
('11677109', 'Jamie', 'Belcher', 'leezbeez69@gmail.com', 'Selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate. Listicle meditation paleo, drinking vinegar sint direct trade.', '$2y$10$I5q0Wl4YTaR5Z4ddpPK80OwtmauNy9Ezu8kUI6t/lWtAZORl.8ItK', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `code` longtext NOT NULL,
  `create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_blog_posts`
--

CREATE TABLE `tbl_blog_posts` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pub_date` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `views` int(255) NOT NULL DEFAULT 0,
  `media` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `short_desc` longtext NOT NULL,
  `yt_video` varchar(255) NOT NULL,
  `tags` longtext NOT NULL,
  `visibility` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_blog_posts`
--

INSERT INTO `tbl_blog_posts` (`id`, `title`, `pub_date`, `category`, `views`, `media`, `content`, `short_desc`, `yt_video`, `tags`, `visibility`) VALUES
(1, 'Test Article', 'December 12, 2021', '1', 1, 'blog_post582.png', '<b></b><b>svsfsfs</b><b></b><b></b><br>', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'https://www.youtube.com/watch?v=AtVPsPct4KM', '#test', 1),
(2, 'Test 3', 'December 12, 2021', '3', 1, 'blog_post351.png', 'uglsadvadskjvgsuvnvk;dshuvnvklds;hvidsbvkvbwjgwuibwvksdbvjsdgvdsnvs;abvskjvg w;vivbv\'nvsdnvksdvhiubwkjbvdsgvwebvwkjbvdskjgvudsiv', 'test dsucbadsjcbiaubfvwc dsilgvvnwvkbgwvhwvbwnevhdsvndsvbwiuvhwnvwvhwv8hwfvewklnfwiahvwafnawvbwhvwnafwvuwhvwvwnvkbwviudbsvkw vdbsvuibvkv diusgvwvvnds;vhwvklwbv;wbwv wmlvnwivhn;sadihwkwnvihvwvkwj;vw;n', 'https://youtu.be/MivCFC6cmnQ', '#test #test #test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_blog_views`
--

CREATE TABLE `tbl_blog_views` (
  `id` int(50) NOT NULL,
  `article` varchar(255) NOT NULL,
  `v_date` varchar(255) NOT NULL,
  `country_domain` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `cords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_blog_views`
--

INSERT INTO `tbl_blog_views` (`id`, `article`, `v_date`, `country_domain`, `country`, `ip_address`, `cords`) VALUES
(1, '1', '2021-12-12', 'N/A', 'N/A', '::1', 'N/A'),
(2, '2', '2021-12-12', 'N/A', 'N/A', '::1', 'N/A');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `create_date`, `status`) VALUES
(1, 'Test Category', '12 December 2021 02:34:23 PM', 'Active'),
(2, 'Test Category 2', '12 December 2021 04:25:36 PM', 'Active'),
(3, 'Test 3', '12 December 2021 05:29:26 PM', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cords`
--

CREATE TABLE `tbl_cords` (
  `country` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_cords`
--

INSERT INTO `tbl_cords` (`country`, `latitude`, `longitude`, `name`) VALUES
('AD', '42.546245', '1.601554', 'Andorra'),
('AE', '23.424076', '53.847818', 'United Arab Emirates'),
('AF', '33.93911', '67.709953', 'Afghanistan'),
('AG', '17.060816', '-61.796428', 'Antigua and Barbuda'),
('AI', '18.220554', '-63.068615', 'Anguilla'),
('AL', '41.153332', '20.168331', 'Albania'),
('AM', '40.069099', '45.038189', 'Armenia'),
('AN', '12.226079', '-69.060087', 'Netherlands Antilles'),
('AO', '-11.202692', '17.873887', 'Angola'),
('AQ', '-75.250973', '-0.071389', 'Antarctica'),
('AR', '-38.416097', '-63.616672', 'Argentina'),
('AS', '-14.270972', '-170.132217', 'American Samoa'),
('AT', '47.516231', '14.550072', 'Austria'),
('AU', '-25.274398', '133.775136', 'Australia'),
('AW', '12.52111', '-69.968338', 'Aruba'),
('AZ', '40.143105', '47.576927', 'Azerbaijan'),
('BA', '43.915886', '17.679076', 'Bosnia and Herzegovina'),
('BB', '13.193887', '-59.543198', 'Barbados'),
('BD', '23.684994', '90.356331', 'Bangladesh'),
('BE', '50.503887', '4.469936', 'Belgium'),
('BF', '12.238333', '-1.561593', 'Burkina Faso'),
('BG', '42.733883', '25.48583', 'Bulgaria'),
('BH', '25.930414', '50.637772', 'Bahrain'),
('BI', '-3.373056', '29.918886', 'Burundi'),
('BJ', '9.30769', '2.315834', 'Benin'),
('BM', '32.321384', '-64.75737', 'Bermuda'),
('BN', '4.535277', '114.727669', 'Brunei'),
('BO', '-16.290154', '-63.588653', 'Bolivia'),
('BR', '-14.235004', '-51.92528', 'Brazil'),
('BS', '25.03428', '-77.39628', 'Bahamas'),
('BT', '27.514162', '90.433601', 'Bhutan'),
('BV', '-54.423199', '3.413194', 'Bouvet Island'),
('BW', '-22.328474', '24.684866', 'Botswana'),
('BY', '53.709807', '27.953389', 'Belarus'),
('BZ', '17.189877', '-88.49765', 'Belize'),
('CA', '56.130366', '-106.346771', 'Canada'),
('CC', '-12.164165', '96.870956', 'Cocos [Keeling] Islands'),
('CD', '-4.038333', '21.758664', 'Congo [DRC]'),
('CF', '6.611111', '20.939444', 'Central African Republic'),
('CG', '-0.228021', '15.827659', 'Congo [Republic]'),
('CH', '46.818188', '8.227512', 'Switzerland'),
('CI', '7.539989', '-5.54708', 'Côte d\'Ivoire'),
('CK', '-21.236736', '-159.777671', 'Cook Islands'),
('CL', '-35.675147', '-71.542969', 'Chile'),
('CM', '7.369722', '12.354722', 'Cameroon'),
('CN', '35.86166', '104.195397', 'China'),
('CO', '4.570868', '-74.297333', 'Colombia'),
('country', 'latitude', 'longitude', 'name'),
('CR', '9.748917', '-83.753428', 'Costa Rica'),
('CU', '21.521757', '-77.781167', 'Cuba'),
('CV', '16.002082', '-24.013197', 'Cape Verde'),
('CX', '-10.447525', '105.690449', 'Christmas Island'),
('CY', '35.126413', '33.429859', 'Cyprus'),
('CZ', '49.817492', '15.472962', 'Czech Republic'),
('DE', '51.165691', '10.451526', 'Germany'),
('DJ', '11.825138', '42.590275', 'Djibouti'),
('DK', '56.26392', '9.501785', 'Denmark'),
('DM', '15.414999', '-61.370976', 'Dominica'),
('DO', '18.735693', '-70.162651', 'Dominican Republic'),
('DZ', '28.033886', '1.659626', 'Algeria'),
('EC', '-1.831239', '-78.183406', 'Ecuador'),
('EE', '58.595272', '25.013607', 'Estonia'),
('EG', '26.820553', '30.802498', 'Egypt'),
('EH', '24.215527', '-12.885834', 'Western Sahara'),
('ER', '15.179384', '39.782334', 'Eritrea'),
('ES', '40.463667', '-3.74922', 'Spain'),
('ET', '9.145', '40.489673', 'Ethiopia'),
('FI', '61.92411', '25.748151', 'Finland'),
('FJ', '-16.578193', '179.414413', 'Fiji'),
('FK', '-51.796253', '-59.523613', 'Falkland Islands [Islas Malvinas]'),
('FM', '7.425554', '150.550812', 'Micronesia'),
('FO', '61.892635', '-6.911806', 'Faroe Islands'),
('FR', '46.227638', '2.213749', 'France'),
('GA', '-0.803689', '11.609444', 'Gabon'),
('GB', '55.378051', '-3.435973', 'United Kingdom'),
('GD', '12.262776', '-61.604171', 'Grenada'),
('GE', '42.315407', '43.356892', 'Georgia'),
('GF', '3.933889', '-53.125782', 'French Guiana'),
('GG', '49.465691', '-2.585278', 'Guernsey'),
('GH', '7.946527', '-1.023194', 'Ghana'),
('GI', '36.137741', '-5.345374', 'Gibraltar'),
('GL', '71.706936', '-42.604303', 'Greenland'),
('GM', '13.443182', '-15.310139', 'Gambia'),
('GN', '9.945587', '-9.696645', 'Guinea'),
('GP', '16.995971', '-62.067641', 'Guadeloupe'),
('GQ', '1.650801', '10.267895', 'Equatorial Guinea'),
('GR', '39.074208', '21.824312', 'Greece'),
('GS', '-54.429579', '-36.587909', 'South Georgia and the South Sandwich Islands'),
('GT', '15.783471', '-90.230759', 'Guatemala'),
('GU', '13.444304', '144.793731', 'Guam'),
('GW', '11.803749', '-15.180413', 'Guinea-Bissau'),
('GY', '4.860416', '-58.93018', 'Guyana'),
('GZ', '31.354676', '34.308825', 'Gaza Strip'),
('HK', '22.396428', '114.109497', 'Hong Kong'),
('HM', '-53.08181', '73.504158', 'Heard Island and McDonald Islands'),
('HN', '15.199999', '-86.241905', 'Honduras'),
('HR', '45.1', '15.2', 'Croatia'),
('HT', '18.971187', '-72.285215', 'Haiti'),
('HU', '47.162494', '19.503304', 'Hungary'),
('ID', '-0.789275', '113.921327', 'Indonesia'),
('IE', '53.41291', '-8.24389', 'Ireland'),
('IL', '31.046051', '34.851612', 'Israel'),
('IM', '54.236107', '-4.548056', 'Isle of Man'),
('IN', '20.593684', '78.96288', 'India'),
('IO', '-6.343194', '71.876519', 'British Indian Ocean Territory'),
('IQ', '33.223191', '43.679291', 'Iraq'),
('IR', '32.427908', '53.688046', 'Iran'),
('IS', '64.963051', '-19.020835', 'Iceland'),
('IT', '41.87194', '12.56738', 'Italy'),
('JE', '49.214439', '-2.13125', 'Jersey'),
('JM', '18.109581', '-77.297508', 'Jamaica'),
('JO', '30.585164', '36.238414', 'Jordan'),
('JP', '36.204824', '138.252924', 'Japan'),
('KE', '-0.023559', '37.906193', 'Kenya'),
('KG', '41.20438', '74.766098', 'Kyrgyzstan'),
('KH', '12.565679', '104.990963', 'Cambodia'),
('KI', '-3.370417', '-168.734039', 'Kiribati'),
('KM', '-11.875001', '43.872219', 'Comoros'),
('KN', '17.357822', '-62.782998', 'Saint Kitts and Nevis'),
('KP', '40.339852', '127.510093', 'North Korea'),
('KR', '35.907757', '127.766922', 'South Korea'),
('KW', '29.31166', '47.481766', 'Kuwait'),
('KY', '19.513469', '-80.566956', 'Cayman Islands'),
('KZ', '48.019573', '66.923684', 'Kazakhstan'),
('LA', '19.85627', '102.495496', 'Laos'),
('LB', '33.854721', '35.862285', 'Lebanon'),
('LC', '13.909444', '-60.978893', 'Saint Lucia'),
('LI', '47.166', '9.555373', 'Liechtenstein'),
('LK', '7.873054', '80.771797', 'Sri Lanka'),
('LR', '6.428055', '-9.429499', 'Liberia'),
('LS', '-29.609988', '28.233608', 'Lesotho'),
('LT', '55.169438', '23.881275', 'Lithuania'),
('LU', '49.815273', '6.129583', 'Luxembourg'),
('LV', '56.879635', '24.603189', 'Latvia'),
('LY', '26.3351', '17.228331', 'Libya'),
('MA', '31.791702', '-7.09262', 'Morocco'),
('MC', '43.750298', '7.412841', 'Monaco'),
('MD', '47.411631', '28.369885', 'Moldova'),
('ME', '42.708678', '19.37439', 'Montenegro'),
('MG', '-18.766947', '46.869107', 'Madagascar'),
('MH', '7.131474', '171.184478', 'Marshall Islands'),
('MK', '41.608635', '21.745275', 'Macedonia [FYROM]'),
('ML', '17.570692', '-3.996166', 'Mali'),
('MM', '21.913965', '95.956223', 'Myanmar [Burma]'),
('MN', '46.862496', '103.846656', 'Mongolia'),
('MO', '22.198745', '113.543873', 'Macau'),
('MP', '17.33083', '145.38469', 'Northern Mariana Islands'),
('MQ', '14.641528', '-61.024174', 'Martinique'),
('MR', '21.00789', '-10.940835', 'Mauritania'),
('MS', '16.742498', '-62.187366', 'Montserrat'),
('MT', '35.937496', '14.375416', 'Malta'),
('MU', '-20.348404', '57.552152', 'Mauritius'),
('MV', '3.202778', '73.22068', 'Maldives'),
('MW', '-13.254308', '34.301525', 'Malawi'),
('MX', '23.634501', '-102.552784', 'Mexico'),
('MY', '4.210484', '101.975766', 'Malaysia'),
('MZ', '-18.665695', '35.529562', 'Mozambique'),
('NA', '-22.95764', '18.49041', 'Namibia'),
('NC', '-20.904305', '165.618042', 'New Caledonia'),
('NE', '17.607789', '8.081666', 'Niger'),
('NF', '-29.040835', '167.954712', 'Norfolk Island'),
('NG', '9.081999', '8.675277', 'Nigeria'),
('NI', '12.865416', '-85.207229', 'Nicaragua'),
('NL', '52.132633', '5.291266', 'Netherlands'),
('NO', '60.472024', '8.468946', 'Norway'),
('NP', '28.394857', '84.124008', 'Nepal'),
('NR', '-0.522778', '166.931503', 'Nauru'),
('NU', '-19.054445', '-169.867233', 'Niue'),
('NZ', '-40.900557', '174.885971', 'New Zealand'),
('OM', '21.512583', '55.923255', 'Oman'),
('PA', '8.537981', '-80.782127', 'Panama'),
('PE', '-9.189967', '-75.015152', 'Peru'),
('PF', '-17.679742', '-149.406843', 'French Polynesia'),
('PG', '-6.314993', '143.95555', 'Papua New Guinea'),
('PH', '12.879721', '121.774017', 'Philippines'),
('PK', '30.375321', '69.345116', 'Pakistan'),
('PL', '51.919438', '19.145136', 'Poland'),
('PM', '46.941936', '-56.27111', 'Saint Pierre and Miquelon'),
('PN', '-24.703615', '-127.439308', 'Pitcairn Islands'),
('PR', '18.220833', '-66.590149', 'Puerto Rico'),
('PS', '31.952162', '35.233154', 'Palestinian Territories'),
('PT', '39.399872', '-8.224454', 'Portugal'),
('PW', '7.51498', '134.58252', 'Palau'),
('PY', '-23.442503', '-58.443832', 'Paraguay'),
('QA', '25.354826', '51.183884', 'Qatar'),
('RE', '-21.115141', '55.536384', 'Réunion'),
('RO', '45.943161', '24.96676', 'Romania'),
('RS', '44.016521', '21.005859', 'Serbia'),
('RU', '61.52401', '105.318756', 'Russia'),
('RW', '-1.940278', '29.873888', 'Rwanda'),
('SA', '23.885942', '45.079162', 'Saudi Arabia'),
('SB', '-9.64571', '160.156194', 'Solomon Islands'),
('SC', '-4.679574', '55.491977', 'Seychelles'),
('SD', '12.862807', '30.217636', 'Sudan'),
('SE', '60.128161', '18.643501', 'Sweden'),
('SG', '1.352083', '103.819836', 'Singapore'),
('SH', '-24.143474', '-10.030696', 'Saint Helena'),
('SI', '46.151241', '14.995463', 'Slovenia'),
('SJ', '77.553604', '23.670272', 'Svalbard and Jan Mayen'),
('SK', '48.669026', '19.699024', 'Slovakia'),
('SL', '8.460555', '-11.779889', 'Sierra Leone'),
('SM', '43.94236', '12.457777', 'San Marino'),
('SN', '14.497401', '-14.452362', 'Senegal'),
('SO', '5.152149', '46.199616', 'Somalia'),
('SR', '3.919305', '-56.027783', 'Suriname'),
('ST', '0.18636', '6.613081', 'São Tomé and Príncipe'),
('SV', '13.794185', '-88.89653', 'El Salvador'),
('SY', '34.802075', '38.996815', 'Syria'),
('SZ', '-26.522503', '31.465866', 'Swaziland'),
('TC', '21.694025', '-71.797928', 'Turks and Caicos Islands'),
('TD', '15.454166', '18.732207', 'Chad'),
('TF', '-49.280366', '69.348557', 'French Southern Territories'),
('TG', '8.619543', '0.824782', 'Togo'),
('TH', '15.870032', '100.992541', 'Thailand'),
('TJ', '38.861034', '71.276093', 'Tajikistan'),
('TK', '-8.967363', '-171.855881', 'Tokelau'),
('TL', '-8.874217', '125.727539', 'Timor-Leste'),
('TM', '38.969719', '59.556278', 'Turkmenistan'),
('TN', '33.886917', '9.537499', 'Tunisia'),
('TO', '-21.178986', '-175.198242', 'Tonga'),
('TR', '38.963745', '35.243322', 'Turkey'),
('TT', '10.691803', '-61.222503', 'Trinidad and Tobago'),
('TV', '-7.109535', '177.64933', 'Tuvalu'),
('TW', '23.69781', '120.960515', 'Taiwan'),
('TZ', '-6.369028', '34.888822', 'Tanzania'),
('UA', '48.379433', '31.16558', 'Ukraine'),
('UG', '1.373333', '32.290275', 'Uganda'),
('UM', '', '', 'U.S. Minor Outlying Islands'),
('US', '37.09024', '-95.712891', 'United States'),
('UY', '-32.522779', '-55.765835', 'Uruguay'),
('UZ', '41.377491', '64.585262', 'Uzbekistan'),
('VA', '41.902916', '12.453389', 'Vatican City'),
('VC', '12.984305', '-61.287228', 'Saint Vincent and the Grenadines'),
('VE', '6.42375', '-66.58973', 'Venezuela'),
('VG', '18.420695', '-64.639968', 'British Virgin Islands'),
('VI', '18.335765', '-64.896335', 'U.S. Virgin Islands'),
('VN', '14.058324', '108.277199', 'Vietnam'),
('VU', '-15.376706', '166.959158', 'Vanuatu'),
('WF', '-13.768752', '-177.156097', 'Wallis and Futuna'),
('WS', '-13.759029', '-172.104629', 'Samoa'),
('XK', '42.602636', '20.902977', 'Kosovo'),
('YE', '15.552727', '48.516388', 'Yemen'),
('YT', '-12.8275', '45.166244', 'Mayotte'),
('ZA', '-30.559482', '22.937506', 'South Africa'),
('ZM', '-13.133897', '27.849332', 'Zambia'),
('ZW', '-19.015438', '29.154857', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_login_sessions`
--

CREATE TABLE `tbl_login_sessions` (
  `id` int(50) NOT NULL,
  `sessi_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_reset_tokens`
--

CREATE TABLE `tbl_reset_tokens` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_smtp`
--

CREATE TABLE `tbl_smtp` (
  `server` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conn_type` varchar(255) NOT NULL,
  `conn_port` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_smtp`
--

INSERT INTO `tbl_smtp` (`server`, `username`, `password`, `conn_type`, `conn_port`, `sender_name`) VALUES
('server address', 'username@address.com', 'password', 'tls', '587', 'Jamie Belcher');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_social_links`
--

CREATE TABLE `tbl_social_links` (
  `id` int(50) NOT NULL,
  `social_network` varchar(255) NOT NULL,
  `profile_link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_timezones`
--

CREATE TABLE `tbl_timezones` (
  `id` int(255) NOT NULL,
  `continet` varchar(255) CHARACTER SET utf8 NOT NULL,
  `timezone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_timezones`
--

INSERT INTO `tbl_timezones` (`id`, `continet`, `timezone`, `pid`) VALUES
(1, 'Africa', 'Africa/Abidjan', 1),
(2, 'Africa', 'Africa/Addis_Ababa', 2),
(3, 'Africa', 'Africa/Accra', 3),
(4, 'Africa', 'Africa/Algiers', 4),
(5, 'Africa', 'Africa/Asmara', 5),
(6, 'Africa', 'Africa/Bamako', 6),
(7, 'Africa', 'Africa/Bangui', 7),
(8, 'Africa', 'Africa/Banjul', 8),
(9, 'Africa', 'Africa/Bissau', 9),
(10, 'Africa', 'Africa/Blantyre', 10),
(11, 'Africa', 'Africa/Brazzaville', 11),
(12, 'Africa', 'Africa/Bujumbura', 12),
(13, 'Africa', 'Africa/Cairo', 13),
(14, 'Africa', 'Africa/Casablanca', 14),
(15, 'Africa', 'Africa/Ceuta', 15),
(16, 'Africa', 'Africa/Conakry', 16),
(17, 'Africa', 'Africa/Dakar', 17),
(18, 'Africa', 'Africa/Dar_es_Salaam', 18),
(19, 'Africa', 'Africa/Djibouti', 19),
(20, 'Africa', 'Africa/Douala', 20),
(21, 'Africa', 'Africa/El_Aaiun', 21),
(22, 'Africa', 'Africa/Freetown', 22),
(23, 'Africa', 'Africa/Gaborone', 23),
(24, 'Africa', 'Africa/Harare', 24),
(25, 'Africa', 'Africa/Johannesburg', 25),
(26, 'Africa', 'Africa/Juba', 26),
(27, 'Africa', 'Africa/Kampala', 27),
(28, 'Africa', 'Africa/Khartoum', 28),
(29, 'Africa', 'Africa/Kigali', 29),
(30, 'Africa', 'Africa/Kinshasa', 30),
(31, 'Africa', 'Africa/Lagos', 31),
(32, 'Africa', 'Africa/Libreville', 32),
(33, 'Africa', 'Africa/Lome', 33),
(34, 'Africa', 'Africa/Luanda', 34),
(35, 'Africa', 'Africa/Lubumbashi', 35),
(36, 'Africa', 'Africa/Lusaka', 36),
(37, 'Africa', 'Africa/Malabo', 37),
(38, 'Africa', 'Africa/Maputo', 38),
(39, 'Africa', 'Africa/Maseru', 39),
(40, 'Africa', 'Africa/Mbabane', 40),
(41, 'Africa', 'Africa/Mogadishu', 41),
(42, 'Africa', 'Africa/Monrovia', 42),
(43, 'Africa', 'Africa/Nairobi', 43),
(44, 'Africa', 'Africa/Ndjamena', 44),
(45, 'Africa', 'Africa/Niamey', 45),
(46, 'Africa', 'Africa/Nouakchott', 46),
(47, 'Africa', 'Africa/Ouagadougou', 47),
(48, 'Africa', 'Africa/Porto-Novo', 48),
(49, 'Africa', 'Africa/Sao_Tome', 49),
(50, 'Africa', 'Africa/Tripoli', 50),
(51, 'Africa', 'Africa/Tunis', 51),
(52, 'Africa', 'Africa/Windhoek', 52),
(53, 'Antarctica', 'Antarctica/Casey', 53),
(54, 'Antarctica', 'Antarctica/Davis', 54),
(55, 'Antarctica', 'Antarctica/DumontDUrville', 55),
(56, 'Antarctica', 'Antarctica/Macquarie', 56),
(57, 'Antarctica', 'Antarctica/Mawson', 57),
(58, 'Antarctica', 'Antarctica/McMurdo', 58),
(59, 'Antarctica', 'Antarctica/Palmer', 59),
(60, 'Antarctica', 'Antarctica/Rothera', 60),
(61, 'Antarctica', 'Antarctica/Syowa', 61),
(62, 'Antarctica', 'Antarctica/Troll', 62),
(63, 'Antarctica', 'Antarctica/Vostok', 63),
(64, 'Arctic', 'Arctic/Longyearbyen', 64),
(65, 'Australia', 'Australia/Adelaide', 65),
(66, 'Australia', 'Australia/Brisbane', 66),
(67, 'Australia', 'Australia/Broken_Hill', 67),
(68, 'Australia', 'Australia/Currie', 68),
(69, 'Australia', 'Australia/Darwin', 69),
(70, 'Australia', 'Australia/Eucla', 70),
(71, 'Australia', 'Australia/Hobart', 71),
(72, 'Australia', 'Australia/Lindeman', 72),
(73, 'Australia', 'Australia/Lord_Howe', 73),
(74, 'Australia', 'Australia/Melbourne', 74),
(75, 'Australia', 'Australia/Perth', 75),
(76, 'Australia', 'Australia/Sydney', 76),
(77, 'Atlantic', 'Atlantic/Azores', 77),
(78, 'Atlantic', 'Atlantic/Bermuda', 78),
(79, 'Atlantic', 'Atlantic/Canary', 79),
(80, 'Atlantic', 'Atlantic/Cape_Verde', 80),
(81, 'Atlantic', 'Atlantic/Faroe', 81),
(82, 'Atlantic', 'Atlantic/Madeira', 82),
(83, 'Atlantic', 'Atlantic/Reykjavik', 83),
(84, 'Atlantic', 'Atlantic/South_Georgia', 84),
(85, 'Atlantic', 'Atlantic/St_Helena', 85),
(86, 'Atlantic', 'Atlantic/Stanley', 86),
(87, 'Indian', 'Indian/Antananarivo', 87),
(88, 'Indian', 'Indian/Chagos', 88),
(89, 'Indian', 'Indian/Christmas', 89),
(90, 'Indian', 'Indian/Cocos', 90),
(91, 'Indian', 'Indian/Comoro', 91),
(92, 'Indian', 'Indian/Kerguelen', 92),
(93, 'Indian', 'Indian/Mahe', 93),
(94, 'Indian', 'Indian/Maldives', 94),
(95, 'Indian', 'Indian/Mauritius', 95),
(96, 'Indian', 'Indian/Mayotte', 96),
(97, 'Indian', 'Indian/Reunion', 97),
(98, 'Pacific', 'Pacific/Apia', 98),
(99, 'Pacific', 'Pacific/Auckland', 99),
(100, 'Pacific', 'Pacific/Bougainville', 100),
(101, 'Pacific', 'Pacific/Chatham', 101),
(102, 'Pacific', 'Pacific/Chuuk', 102),
(103, 'Pacific', 'Pacific/Easter', 103),
(104, 'Pacific', 'Pacific/Efate', 104),
(105, 'Pacific', 'Pacific/Enderbury', 105),
(106, 'Pacific', 'Pacific/Fakaofo', 106),
(107, 'Pacific', 'Pacific/Fiji', 107),
(108, 'Pacific', 'Pacific/Funafuti', 108),
(109, 'Pacific', 'Pacific/Galapagos', 109),
(110, 'Pacific', 'Pacific/Gambier', 110),
(111, 'Pacific', 'Pacific/Guadalcanal', 111),
(112, 'Pacific', 'Pacific/Guam', 112),
(113, 'Pacific', 'Pacific/Honolulu', 113),
(114, 'Pacific', 'Pacific/Kiritimati', 114),
(115, 'Pacific', 'Pacific/Kosrae', 115),
(116, 'Pacific', 'Pacific/Kwajalein', 116),
(117, 'Pacific', 'Pacific/Majuro', 117),
(118, 'Pacific', 'Pacific/Marquesas', 118),
(119, 'Pacific', 'Pacific/Midway', 119),
(120, 'Pacific', 'Pacific/Nauru', 120),
(121, 'Pacific', 'Pacific/Niue', 121),
(122, 'Pacific', 'Pacific/Norfolk', 122),
(123, 'Pacific', 'Pacific/Noumea', 123),
(124, 'Pacific', 'Pacific/Pago_Pago', 124),
(125, 'Pacific', 'Pacific/Palau', 125),
(126, 'Pacific', 'Pacific/Pitcairn', 126),
(127, 'Pacific', 'Pacific/Pohnpei', 127),
(128, 'Pacific', 'Pacific/Port_Moresby', 128),
(129, 'Pacific', 'Pacific/Rarotonga', 129),
(130, 'Pacific', 'Pacific/Saipan', 130),
(131, 'Pacific', 'Pacific/Tahiti', 131),
(132, 'Pacific', 'Pacific/Tarawa', 132),
(133, 'Pacific', 'Pacific/Tongatapu', 133),
(134, 'Pacific', 'Pacific/Wake', 134),
(135, 'Pacific', 'Pacific/Wallis', 135),
(136, 'Europe', 'Europe/Amsterdam', 136),
(137, 'Europe', 'Europe/Andorra', 137),
(138, 'Europe', 'Europe/Astrakhan', 138),
(139, 'Europe', 'Europe/Athens', 139),
(140, 'Europe', 'Europe/Belgrade', 140),
(141, 'Europe', 'Europe/Berlin', 141),
(142, 'Europe', 'Europe/Bratislava', 142),
(143, 'Europe', 'Europe/Brussels', 143),
(144, 'Europe', 'Europe/Bucharest', 144),
(145, 'Europe', 'Europe/Budapest', 145),
(146, 'Europe', 'Europe/Busingen', 146),
(147, 'Europe', 'Europe/Chisinau', 147),
(148, 'Europe', 'Europe/Copenhagen', 148),
(149, 'Europe', 'Europe/Dublin', 149),
(150, 'Europe', 'Europe/Gibraltar', 150),
(151, 'Europe', 'Europe/Guernsey', 151),
(152, 'Europe', 'Europe/Helsinki', 152),
(153, 'Europe', 'Europe/Isle_of_Man', 153),
(154, 'Europe', 'Europe/Istanbul', 154),
(155, 'Europe', 'Europe/Jersey', 155),
(156, 'Europe', 'Europe/Kaliningrad', 156),
(157, 'Europe', 'Europe/Kiev', 157),
(158, 'Europe', 'Europe/Kirov', 158),
(159, 'Europe', 'Europe/Lisbon', 159),
(160, 'Europe', 'Europe/Ljubljana', 160),
(161, 'Europe', 'Europe/London', 161),
(162, 'Europe', 'Europe/Luxembourg', 162),
(163, 'Europe', 'Europe/Madrid', 163),
(164, 'Europe', 'Europe/Malta', 164),
(165, 'Europe', 'Europe/Mariehamn', 165),
(166, 'Europe', 'Europe/Minsk', 166),
(167, 'Europe', 'Europe/Monaco', 167),
(168, 'Europe', 'Europe/Moscow', 168),
(169, 'Europe', 'Europe/Oslo', 169),
(170, 'Europe', 'Europe/Paris', 170),
(171, 'Europe', 'Europe/Podgorica', 171),
(172, 'Europe', 'Europe/Prague', 172),
(173, 'Europe', 'Europe/Riga', 173),
(174, 'Europe', 'Europe/Rome', 174),
(175, 'Europe', 'Europe/Samara', 175),
(176, 'Europe', 'Europe/San_Marino', 176),
(177, 'Europe', 'Europe/Sarajevo', 177),
(178, 'Europe', 'Europe/Saratov', 178),
(179, 'Europe', 'Europe/Simferopol', 179),
(180, 'Europe', 'Europe/Skopje', 180),
(181, 'Europe', 'Europe/Sofia', 181),
(182, 'Europe', 'Europe/Stockholm', 182),
(183, 'Europe', 'Europe/Tallinn', 183),
(184, 'Europe', 'Europe/Tirane', 184),
(185, 'Europe', 'Europe/Ulyanovsk', 185),
(186, 'Europe', 'Europe/Uzhgorod', 186),
(187, 'Europe', 'Europe/Vaduz', 187),
(188, 'Europe', 'Europe/Vatican', 188),
(189, 'Europe', 'Europe/Vienna', 189),
(190, 'Europe', 'Europe/Vilnius', 190),
(191, 'Europe', 'Europe/Volgograd', 191),
(192, 'Europe', 'Europe/Warsaw', 192),
(193, 'Europe', 'Europe/Zagreb', 193),
(194, 'Europe', 'Europe/Zaporozhye', 194),
(195, 'Europe', 'Europe/Zurich', 195),
(196, 'Asia', 'Asia/Aden', 196),
(197, 'Asia', 'Asia/Almaty', 197),
(198, 'Asia', 'Asia/Amman', 198),
(199, 'Asia', 'Asia/Anadyr', 199),
(200, 'Asia', 'Asia/Aqtau', 200),
(201, 'Asia', 'Asia/Aqtobe', 201),
(202, 'Asia', 'Asia/Ashgabat', 202),
(203, 'Asia', 'Asia/Atyrau', 203),
(204, 'Asia', 'Asia/Baghdad', 204),
(205, 'Asia', 'Asia/Bahrain', 205),
(206, 'Asia', 'Asia/Baku', 206),
(207, 'Asia', 'Asia/Bangkok', 207),
(208, 'Asia', 'Asia/Barnaul', 208),
(209, 'Asia', 'Asia/Beirut', 209),
(210, 'Asia', 'Asia/Bishkek', 210),
(211, 'Asia', 'Asia/Brunei', 211),
(212, 'Asia', 'Asia/Chita', 212),
(213, 'Asia', 'Asia/Choibalsan', 213),
(214, 'Asia', 'Asia/Colombo', 214),
(215, 'Asia', 'Asia/Damascus', 215),
(216, 'Asia', 'Asia/Dhaka', 216),
(217, 'Asia', 'Asia/Dili', 217),
(218, 'Asia', 'Asia/Dubai', 218),
(219, 'Asia', 'Asia/Dushanbe', 219),
(220, 'Asia', 'Asia/Famagusta', 220),
(221, 'Asia', 'Asia/Gaza', 221),
(222, 'Asia', 'Asia/Hebron', 222),
(223, 'Asia', 'Asia/Ho_Chi_Minh', 223),
(224, 'Asia', 'Asia/Hong_Kong', 224),
(225, 'Asia', 'Asia/Irkutsk', 225),
(226, 'Asia', 'Asia/Jakarta', 226),
(227, 'Asia', 'Asia/Jayapura', 227),
(228, 'Asia', 'Asia/Jerusalem', 228),
(229, 'Asia', 'Asia/Kabul', 229),
(230, 'Asia', 'Asia/Kamchatka', 230),
(231, 'Asia', 'Asia/Karachi', 231),
(232, 'Asia', 'Asia/Kathmandu', 232),
(233, 'Asia', 'Asia/Khandyga', 233),
(234, 'Asia', 'Asia/Kolkata', 234),
(235, 'Asia', 'Asia/Krasnoyarsk', 235),
(236, 'Asia', 'Asia/Kuala_Lumpur', 236),
(237, 'Asia', 'Asia/Kuching', 237),
(238, 'Asia', 'Asia/Kuwait', 238),
(239, 'Asia', 'Asia/Macau', 239),
(240, 'Asia', 'Asia/Magadan', 240),
(241, 'Asia', 'Asia/Makassar', 241),
(242, 'Asia', 'Asia/Manila', 242),
(243, 'Asia', 'Asia/Muscat', 243),
(244, 'Asia', 'Asia/Nicosia', 244),
(245, 'Asia', 'Asia/Novokuznetsk', 245),
(246, 'Asia', 'Asia/Novosibirsk', 246),
(247, 'Asia', 'Asia/Omsk', 247),
(248, 'Asia', 'Asia/Oral', 248),
(249, 'Asia', 'Asia/Phnom_Penh', 249),
(250, 'Asia', 'Asia/Pontianak', 250),
(251, 'Asia', 'Asia/Pyongyang', 251),
(252, 'Asia', 'Asia/Qatar', 252),
(253, 'Asia', 'Asia/Qyzylorda', 253),
(254, 'Asia', 'Asia/Riyadh', 254),
(255, 'Asia', 'Asia/Sakhalin', 255),
(256, 'Asia', 'Asia/Samarkand', 256),
(257, 'Asia', 'Asia/Seoul', 257),
(258, 'Asia', 'Asia/Shanghai', 258),
(259, 'Asia', 'Asia/Singapore', 259),
(260, 'Asia', 'Asia/Srednekolymsk', 260),
(261, 'Asia', 'Asia/Taipei', 261),
(262, 'Asia', 'Asia/Tashkent', 262),
(263, 'Asia', 'Asia/Tbilisi', 263),
(264, 'Asia', 'Asia/Tehran', 264),
(265, 'Asia', 'Asia/Thimphu', 265),
(266, 'Asia', 'Asia/Tokyo', 266),
(267, 'Asia', 'Asia/Tomsk', 267),
(268, 'Asia', 'Asia/Ulaanbaatar', 268),
(269, 'Asia', 'Asia/Urumqi', 269),
(270, 'Asia', 'Asia/Ust-Nera', 270),
(271, 'Asia', 'Asia/Vientiane', 271),
(272, 'Asia', 'Asia/Vladivostok', 272),
(273, 'Asia', 'Asia/Yakutsk', 273),
(274, 'Asia', 'Asia/Yangon', 274),
(275, 'Asia', 'Asia/Yekaterinburg', 275),
(276, 'Asia', 'Asia/Yerevan', 276),
(646, 'America', 'America/Adak', 277),
(647, 'America', 'America/Anchorage', 278),
(648, 'America', 'America/Anguilla', 279),
(649, 'America', 'America/Antigua', 280),
(650, 'America', 'America/Araguaina', 281),
(651, 'America', 'America/Argentina/Buenos_Aires', 282),
(652, 'America', 'America/Argentina/Catamarca', 283),
(653, 'America', 'America/Argentina/Cordoba', 284),
(654, 'America', 'America/Argentina/Jujuy', 285),
(655, 'America', 'America/Argentina/La_Rioja', 286),
(656, 'America', 'America/Argentina/Mendoza', 287),
(657, 'America', 'America/Argentina/Rio_Gallegos', 288),
(658, 'America', 'America/Argentina/Salta', 289),
(659, 'America', 'America/Argentina/San_Juan', 290),
(660, 'America', 'America/Argentina/San_Luis', 291),
(661, 'America', 'America/Argentina/Tucuman', 292),
(662, 'America', 'America/Argentina/Ushuaia', 293),
(663, 'America', 'America/Aruba', 294),
(664, 'America', 'America/Asuncion', 295),
(665, 'America', 'America/Atikokan', 296),
(666, 'America', 'America/Bahia', 297),
(667, 'America', 'America/Bahia_Banderas', 298),
(668, 'America', 'America/Barbados', 299),
(669, 'America', 'America/Belem', 300),
(670, 'America', 'America/Belize', 301),
(671, 'America', 'America/Blanc-Sablon', 302),
(672, 'America', 'America/Boa_Vista', 303),
(673, 'America', 'America/Bogota', 304),
(674, 'America', 'America/Boise', 305),
(675, 'America', 'America/Cambridge_Bay', 306),
(676, 'America', 'America/Campo_Grande', 307),
(677, 'America', 'America/Cancun', 308),
(678, 'America', 'America/Caracas', 309),
(679, 'America', 'America/Cayenne', 310),
(680, 'America', 'America/Cayman', 311),
(681, 'America', 'America/Chicago', 312),
(682, 'America', 'America/Chihuahua', 313),
(683, 'America', 'America/Costa_Rica', 314),
(684, 'America', 'America/Creston', 315),
(685, 'America', 'America/Cuiaba', 316),
(686, 'America', 'America/Curacao', 317),
(687, 'America', 'America/Danmarkshavn', 318),
(688, 'America', 'America/Dawson', 319),
(689, 'America', 'America/Dawson_Creek', 320),
(690, 'America', 'America/Denver', 321),
(691, 'America', 'America/Detroit', 322),
(692, 'America', 'America/Dominica', 323),
(693, 'America', 'America/Edmonton', 324),
(694, 'America', 'America/Eirunepe', 325),
(695, 'America', 'America/El_Salvador', 326),
(696, 'America', 'America/Fort_Nelson', 327),
(697, 'America', 'America/Fortaleza', 328),
(698, 'America', 'America/Glace_Bay', 329),
(699, 'America', 'America/Godthab', 330),
(700, 'America', 'America/Goose_Bay', 331),
(701, 'America', 'America/Grand_Turk', 332),
(702, 'America', 'America/Grenada', 333),
(703, 'America', 'America/Guadeloupe', 334),
(704, 'America', 'America/Guatemala', 335),
(705, 'America', 'America/Guayaquil', 336),
(706, 'America', 'America/Guyana', 337),
(707, 'America', 'America/Halifax', 338),
(708, 'America', 'America/Havana', 339),
(709, 'America', 'America/Hermosillo', 340),
(710, 'America', 'America/Indiana/Indianapolis', 341),
(711, 'America', 'America/Indiana/Knox', 342),
(712, 'America', 'America/Indiana/Marengo', 343),
(713, 'America', 'America/Indiana/Petersburg', 344),
(714, 'America', 'America/Indiana/Tell_City', 345),
(715, 'America', 'America/Indiana/Vevay', 346),
(716, 'America', 'America/Indiana/Vincennes', 347),
(717, 'America', 'America/Indiana/Winamac', 348),
(718, 'America', 'America/Inuvik', 349),
(719, 'America', 'America/Iqaluit', 350),
(720, 'America', 'America/Jamaica', 351),
(721, 'America', 'America/Juneau', 352),
(722, 'America', 'America/Kentucky/Louisville', 353),
(723, 'America', 'America/Kentucky/Monticello', 354),
(724, 'America', 'America/Kralendijk', 355),
(725, 'America', 'America/La_Paz', 356),
(726, 'America', 'America/Lima', 357),
(727, 'America', 'America/Los_Angeles', 358),
(728, 'America', 'America/Lower_Princes', 359),
(729, 'America', 'America/Maceio', 360),
(730, 'America', 'America/Managua', 361),
(731, 'America', 'America/Manaus', 362),
(732, 'America', 'America/Marigot', 363),
(733, 'America', 'America/Martinique', 364),
(734, 'America', 'America/Matamoros', 365),
(735, 'America', 'America/Mazatlan', 366),
(736, 'America', 'America/Menominee', 367),
(737, 'America', 'America/Merida', 368),
(738, 'America', 'America/Metlakatla', 369),
(739, 'America', 'America/Mexico_City', 370),
(740, 'America', 'America/Miquelon', 371),
(741, 'America', 'America/Moncton', 372),
(742, 'America', 'America/Monterrey', 373),
(743, 'America', 'America/Montevideo', 374),
(744, 'America', 'America/Montserrat', 375),
(745, 'America', 'America/Nassau', 376),
(746, 'America', 'America/New_York', 377),
(747, 'America', 'America/Nipigon', 378),
(748, 'America', 'America/Nome', 379),
(749, 'America', 'America/Noronha', 380),
(750, 'America', 'America/North_Dakota/Beulah', 381),
(751, 'America', 'America/North_Dakota/Center', 382),
(752, 'America', 'America/North_Dakota/New_Salem', 383),
(753, 'America', 'America/Ojinaga', 384),
(754, 'America', 'America/Panama', 385),
(755, 'America', 'America/Pangnirtung', 386),
(756, 'America', 'America/Paramaribo', 387),
(757, 'America', 'America/Phoenix', 388),
(758, 'America', 'America/Port-au-Prince', 389),
(759, 'America', 'America/Port_of_Spain', 390),
(760, 'America', 'America/Porto_Velho', 391),
(761, 'America', 'America/Puerto_Rico', 392),
(762, 'America', 'America/Punta_Arenas', 393),
(763, 'America', 'America/Rainy_River', 394),
(764, 'America', 'America/Rankin_Inlet', 395),
(765, 'America', 'America/Recife', 396),
(766, 'America', 'America/Regina', 397),
(767, 'America', 'America/Resolute', 398),
(768, 'America', 'America/Rio_Branco', 399),
(769, 'America', 'America/Santarem', 400),
(770, 'America', 'America/Santiago', 401),
(771, 'America', 'America/Santo_Domingo', 402),
(772, 'America', 'America/Sao_Paulo', 403),
(773, 'America', 'America/Scoresbysund', 404),
(774, 'America', 'America/Sitka', 405),
(775, 'America', 'America/St_Barthelemy', 406),
(776, 'America', 'America/St_Johns', 407),
(777, 'America', 'America/St_Kitts', 408),
(778, 'America', 'America/St_Lucia', 409),
(779, 'America', 'America/St_Thomas', 410),
(780, 'America', 'America/St_Vincent', 411),
(781, 'America', 'America/Swift_Current', 412),
(782, 'America', 'America/Tegucigalpa', 413),
(783, 'America', 'America/Thule', 414),
(784, 'America', 'America/Thunder_Bay', 415),
(785, 'America', 'America/Tijuana', 416),
(786, 'America', 'America/Toronto', 417),
(787, 'America', 'America/Tortola', 418),
(788, 'America', 'America/Vancouver', 419),
(789, 'America', 'America/Whitehorse', 420),
(790, 'America', 'America/Winnipeg', 421),
(791, 'America', 'America/Yakutat', 422),
(792, 'America', 'America/Yellowknife', 423);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_web_info`
--

CREATE TABLE `tbl_web_info` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logo_inverse` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` longtext NOT NULL,
  `scripts` longtext NOT NULL,
  `use_clean` varchar(255) NOT NULL DEFAULT 'true',
  `disqus_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_web_info`
--

INSERT INTO `tbl_web_info` (`name`, `email`, `phone`, `address`, `logo`, `logo_inverse`, `favicon`, `timezone`, `description`, `keywords`, `scripts`, `use_clean`, `disqus_url`) VALUES
('News247', 'news@username.com', '+255 22-2133553', 'Araina, Plot 388 Block 155', 'logo.png', 'logo_inverse.png', 'favicon.png', 'Africa/Dar_es_Salaam', 'News Magazine Newspaper PHP Script', 'blog, editorial, magazine, news, newspaper, responsive, Responsive Magazine, responsive news, review', '', 'true', '');

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE `teacher` (
  `userId` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL,
  `nbCoursesCreated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`userId`, `userName`, `email`, `password`, `registrationDate`, `nbCoursesCreated`) VALUES
('2021TEA0', ' Miguel ONANA', 'miguelonana1234@gmail.com', '$2y$10$q7VMs.NSilD5.2Dhtb5d0O2yOyx3rhm6jZqmbtCmeoTU9k2ou0KSm', '2021-11-30', 1),
('2021TEA1', 'Manager le Bg', 'mohamedabdoulaye.aboubakar@esprit.tn', '$2y$10$ZtnVIzNBuxd37VEgkxzOveObgkU9QeJjzsStzNblz9nnF23bQTI8e', '2021-12-07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `etat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`userId`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`Identifiant`),
  ADD KEY `fk_carte_client` (`idclient`);

--
-- Index pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courses_chapter` (`course_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courses_teacher` (`teacher`);

--
-- Index pour la table `followcourse`
--
ALTER TABLE `followcourse`
  ADD PRIMARY KEY (`userId`,`courseId`),
  ADD KEY `fk_followcourse_courses` (`courseId`);

--
-- Index pour la table `likecourse`
--
ALTER TABLE `likecourse`
  ADD PRIMARY KEY (`userId`,`courseId`),
  ADD KEY `fk_likecourse_courses` (`courseId`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`number`);

--
-- Index pour la table `onlineusers`
--
ALTER TABLE `onlineusers`
  ADD PRIMARY KEY (`userId`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_number` (`question_number`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Index pour la table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`userId`);

--
-- Index pour la table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_blog_posts`
--
ALTER TABLE `tbl_blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_blog_views`
--
ALTER TABLE `tbl_blog_views`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_cords`
--
ALTER TABLE `tbl_cords`
  ADD PRIMARY KEY (`country`);

--
-- Index pour la table `tbl_login_sessions`
--
ALTER TABLE `tbl_login_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_reset_tokens`
--
ALTER TABLE `tbl_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_smtp`
--
ALTER TABLE `tbl_smtp`
  ADD PRIMARY KEY (`server`);

--
-- Index pour la table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_timezones`
--
ALTER TABLE `tbl_timezones`
  ADD PRIMARY KEY (`pid`);

--
-- Index pour la table `tbl_web_info`
--
ALTER TABLE `tbl_web_info`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `Identifiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_blog_posts`
--
ALTER TABLE `tbl_blog_posts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_blog_views`
--
ALTER TABLE `tbl_blog_views`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_login_sessions`
--
ALTER TABLE `tbl_login_sessions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_reset_tokens`
--
ALTER TABLE `tbl_reset_tokens`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_timezones`
--
ALTER TABLE `tbl_timezones`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `fk_courses_chapter` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_teacher` FOREIGN KEY (`teacher`) REFERENCES `teacher` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `followcourse`
--
ALTER TABLE `followcourse`
  ADD CONSTRAINT `fk_followcourse_courses` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_followcourse_student` FOREIGN KEY (`userId`) REFERENCES `student` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `likecourse`
--
ALTER TABLE `likecourse`
  ADD CONSTRAINT `fk_likecourse_courses` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `fk_likecourse_student` FOREIGN KEY (`userId`) REFERENCES `student` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `onlineusers`
--
ALTER TABLE `onlineusers`
  ADD CONSTRAINT `fk_student_onlineUsers` FOREIGN KEY (`userId`) REFERENCES `student` (`userId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
