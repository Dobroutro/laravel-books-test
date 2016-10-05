SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(2, 'Author 2', 'Some note', '2016-10-05 06:55:48', '2016-10-05 06:55:48'),
(3, 'Author 3', 'Some note', '2016-10-05 06:56:02', '2016-10-05 06:56:02'),
(4, 'Author 44', 'Some note', '2016-10-05 06:56:11', '2016-10-05 09:15:57'),
(5, 'Author 5', 'Some note', '2016-10-05 06:56:18', '2016-10-05 06:56:18'),
(6, 'Author 6', '', '2016-10-05 07:08:30', '2016-10-05 07:08:30'),
(7, 'Author 7', 'Some note Some noteSome noteSome noteSome noteSome noteSome noteSome note', '2016-10-05 07:38:48', '2016-10-05 07:38:48'),
(9, 'Author 8', 'dsadas', '2016-10-05 08:09:16', '2016-10-05 08:09:16'),
(10, 'Author 9', 'AA', '2016-10-05 08:11:04', '2016-10-05 08:11:04'),
(12, 'Author 10', 'AAa', '2016-10-05 08:14:14', '2016-10-05 08:14:14'),
(13, 'Author 12', 'fsdfdsdggdfgdf', '2016-10-05 08:53:06', '2016-10-05 09:30:32'),
(16, 'Some author', 'das dasd ad d', '2016-10-05 14:16:19', '2016-10-05 14:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `note` text NOT NULL,
  `purchase_year` int(3) NOT NULL,
  `imagename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author_id`, `title`, `note`, `purchase_year`, `imagename`, `created_at`, `updated_at`) VALUES
(1, 2, 'dfsafdsafdasfasd', '', 1999, '1475681429.jpg', NULL, '2016-10-05 12:30:29'),
(2, 2, 'dsadasda das', 'fdsaf', 1999, '1475681456.jpg', '2016-10-05 10:49:46', '2016-10-05 12:30:56'),
(3, 6, 'dsadasdas', 'dasdas', 2000, '3.jpg', '2016-10-05 10:49:59', '2016-10-05 14:10:29'),
(4, 2, 'dsaewqeqw', '', 1832, '1475682737.jpg', '2016-10-05 11:14:31', '2016-10-05 12:52:17'),
(5, 6, 'gdfsgdfsg 35e634ss', 'ffdsafadsf', 2011, '5.jpg', '2016-10-05 11:19:04', '2016-10-05 14:10:17'),
(7, 2, '3g  fdsgsd gdsfg dsfg dsfg dsfg df 444', 'fdsafdsafdsafsda', 1800, NULL, '2016-10-05 11:21:10', '2016-10-05 12:07:54'),
(8, 2, 'dsadas das fdsa fads fdsa fds', 'dasdasdsaas adsf ads ', 1999, '8.jpg', '2016-10-05 12:27:32', '2016-10-05 14:09:04'),
(9, 4, 'asf afdsa agf dgdgdfs', '', 2016, '9.jpg', '2016-10-05 14:09:31', '2016-10-05 16:30:48'),
(10, 7, ' fdsg gdfsg sdgf fds', '', 2015, '10.jpg', '2016-10-05 14:26:50', '2016-10-05 14:26:51'),
(11, 12, 'Some book', 'dsadasdas', 2010, '11.jpg', '2016-10-05 15:49:46', '2016-10-05 15:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', '$2y$10$g0fOArAdKkmYXz7oqWOZVOmoi/Kmm1sQKtiyYXO8yP9Q/3YFFQIAu', 'SiIlGOIJd8E4d1rW3lD38gAU2QUHc08235ZVrkcepTwTpzODxeeBKJ61pQKd', '2016-10-05 05:11:44', '2016-10-05 16:31:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;