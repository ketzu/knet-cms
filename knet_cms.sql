-- --------------------------------------------------------

--
-- Tablestructure for table `knet_projects`
--

CREATE TABLE `knet_projects` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE latin1_german1_ci NOT NULL,
  `link` varchar(200) COLLATE latin1_german1_ci NOT NULL,
  `info` varchar(500) COLLATE latin1_german1_ci NOT NULL,
  `picture` varchar(200) COLLATE latin1_german1_ci NOT NULL,
  `git` varchar(200) COLLATE latin1_german1_ci DEFAULT NULL,
  `frontpage` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

ALTER TABLE `knet_projects`
  ADD PRIMARY KEY (`id`);
  
-- --------------------------------------------------------

--
--  Tablestructure for table `knet_papers`
--

CREATE TABLE `knet_papers` (
  `id` int(10) UNSIGNED NOT NULL,
  `mainauthor` tinyint(1) NOT NULL,
  `title` varchar(500) COLLATE latin1_german1_ci NOT NULL,
  `conference` varchar(200) COLLATE latin1_german1_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `link` varchar(500) COLLATE latin1_german1_ci NOT NULL,
  `picture` varchar(200) COLLATE latin1_german1_ci NOT NULL,
  `year` int(11) NOT NULL,
  `frontpage` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

ALTER TABLE `knet_papers`
  ADD PRIMARY KEY (`id`);