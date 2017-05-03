SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `photographyEdition`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocompetition`
--

CREATE TABLE `addtocompetition` (
  `id` int(255) NOT NULL,
  `competition_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `uid` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cover_pic_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_pictures`
--

CREATE TABLE `album_pictures` (
  `id` int(255) NOT NULL,
  `album_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buysell`
--

CREATE TABLE `buysell` (
  `id` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `pricerange` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `message` text NOT NULL,
  `tagsList` varchar(255) NOT NULL,
  `sold` tinyint(1) NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `contactNo` varchar(14) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic_loc` varchar(500) DEFAULT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyselltags`
--

CREATE TABLE `buyselltags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buysellthread`
--

CREATE TABLE `buysellthread` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(255) NOT NULL,
  `itemid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Black and White', ''),
(2, 'Wedding', ''),
(3, 'Nature', ''),
(4, 'Abstract', ''),
(6, 'Macro', ''),
(7, 'Culture', ''),
(8, 'Fashion', ''),
(9, 'Others', ''),
(10, 'Architecture', ''),
(11, 'Cuisine', ''),
(12, 'Sports', ''),
(13, 'Wildlife', ''),
(14, 'People', ''),
(15, 'Event', ''),
(16, 'Travel', ''),
(17, 'HDR', ''),
(18, 'Journalism', ''),
(19, 'Landscapes', ''),
(20, 'Other', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `comment` text NOT NULL,
  `replyto` int(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `winner_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `id` int(255) NOT NULL,
  `type` int(2) NOT NULL,
  `type_id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(255) NOT NULL,
  `follower` int(255) NOT NULL,
  `following` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `uid` int(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `replyid` int(255) DEFAULT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(255) NOT NULL,
  `friend1` int(255) NOT NULL,
  `friend2` int(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_admin`
--

CREATE TABLE `iph_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_uname` varchar(255) NOT NULL,
  `admin_key` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_category`
--

CREATE TABLE `iph_category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_company`
--

CREATE TABLE `iph_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_contest`
--

CREATE TABLE `iph_contest` (
  `contest_id` int(11) NOT NULL,
  `contest_title` varchar(255) NOT NULL,
  `contest_description` text NOT NULL,
  `contest_homepage` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_country`
--

CREATE TABLE `iph_country` (
  `countryID` int(11) NOT NULL,
  `countryName` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `iph_country`
--

INSERT INTO `iph_country` (`countryID`, `countryName`) VALUES
(2, 'Albania'),
(3, 'American Samoa'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Anguilla'),
(7, 'Antarctica'),
(8, 'Antigua And Barbuda'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Aruba'),
(12, 'Australia'),
(13, 'Austria'),
(14, 'Azerbaijan'),
(15, 'Bahamas'),
(16, 'Bahrain'),
(17, 'Bangladesh'),
(18, 'Barbados'),
(19, 'Belarus'),
(20, 'Belgium'),
(21, 'Belize'),
(22, 'Benin'),
(23, 'Bermuda'),
(24, 'Bhutan'),
(25, 'Bolivia'),
(26, 'Bosnia And Herzegovina'),
(27, 'Botswana'),
(28, 'Bouvet Island'),
(29, 'Brazil'),
(30, 'British Indian Ocean Territory'),
(31, 'Brunei Darussalam'),
(32, 'Bulgaria'),
(33, 'Burkina Faso'),
(34, 'Burundi'),
(35, 'Cambodia'),
(36, 'Cameroon'),
(37, 'Canada'),
(38, 'Cape Verde'),
(39, 'Cayman Islands'),
(40, 'Central African Republic'),
(41, 'Chad'),
(42, 'Chile'),
(43, 'China'),
(44, 'Christmas Island'),
(45, 'Cocos (Keeling) Islands'),
(46, 'Colombia'),
(47, 'Comoros'),
(48, 'Congo'),
(49, 'Cook Islands'),
(50, 'Costa Rica'),
(51, 'Cote d\'Ivoire'),
(52, 'Croatia'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'French Guiana'),
(74, 'French Polynesia'),
(75, 'French Southern Territories'),
(76, 'Gabon'),
(77, 'Gambia'),
(78, 'Georgia'),
(79, 'Germany'),
(80, 'Ghana'),
(81, 'Gibraltar'),
(82, 'Greece'),
(83, 'Greenland'),
(84, 'Grenada'),
(85, 'Guadeloupe'),
(86, 'Guam'),
(87, 'Guatemala'),
(88, 'Guernsey'),
(89, 'Guinea'),
(90, 'Guinea-Bissau'),
(91, 'Guyana'),
(92, 'Haiti'),
(93, 'Heard And McDonald Islands'),
(94, 'Holy See (Vatican City State)'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Indonesia'),
(101, 'Iran (Islamic Republic Of)'),
(102, 'Iraq'),
(103, 'Ireland'),
(104, 'Isle of Man'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Jamaica'),
(108, 'Japan'),
(109, 'Jersey'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea, Democratic People\'s Republic'),
(115, 'Korea, Republic Of'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People\'s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macau'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia, Federated States'),
(142, 'Moldova, Republic Of'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montenegro'),
(146, 'Montserrat'),
(147, 'Morocco'),
(148, 'Mozambique'),
(149, 'Myanmar'),
(150, 'Namibia'),
(151, 'Nauru'),
(152, 'Nepal'),
(153, 'Netherlands'),
(154, 'Netherlands Antilles'),
(155, 'New Caledonia'),
(156, 'New Zealand'),
(157, 'Nicaragua'),
(158, 'Niger'),
(159, 'Nigeria'),
(160, 'Niue'),
(161, 'Norfolk Island'),
(162, 'Northern Mariana Islands'),
(163, 'Norway'),
(164, 'Oman'),
(165, 'Pakistan'),
(166, 'Palau'),
(167, 'Palestine'),
(168, 'Panama'),
(169, 'Papua New Guinea'),
(170, 'Paraguay'),
(171, 'Peru'),
(172, 'Philippines'),
(173, 'Pitcairn'),
(174, 'Poland'),
(175, 'Portugal'),
(176, 'Puerto Rico'),
(177, 'Qatar'),
(178, 'Reunion'),
(179, 'Romania'),
(180, 'Russian Federation'),
(181, 'Rwanda'),
(182, 'Saint Kitts And Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Vincent and the Grenadines'),
(185, 'Samoa'),
(186, 'San Marino'),
(187, 'Sao Tome And Principe'),
(188, 'Saudi Arabia'),
(189, 'Serbia'),
(190, 'Senegal'),
(191, 'Seychelles'),
(192, 'Sierra Leone'),
(193, 'Singapore'),
(194, 'Slovakia (Slovak Republic)'),
(195, 'Slovenia'),
(196, 'Solomon Islands'),
(197, 'Somalia'),
(198, 'South Africa'),
(199, 'South Georgia and South Sandwich Islands'),
(200, 'Spain'),
(201, 'Sri Lanka'),
(202, 'Saint Helena'),
(203, 'Saint Pierre And Miquelon'),
(204, 'Sudan'),
(205, 'Suriname'),
(206, 'Svalbard, Jan Mayen Islands'),
(207, 'Swaziland'),
(208, 'Sweden'),
(209, 'Switzerland'),
(210, 'Syrian Arab Republic'),
(211, 'Taiwan'),
(212, 'Tajikistan'),
(213, 'Tanzania, United Republic Of'),
(214, 'Thailand'),
(215, 'Togo'),
(216, 'Tokelau'),
(217, 'Tonga'),
(218, 'Trinidad And Tobago'),
(219, 'Tunisia'),
(220, 'Turkey'),
(221, 'Turkmenistan'),
(222, 'Turks And Caicos Islands'),
(223, 'Tuvalu'),
(224, 'Uganda'),
(225, 'Ukraine'),
(226, 'United Arab Emirates'),
(227, 'United Kingdom'),
(228, 'United States of America'),
(229, 'Uruguay'),
(230, 'Uzbekistan'),
(231, 'Vanuatu'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (U.S.)'),
(236, 'Wallis And Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe'),
(242, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `iph_email`
--

CREATE TABLE `iph_email` (
  `email_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_faq`
--

CREATE TABLE `iph_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_header_slider`
--

CREATE TABLE `iph_header_slider` (
  `banner_id` int(11) NOT NULL,
  `banner_url` varchar(225) NOT NULL,
  `banner_name` varchar(225) NOT NULL,
  `banner_text` text NOT NULL,
  `banner_image` varchar(225) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iph_header_slider`
--

INSERT INTO `iph_header_slider` (`banner_id`, `banner_url`, `banner_name`, `banner_text`, `banner_image`, `sort_order`, `added_date`, `modified_date`, `status`) VALUES
(13, 'http://google.com', 'photoslider', '\\r\\n	This google slider\\r\\n', 'ban_4t4u.jpg', 1, '2013-12-30 02:19:04', '0000-00-00 00:00:00', 1),
(14, 'http://google.com', 'photogoogleslider', '\\r\\n	This is google slider\\r\\n', 'ban_69qw.jpg', 3, '2013-12-30 02:18:45', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iph_images`
--

CREATE TABLE `iph_images` (
  `image_id` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_code` varchar(255) NOT NULL,
  `image_text` text NOT NULL,
  `image_user` varchar(255) NOT NULL,
  `image_category` varchar(255) NOT NULL,
  `image_date` date NOT NULL,
  `image_company` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_judges`
--

CREATE TABLE `iph_judges` (
  `judges_id` int(11) NOT NULL,
  `judges_name` varchar(255) NOT NULL,
  `judges_text` text NOT NULL,
  `judges_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_page`
--

CREATE TABLE `iph_page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(225) NOT NULL,
  `page_slug` varchar(225) NOT NULL,
  `main_menu` tinyint(1) NOT NULL,
  `page_order` int(11) NOT NULL,
  `page_description` text NOT NULL,
  `page_meta_title` varchar(225) NOT NULL,
  `page_meta_description` text NOT NULL,
  `page_meta_keyword` varchar(225) NOT NULL,
  `other_menu` tinyint(1) NOT NULL,
  `other_footer_menu` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_prizes`
--

CREATE TABLE `iph_prizes` (
  `pr_id` int(11) NOT NULL,
  `pr_title` varchar(255) NOT NULL,
  `pr_category` varchar(255) NOT NULL,
  `pr_text` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_social`
--

CREATE TABLE `iph_social` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_sponsors`
--

CREATE TABLE `iph_sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(255) NOT NULL,
  `sponsor_text` text NOT NULL,
  `sponsor_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iph_status`
--

CREATE TABLE `iph_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_value` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iph_status`
--

INSERT INTO `iph_status` (`status_id`, `status_name`, `status_value`) VALUES
(1, 'Publish', 1),
(2, 'UnPublish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iph_user`
--

CREATE TABLE `iph_user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_company` varchar(255) NOT NULL,
  `user_empid` varchar(255) NOT NULL,
  `user_location` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landing`
--

CREATE TABLE `landing` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `landing`
--

INSERT INTO `landing` (`id`, `filename`) VALUES
(1, '10-most-beautiful-landscape-Nepal-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` int(255) NOT NULL,
  `uid1` int(255) NOT NULL,
  `uid2` int(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_loc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `message`, `pic_loc`, `time`, `type`) VALUES
(3, 'Canon India Bets Big on East India Market Prepares for 50% Market Share in DSLR segment', 'Launches the Dual Zoom Lens Kit with EOS 600D (EF-S 18-55mm IS II + EF-S 55-250mm) as a bumper offer for Durga Puja. <br />\\n• As a festival offer, Canon unveils Two Compact Cameras: PS SX170 & PS S200; One DSLR: the EOS 70D; One lens: new EF-S 55-250mm F4-5.6 IS STM.<br />\\n• Clocks highest region growth in East India for Digital SLR at 27% against the national growth of 10% in 2013. <br />\\n• Prepares for enhancing appeal of digital SLR to the new segment of women, mothers and kids.<br />\\n• Launches Canon EOS Academy to enhance photography culture in India. <br />\\n• Acquires 30% market share in East India in the Inkjet printer category. Launches \'Durga Puja\' consumer promotions for its \'Pixma inkjet\' printer range. <br />\\n<br />\\nKolkata, September 18, 2013: Canon India Pvt. Ltd., India\'s No. 1 Complete Digital Imaging Company, today announced its confidence in strong expansion plans for East India starting with the festival of Durga Puja. Along with boisterous programmes for the festive period, Canon is set to leverage its strong marketing plans for a successful year ahead.<br />\\nEquipped with Canon\'s HS SYSTEM, which combines a high-sensitivity 12.1 megapixel CMOS sensor with the latest DIGIC 6 imaging processors, PowerShot G16 and S120 are built for ultra-fast performance and produce phenomenal image quality. Both are fitted with the newly developed 5x Optical Zoom lenses, expandable to 10x using Canon\'s new ZoomPlus feature and the PowerShot G16 has a bright f/1.8 (W) - f/2.8/ (T) lens that performs beautifully especially in low light, perfect for creating dramatic soft backgrounds with shallow depth-of-field. The PowerShot S110 has improved aperture to f1.8 and a 3.0-inch touch-screen LCD for simple and casual operation.<br />\\n<br />\\nCanon\'s assurance of reviving up in current economic situation is testimony to its robust plans for the festive period and year ahead. The brand has developed a mix of festive ATL / BTL marketing campaigns focused on Digital compact and DSLR camera range. As an eclectic festive offer, Canon has launched Two Compact Cameras: PS SX170 & PS S200; One DSLR: the EOS 70D; One lens: new EF-S 55-250mm F4-5.6 IS STM and introduces the Dual Zoom Lens Kit with EOS 600D (EF-S 18-55mm IS II + EF-S 55-250mm) for Durga Puja.<br />\\n<br />\\nSpeaking on the occasion Dr. Alok Bharadwaj, Executive Vice President, Canon India said, \"Festive celebrations for a brand is not just about offers, new products or schemes, it is more about strengthening the bond with the audience in the most effective way. Despite slowdown, we have been able to achieve 27% growth in DSLR business in East India and maintained a steady growth rate of 10% across India. Owing to phenomenal growth of DSLR segment, we have adopted desirability, affordability and user experience as key marketing vehicles to make Canon DSLR range as our growth locomotive during this season as well as next year. The current DSLR India market with 2.5 lac units is expected to grow to 5 lac units in three years and by expanding offerings with variant of combos and discounts varying from 10% to 40%, we are preparing for a strong foothold in this segment.\" <br />\\n<br />\\nExtremely focused to make the Durga Puja campaign a hit in East India market, Canon has extended the celebrations with print advertisements, a radio campaign and by placing point of sale material featuring the brand icon, Anushka Sharma at all Canon retail outlets in the region. Canon also unveiled the new TV commercial focused on digital SLR EOS 70D being rolled out from this month onwards.<br />\\n<br />\\nCanon\'s steady move of reaching out to masses begins with the new-age generation and mothers who desire to nurture their kids\' creative instincts. Calling it as the \'Joy of Photography\', Canon wishes to enhance customer experience whilst capturing the special moments of life. And one of the models that will capture the essence of photography for mothers and kids is the EOS 100D - the world\'s smallest and lightest DSLR packed with advanced features. The EOS 100D weighs 370 grams which is approx 20% lighter as compared to any light weight Canon DSLR available. Canon admires this model to be one of the preferred options of customers who want to carry light and small yet very high image quality creative tool. Moreover, Canon will also be launching a Digital campaign for reaching out to the target audience in the most effective way.<br />\\n<br />\\nFurther to enhance photography culture in India, Canon recently launched an EOS Academy, conducting free and paid workshops; and seminars for Genre Photography at Canon Location and facility. The registration charges range between INR 1500 - INR 2500. These workshops are conducted by a panel of Photography experts and Centre for Photo & Movie Development Team. Canon India plans to conduct over all 100 workshops in a year. The classic EOS camera range has the ability to record movies. With their large image high sensitivity sensors and interchangeable lenses, they are now being used to create mainstream movies for cinema and television. Directors like the shallow depth-of-field that is possible, not to mention the low cost compared to professional camcorders. Cinematographers like versatility in shooting which can be the form factor, light weighted and all conditions shooting capability. EOS DSLR meets the expectations and stands the test of time. <br />\\n<br />\\nDr. Bharadwaj further added, \"In order to ride high and promote Digital SLR category, Canon has converted its 10 models into a combination of 28 variants. We are happy to launch the fast moving and most desirable model for amateurs called the EOS 600D ( Dual zoom lens kit )on a smart deal of 24% combo discount. We are aiming at positioning Digital SLR as the aspirational products for women, mother and kids. Our newly launched EOS Academy aims to spread photography culture across different segments.\"<br />\\n<br />\\nCanon has also rolled out exciting offers for the PIXMA range; such as free headsets and D-Link WiFi router with the PIXMA AIO printers and the PIXMA MG5470 & iP7270 printers respectively. Adding on to this, about 100 tech shows in top metros and non-metros called the PIXMA Studio One are planned. These shows will present the wide range of Canon PIXMA inkjet printers which are compatible with smart devices like tablets, smart phones and cloud applications and will allow customers to print wirelessly from any smart device. Canon PIXMA Pro series printers\' high quality photo printing is designed to meet the requirements of photographers, with no compromise on productivity and very high color accuracy printing. The series aims to augment the quality of professional photo printing offer in India. With PIXMA printers Canon has strong position of 30% market share in Inkjet in East India.<br />\\n<br />\\nAlways enthusiastic to provide phenomenal experience to customers, Canon\'s Durga Puja offerings on products include a 4GB SD card and a carry case to each customer on purchase of the EOS 1100D and EOS 600D with savings of upto INR 12,995 on purchase of dual zoom kit.<br />\\n<br />\\nThe prices of PowerShot models are:<br />\\nPowerShot SX170 - INR 12,995 /-<br />\\nPowerShot S200 - TBA<br />\\n<br />\\nPrice of EOS 70D (Body only) - INR 79,995 /-<br />\\nPrice of EOS 70D (with 18-55 mm lens) - INR 85,995 /-<br />\\nPrice of EOS 70D (with 18-135 mm lens) - INR 1,02,995 /-<br />\\n<br />\\nPrice of the new LENS<br />\\nEF-S 55-250mm F4-5.6IS STM lens - INR 25,995/- <br />\\n<br />\\nSource : www.canon.co.in', 'news.jpg', '2013-09-24 16:15:33', 0),
(6, 'New camer', 'new logoo wow', 'logo11.png', '2014-03-09 15:24:55', 0),
(8, 'Canon Camera', 'New camera launched rs.70000', 'port_other1.jpg', '2014-05-13 06:29:41', 0),
(10, 'Samsung new', 'Wink and Take Selfies With the New Samsung NX3000 Smart Camera<br />\\r\\nNDTV Correspondent, May, 09, 2014<br />\\r\\n<br />\\r\\nBy simply opening the screen, framing a face in the display and winking, users can turn on the device and capture a selfie.', 'samsung_nx3000_small.jpg', '2014-05-15 03:00:52', 1),
(11, 'lens', 'tp', '2_Indian_Wedding_photography.jpg', '2014-05-15 04:27:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `type` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `type_id` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL,
  `category` int(255) NOT NULL DEFAULT '1',
  `camera` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reportabuse`
--

CREATE TABLE `reportabuse` (
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `stars` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags_pictures`
--

CREATE TABLE `tags_pictures` (
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `tid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `uid` int(255) NOT NULL,
  `uid2` int(255) NOT NULL,
  `testimonial` text NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `bio` text,
  `profileImage` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `contact` text,
  `facebook` text,
  `twitter` text,
  `website` text,
  `cover_pic` varchar(200) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `state`, `city`, `bio`, `profileImage`, `admin`, `contact`, `facebook`, `twitter`, `website`, `cover_pic`, `join_date`) VALUES
(1, 'admin', 'admin', 'admin@example.com', 'New York', 'New York', 'This is a test account!', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-05-03 21:47:48'),
(2, 'user', 'user', 'user@example.com', 'New York', 'New York', 'This a test user account!', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2017-05-03 21:48:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocompetition`
--
ALTER TABLE `addtocompetition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_id` (`competition_id`,`picture_id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cover_pic_id` (`cover_pic_id`);

--
-- Indexes for table `album_pictures`
--
ALTER TABLE `album_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`,`picture_id`),
  ADD KEY `picture_id` (`picture_id`);

--
-- Indexes for table `buysell`
--
ALTER TABLE `buysell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `buyselltags`
--
ALTER TABLE `buyselltags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buysellthread`
--
ALTER TABLE `buysellthread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`,`replyto`),
  ADD KEY `replyto` (`replyto`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winner_id` (`winner_id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower` (`follower`,`following`),
  ADD KEY `follower_2` (`follower`),
  ADD KEY `following` (`following`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`,`replyid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend1` (`friend1`,`friend2`);

--
-- Indexes for table `iph_admin`
--
ALTER TABLE `iph_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `iph_category`
--
ALTER TABLE `iph_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `iph_company`
--
ALTER TABLE `iph_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `iph_contest`
--
ALTER TABLE `iph_contest`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `iph_country`
--
ALTER TABLE `iph_country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `iph_email`
--
ALTER TABLE `iph_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `iph_faq`
--
ALTER TABLE `iph_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `iph_header_slider`
--
ALTER TABLE `iph_header_slider`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `iph_images`
--
ALTER TABLE `iph_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `iph_judges`
--
ALTER TABLE `iph_judges`
  ADD PRIMARY KEY (`judges_id`);

--
-- Indexes for table `iph_page`
--
ALTER TABLE `iph_page`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `page_name` (`page_name`,`main_menu`);

--
-- Indexes for table `iph_prizes`
--
ALTER TABLE `iph_prizes`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `iph_social`
--
ALTER TABLE `iph_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iph_sponsors`
--
ALTER TABLE `iph_sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `iph_status`
--
ALTER TABLE `iph_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `iph_user`
--
ALTER TABLE `iph_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `landing`
--
ALTER TABLE `landing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid1` (`uid1`,`uid2`),
  ADD KEY `uid2` (`uid2`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `reportabuse`
--
ALTER TABLE `reportabuse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_pictures`
--
ALTER TABLE `tags_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocompetition`
--
ALTER TABLE `addtocompetition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_pictures`
--
ALTER TABLE `album_pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buysell`
--
ALTER TABLE `buysell`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buyselltags`
--
ALTER TABLE `buyselltags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buysellthread`
--
ALTER TABLE `buysellthread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iph_admin`
--
ALTER TABLE `iph_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iph_category`
--
ALTER TABLE `iph_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `iph_company`
--
ALTER TABLE `iph_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `iph_contest`
--
ALTER TABLE `iph_contest`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iph_country`
--
ALTER TABLE `iph_country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `iph_email`
--
ALTER TABLE `iph_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iph_faq`
--
ALTER TABLE `iph_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iph_header_slider`
--
ALTER TABLE `iph_header_slider`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `iph_images`
--
ALTER TABLE `iph_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `iph_judges`
--
ALTER TABLE `iph_judges`
  MODIFY `judges_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `iph_page`
--
ALTER TABLE `iph_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `iph_prizes`
--
ALTER TABLE `iph_prizes`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `iph_social`
--
ALTER TABLE `iph_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iph_sponsors`
--
ALTER TABLE `iph_sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iph_status`
--
ALTER TABLE `iph_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `iph_user`
--
ALTER TABLE `iph_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `landing`
--
ALTER TABLE `landing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reportabuse`
--
ALTER TABLE `reportabuse`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags_pictures`
--
ALTER TABLE `tags_pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `album_pictures`
--
ALTER TABLE `album_pictures`
  ADD CONSTRAINT `album_pictures_ibfk_5` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `album_pictures_ibfk_6` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`);

--
-- Constraints for table `buysell`
--
ALTER TABLE `buysell`
  ADD CONSTRAINT `buysell_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buysellthread`
--
ALTER TABLE `buysellthread`
  ADD CONSTRAINT `buysellthread_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buysellthread_ibfk_4` FOREIGN KEY (`itemid`) REFERENCES `buysell` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`pid`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_3` FOREIGN KEY (`follower`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_4` FOREIGN KEY (`following`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_4` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forums_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messaging`
--
ALTER TABLE `messaging`
  ADD CONSTRAINT `messaging_ibfk_1` FOREIGN KEY (`uid1`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messaging_ibfk_2` FOREIGN KEY (`uid2`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_4` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pictures_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportabuse`
--
ALTER TABLE `reportabuse`
  ADD CONSTRAINT `reportabuse_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stars`
--
ALTER TABLE `stars`
  ADD CONSTRAINT `stars_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stars_ibfk_4` FOREIGN KEY (`pid`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
