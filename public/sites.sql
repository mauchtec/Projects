-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2023 at 04:04 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactperson` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coodinates` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sites_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `user_id`, `sitename`, `contactperson`, `email`, `sitenumber`, `coodinates`, `siteaddress`, `link`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 'Delta quantity surveyors (PTY) LTD', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '656231093', '-26.0321446 27.9150602', '917 USA Street', 'https://zambezicountryestate.openitemapp.com/', 'test\r\ntest1\r\ntest2\r\ntest3', '2023-04-10 16:07:06', '2023-04-14 11:42:10'),
(2, 1, 'Cloudsell Africa', 'Abel', 'abel.naidoo@cloudsell.co.za', '827219003', '-26.057013555396274, 28.100311026192262', '9 Rockridge Pl, Buccleuch, Sandton, 2090', 'https://cloudsecure.openitemapp.com/', 'test', '2023-04-10 16:22:13', '2023-04-11 15:54:39'),
(3, 1, 'Sandhurst towers', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '656231093', '-26.1076204 28.0488492', '35 Fredman Dr, Sandhurst, Sandton, 2196', 'https://sandhursttowers.openitemapp.com/GateMagic/', 'test', '2023-04-11 07:09:12', '2023-04-11 15:34:30'),
(4, 1, 'Kalgaro', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-26.0315778 27.9942116', 'Swallow Dr, Fourways, Sandton, 2055', 'https://kalgaroestate.openitemapp.com/', 'test', '2023-04-11 09:51:24', '2023-04-11 15:33:09'),
(5, 1, 'ThornValleyEstateAkasia687', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.6623702 28.0935279', '541 Salie St, Chantelle, Akasia, 0201', 'https://thornvalleyestateakasia.openitemapp.com/', 'test', '2023-04-11 12:28:21', '2023-04-11 15:32:25'),
(6, 1, 'Deutsche International School Johannesburg', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-26.17841802858944 28.019130667785845', '11 Sans Souci Rd, Parktown, Johannesburg, 2193', 'https://dsj.openitemapp.com/', 'Test', '2023-04-11 15:27:14', '2023-04-11 15:31:30'),
(7, 1, '70 on Berkeley Home Owners Association', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.0505698569308 28.017315339685208', 'Berkeley Ave, Bryanston, Sandton, 2191', 'https://cloudsecure.openitemapp.com/', 'test', '2023-04-11 15:36:03', '2023-04-11 15:39:44'),
(8, 1, 'Alinta Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.28868444214046 28.071246397361726', 'Comaro St, Glenvista, Johannesburg South, 2061', 'https://alintaestate.openitemapp.com/', NULL, '2023-04-11 15:37:52', '2023-04-11 15:37:52'),
(9, 1, 'Beverly Hills Complex', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.032144 27.9150589', '578 Goukamma St, Erasmuskloof, Pretoria, 0048', 'https://beverlyhillsestate.openitemapp.com/', 'test', '2023-04-11 15:41:38', '2023-04-11 15:41:38'),
(10, 1, 'BreakFree Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.957055978644533, 28.102211726190067', '99 Garden Rd, Blue Hills, Midrand, 1687', 'https://breakfree.openitemapp.com/', 'test', '2023-04-11 15:44:33', '2023-04-11 15:45:04'),
(11, 1, 'Carlswald Valley View Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.967332769826783, 28.1098422973547', '31 Eighth Rd, Noordwyk, Midrand, 1687', 'https://carlswaldvalleyviewestate.openitemapp.com/', 'test', '2023-04-11 15:47:31', '2023-04-11 15:47:31'),
(12, 1, 'Clarens Golf Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-28.512690422269287, 28.430633554297522', 'Clarens Golf & Trout Estate Clarens 9707', 'https://clarensgolfestate.openitemapp.com/', 'test', '2023-04-11 15:52:28', '2023-04-11 15:53:04'),
(13, 1, 'Copperleaf Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.880495938674407, 28.04836374891629', 'Copperleaf Golf and Country Estate Centurion 0157', 'http://copperleafcountryestate.openitemapp.com/', NULL, '2023-04-11 15:57:49', '2023-04-11 15:57:49'),
(14, 1, 'National Department of Health', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.77191363311107, 28.164097948541077', '1112 Voortrekker Rd, Pretoria Townlands 351-Jr, Pretoria, 0187', 'https://health-gov-za.openitemapp.com/', 'test', '2023-04-11 16:02:13', '2023-04-11 16:06:54'),
(15, 1, 'Erwat- Headoffice', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.02297627891711, 28.285138568520342', 'Hartebeestfontein Office Park R25 Towards Bapsfontein near, R21, Kempton Park NU, Kempton Park, 1512', 'http://erwat.openitemapp.com/', 'test', '2023-04-11 16:09:13', '2023-04-11 16:09:13'),
(16, 1, 'Founders Hill', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.098754950906464, 28.160254639686443', 'Antwerp Rd, Founders Hill, Lethabong, 1609', 'https://foundershillcrescent.openitemapp.com/', NULL, '2023-04-11 16:16:45', '2023-04-11 16:16:45'),
(17, 1, 'Glen Acres Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.961961007139948, 28.141816066669726', 'Austin Rd, Glen Austin AH, Midrand, 1685', 'https://glenacresparkestate.openitemapp.com/', NULL, '2023-04-11 16:20:39', '2023-04-11 16:20:39'),
(18, 1, 'Golden Fields Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.908060777047226, 28.1697058550245', '998 Kentucky Crescent', 'https://goldenfieldsestate.openitemapp.com/', 'test', '2023-04-11 16:25:43', '2023-04-11 16:25:43'),
(19, 1, 'Gems', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.785247038946128, 28.283610248813602', '124 Mercy Ave, Waterkloof Glen, Pretoria, 0010', 'https://gems-gov-za.openitemapp.com', 'test', '2023-04-11 16:27:29', '2023-04-11 16:27:29'),
(20, 1, 'Gowrie Farm Golf Lodge', 'Trust', NULL, '0656231093', '-29.362134921106776, 30.003429039761553', 'Gowrie Farm Golf Lodge, R103, Nottingham Road', 'https://gowrievillage.openitemapp.com', 'test', '2023-04-11 16:29:29', '2023-04-11 16:29:29'),
(21, 1, 'Graceland Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-27.98783509038287, 26.732919976396794', 'Petrus Bosch St, Welkom Central, Welkom, 9459', 'https://gracelandestate.openitemapp.com/', NULL, '2023-04-11 16:34:13', '2023-04-11 16:34:13'),
(22, 1, 'Greenstone Hill Office Park', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.117375883150576, 28.147592414549486', 'Greenstone Hill, Lethabong, 1609', 'https://greenstonehillbusinesspark.openitemapp.com/', 'test', '2023-04-11 16:36:23', '2023-04-11 16:36:23'),
(23, 1, 'JT Ross Park: Plumbago1', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.072931910271613, 28.27155935132978', '17 Spier St, Glen marais, Kempton Park, 1619', 'https://jtrossplumbagopark.openitemapp.com/', 'gate1', '2023-04-11 16:43:17', '2023-04-11 16:46:00'),
(24, 1, 'JT Ross Park: Plumbago2', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.0700309181582, 28.27756927647655', 'Merlot Cl, Glen marais, Kempton Park, 1619', 'https://jtrossplumbagopark.openitemapp.com/', 'gate2', '2023-04-11 16:44:35', '2023-04-11 16:45:33'),
(25, 1, 'Kalgaro', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.031425953772686, 27.9943091396849', 'Swallow Dr, Fourways, Sandton, 2055', 'https://kalgaroestate.openitemapp.com', 'test', '2023-04-11 16:47:43', '2023-04-11 16:47:43'),
(26, 1, 'Knightsbridge Office Park', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.04037890720615, 28.019917568520697', '2nd Floor Block B, 33 Sloane St, Bryanston, Sandton, 2191', 'https://knightsbridgeofficepark.openitemapp.com/', 'test', '2023-04-11 16:49:10', '2023-04-11 16:49:10'),
(27, 1, 'Lakewood Terrace', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.238613163372253, 27.996538126196153', 'Ormonde, Johannesburg South, 2091', 'https://lakewoodestate.openitemapp.com/', 'test', '2023-04-11 16:50:38', '2023-04-11 16:50:38'),
(28, 1, 'Lanzerac Complex.', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.82889768545995, 28.192549110844862', '140 Basden Ave, Die Hoewes, Centurion, 0163', 'http://lanzeracestate.openitemapp.com/', 'test', '2023-04-11 16:53:30', '2023-04-11 16:53:30'),
(29, 1, 'Mentis', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.167294503400438, 28.192854797359058', '147 N Reef Rd, Activia Park, Germiston, 1601', 'https://mentis.openitemapp.com/', 'test', '2023-04-11 16:57:57', '2023-04-11 16:57:57'),
(30, 1, 'MODS @ WILLOWS', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.77297882143583, 28.3493437550217', '97 Vergelegen Ave, Equestria, Pretoria, 0184', 'https://modsatwillows.openitemapp.com/', 'test', '2023-04-11 17:00:12', '2023-04-11 17:00:12'),
(31, 1, 'Nic Bottari Toyota', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.42130719352281, 28.46649272620021', '56 1st Ave, Nigel, Johannesburg, 1490', 'https://cloudsecure.openitemapp.com', 'test', '2023-04-11 17:06:04', '2023-04-11 17:06:04'),
(32, 1, 'One Forrest Road Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.118163917599446, 28.055980195508717', '1 Forrest Rd, Inanda, Sandton, 2196', 'https://oneforrestroad.openitemapp.com/', 'test', '2023-04-11 17:19:44', '2023-04-11 17:19:44'),
(33, 1, 'Pebble Rock Golf & Country Club', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.61362616814826, 28.389624683853892', '307 Aquamarine St, Pebble Rock Golf Village, Pretoria, 0037', 'https://pebblerockgolfvillage.openitemapp.com/', NULL, '2023-04-11 17:20:58', '2023-04-11 17:20:58'),
(34, 1, 'Red Ivory Lane', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.09566294016969, 28.141437512699863', '50 Avalon Rd, Modderfontein, Lethabong, 1609', 'https://redivorylane.openitemapp.com/', 'test', '2023-04-11 17:23:01', '2023-04-11 17:23:01'),
(35, 1, 'Revive Autobody Repair Centre', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.04072562823186, 28.05957114153425', '2 Coombe Place, Crn, Rivonia Rd, Rivonia, 2196', 'https://reviveautobody.openitemapp.com', 'test', '2023-04-11 17:24:23', '2023-04-11 17:24:23'),
(36, 1, 'Riley Bussines park', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.166071138143092, 28.150940497359063', 'Riley Rd Office Park Ln', 'http://rileybusinesspark.openitemapp.com/', 'test', '2023-04-11 17:29:13', '2023-04-11 17:29:13'),
(37, 1, '@Sandton Hotel', 'Trust', NULL, '0656231093', '-26.09789336164659, 28.050148949043905', '5 Benmore Rd, Benmore Gardens, Sandton, 2196', 'https://sandtonhotel.openitemapp.com/', 'test', '2023-04-11 17:32:41', '2023-04-11 17:32:41'),
(38, 1, '(SHRA)-Social Housing Foundation / Social Housing Regulatory Authority', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.179284869445798, 28.0479480955101', '32 Princess of Wales Terrace, Parktown, Johannesburg, 2193', 'https://shra.openitemapp.com/', 'test', '2023-04-11 17:35:32', '2023-04-11 17:35:32'),
(39, 1, 'Sonata Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.94832228590868, 28.106410597354284', '38 Mozart Ln, Sagewood, Midrand, 1687', 'https://sonata.openitemapp.com/', 'test', '2023-04-11 17:39:18', '2023-04-11 17:39:18'),
(40, 1, 'SPWH body co-operate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.032144 27.9150589', 'unknown', 'https://spwh.openitemapp.com/', 'test', '2023-04-11 17:46:10', '2023-04-11 17:46:10'),
(41, 1, 'Summerset estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.95437920838038, 28.09807799735442', '6 Summerset Estate, 16 Garden Rd, Blue Hills, Midrand, 1685', 'http://summersetestate.openitemapp.com', 'test', '2023-04-11 17:48:22', '2023-04-11 17:48:22'),
(42, 1, 'The Pines Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.848433555113886, 28.19421715502329', '1s Shelanti Ave, Die Hoewes, Centurion, 0157', 'https://thepinesestate.openitemapp.com/', 'test', '2023-04-11 17:51:08', '2023-04-11 17:51:08'),
(43, 1, 'The Regency Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.098432685252455, 28.064690555028687', '157 Daisy St, Strathavon, Sandton, 2031', 'https://theregencyestatesandton.openitemapp.com/', 'test', '2023-04-11 17:53:40', '2023-04-11 17:53:40'),
(44, 1, 'The William', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.995447032807775, 28.016431541533276', 'William Nicol Drive &, Broadacres Dr, Zevenfontein 407-Jr, Midrand, 2191', 'https://thewilliam.openitemapp.com/', 'test', '2023-04-11 17:56:24', '2023-04-11 17:56:24'),
(45, 1, 'Thornvalley Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.11854025162988, 28.15218486852232', 'Stoneridge Dr, Greenstone Hill, Johannesburg, 1609', 'http://thornvalleyestateedenvale.openitemapp.com/', 'test', '2023-04-11 17:58:06', '2023-04-11 17:58:06'),
(46, 1, 'Villa Mia Complex.', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.83995216148036, 28.189570397351943', 'Bernini Cres, Die Hoewes, Centurion, 0157', 'https://villamiacomplex.openitemapp.com/', 'test', '2023-04-11 18:00:15', '2023-04-11 18:00:15'),
(47, 1, 'Waterford Houghton Estate', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.147191318587065, 28.060314668522995', 'Houghton Estate, Johannesburg, 2198', 'https://waterfordestatehoughton.openitemapp.com/', 'test', '2023-04-11 18:03:41', '2023-04-11 18:03:41'),
(48, 1, 'The Wheels Club (Pty) Ltd', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-26.089594977596725, 28.078250439686208', '16 Dartfield Rd, Sandown, Sandton, 2191', 'https://wheelsclub.openitemapp.com/', 'test', '2023-04-11 18:08:24', '2023-04-11 18:08:24'),
(49, 1, 'Zambezi COUNTRY ESTATE', 'Trust', 'trusttrinity8@gmail.com', '0656231093', '-25.680247939806, 28.264305895499174', 'Sefako Makgatho Dr, Montana, Pretoria, 0001', 'https://zambezicountryestate.openitemapp.com', 'there are two gates onsite', '2023-04-11 18:10:39', '2023-04-11 18:10:39'),
(50, 1, 'National School of Government', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '+27656231093', '-25.7493601678065, 28.202764854733413', '20 Greef St, Trevenna, Pretoria, 0002', 'https://cloudsecure.openitemapp.com/', 'test', '2023-04-11 20:16:18', '2023-04-11 20:16:18'),
(51, 2, 'Auditor-General South Africa', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.748875957902595, 28.276708061881948', '4 Daventry Street, Lynnwood Bridge Office Park, Lynnwood Manor, Pretoria', 'https://cloudsecure.openitemapp.com/', 'test', '2023-04-13 12:20:59', '2023-04-13 12:20:59'),
(52, 2, 'Golden Mile Estate', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.95155106645516, 29.291452081697393', 'Golden Mile Estate, Emalahleni', 'https://cloudsecure.openitemapp.com/', 'test', '2023-04-14 11:49:00', '2023-04-14 11:49:00'),
(53, 2, 'Century Properties', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.97951376989824, 28.025620564818613', 'Century Property Developments (Pty) Ltd, 5 Lynx St, Treesbank AH, Midrand, 1683', 'https://centurypropertydevelopments.openitemapp.com/', 'test', '2023-04-16 13:17:39', '2023-04-16 13:17:39'),
(54, 2, 'National Home Builders Registration Council (NHBRC)', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.748380687373963, 28.238212452852295', '1166 Park St, Hatfield, Pretoria, 0028', 'https://nhbrc.openitemapp.com/', 'test', '2023-04-16 13:22:14', '2023-04-16 13:22:14'),
(55, 2, 'Medscheme', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-26.16537664804813, 27.929308652871185', '37 Conrad St, Florida North, Roodepoort, 1709', 'https://afrocentric.openitemapp.com/', 'test', '2023-04-16 13:24:09', '2023-04-16 13:24:09'),
(56, 2, 'Lyndore Manor', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.996134417223896, 28.084715822175426', '917 USA Street', 'https://lyndoremanor.openitemapp.com/', 'test', '2023-04-16 13:26:54', '2023-04-16 13:26:54'),
(57, 2, 'Parklands Security Estate', 'Trust Mauchaza', 'trusttrinity8@gmail.com', '0656231093', '-25.955250430375777, 28.204292824025526', '2190, 28 Antimony Rd, Clayville EXT 27, Olifantsfontein, 1666', 'https://parklandssecurityestate.openitemapp.com/', 'test', '2023-04-16 13:29:21', '2023-04-16 13:29:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
