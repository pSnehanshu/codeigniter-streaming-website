-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2019 at 05:36 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0FM55CEPT7`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` tinyint(4) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://i.ibb.co/19R1G4d/video-thumbnail-overlay.png',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('video','show','season','category') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'video',
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published_on` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='An object is either a video, show, season or category' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `object_heirarchy`
--

CREATE TABLE `object_heirarchy` (
  `parent` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `child_order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `snippet` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `snippet`, `content`, `slug`, `is_published`) VALUES
(1, 'Privacy policy', 'This privacy notice discloses the privacy practices for (eimiflix.com). This privacy notice applies solely to information collected by this website.', '<!-- #######  YAY, I AM THE SOURCE EDITOR! #########-->\r\n<p>This privacy notice discloses the privacy practices for&nbsp;(eimiflix.com). This privacy notice applies solely to information collected by this website. It will notify you of the following:</p>\r\n<ol type=\"1\">\r\n<li>What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>\r\n<li>What choices are available to you regarding the use of your data.</li>\r\n<li>The security procedures in place to protect the misuse of your information.</li>\r\n<li>How you can correct any inaccuracies in the information.</li>\r\n</ol>\r\n<p><strong>Information Collection, Use, and Sharing</strong>&nbsp;<br />We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>\r\n<p>We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>\r\n<p>Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p>\r\n<p><strong>Your Access to and Control Over Information</strong>&nbsp;<br />You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>\r\n<ul>\r\n<li>See what data we have about you, if any.</li>\r\n<li>Change/correct any data we have about you.</li>\r\n<li>Have us delete any data we have about you.</li>\r\n<li>Express any concern you have about our use of your data.</li>\r\n</ul>\r\n<p><strong>Security</strong>&nbsp;<br />We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.</p>\r\n<p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for \"https\" at the beginning of the address of the Web page.</p>\r\n<p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>\r\n<p><strong>If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at&nbsp;XXX YYY-ZZZZ&nbsp;or&nbsp;via email.</strong></p>', 'privacy', 1),
(2, 'Terms and conditions', 'These Website Standard Terms and Conditions written on this webpage shall manage your use of our website', '<h2>Introduction</h2>\r\n<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website,&nbsp;<span class=\"highlight preview_website_name\">Eimiflix.com</span>&nbsp;accessible at&nbsp;<span class=\"highlight preview_website_url\">www.eimiflix.com</span>.</p>\r\n<p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>\r\n<p>Minors or people below 18 years old are not allowed to use this Website.</p>\r\n<h2>Intellectual Property Rights</h2>\r\n<p>Other than the content you own, under these Terms,&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>\r\n<p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>\r\n<h2>Restrictions</h2>\r\n<p>You are specifically restricted from all of the following:</p>\r\n<ul>\r\n<li>publishing any Website material in any other media;</li>\r\n<li>selling, sublicensing and/or otherwise commercializing any Website material;</li>\r\n<li>publicly performing and/or showing any Website material;</li>\r\n<li>using this Website in any way that is or may be damaging to this Website;</li>\r\n<li>using this Website in any way that impacts user access to this Website;</li>\r\n<li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>\r\n<li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>\r\n<li>using this Website to engage in any advertising or marketing.</li>\r\n</ul>\r\n<p>Certain areas of this Website are restricted from being access by you and&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>\r\n<h2>Your Content</h2>\r\n<p>In these Website Standard Terms and Conditions, &ldquo;Your Content&rdquo; shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>\r\n<p>Your Content must be your own and must not be invading any third-party\'s rights.&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;reserves the right to remove any of Your Content from this Website at any time without notice.</p>\r\n<h2>No warranties</h2>\r\n<p>This Website is provided &ldquo;as is,&rdquo; with all faults, and&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>\r\n<h2>Limitation of liability</h2>\r\n<p>In no event shall&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract. &nbsp;<span class=\"highlight preview_company_name\">Company Name</span>, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>\r\n<h2>Indemnification</h2>\r\n<p>&nbsp;</p>\r\n<p>You hereby indemnify to the fullest extent&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>\r\n<h2>Severability</h2>\r\n<p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>\r\n<h2>Variation of Terms</h2>\r\n<p><span class=\"highlight preview_company_name\">Company Name</span>&nbsp;is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>\r\n<h2>Assignment</h2>\r\n<p>The&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>\r\n<h2>Entire Agreement</h2>\r\n<p>These Terms constitute the entire agreement between&nbsp;<span class=\"highlight preview_company_name\">Company Name</span>&nbsp;and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>\r\n<h2>Governing Law &amp; Jurisdiction</h2>\r\n<p>These Terms will be governed by and interpreted in accordance with the laws of the State of&nbsp;<span class=\"highlight preview_country\">Country</span>, and you submit to the non-exclusive jurisdiction of the state and federal courts located in&nbsp;<span class=\"highlight preview_country\">Country</span>&nbsp;for the resolution of any disputes.</p>', 'terms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `uid` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `currency` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INR',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tx_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'razorpay transaction id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://www.gravatar.com/avatar/no-avatar-set?d=mp',
  `joined_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `object_heirarchy`
--
ALTER TABLE `object_heirarchy`
  ADD PRIMARY KEY (`parent`,`child`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`uid`,`payment_date`),
  ADD UNIQUE KEY `tx_id` (`tx_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
