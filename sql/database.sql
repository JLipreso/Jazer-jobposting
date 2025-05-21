
CREATE TABLE `people` (
  `dataid` int(26) NOT NULL,
  `project_refid` varchar(26) DEFAULT NULL,
  `people_group_refid` varchar(26) DEFAULT NULL,
  `people_refid` varchar(26) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(26) DEFAULT NULL,
  `blocked` enum('0','1') NOT NULL DEFAULT '0',
  `active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `people_auth` (
  `dataid` int(10) NOT NULL,
  `project_refid` varchar(26) DEFAULT NULL,
  `people_refid` varchar(26) DEFAULT NULL,
  `people_auth_refid` varchar(80) DEFAULT NULL,
  `signin_at` datetime DEFAULT current_timestamp(),
  `signout_at` datetime DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `blocked` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `people_group` (
  `dataid` int(10) NOT NULL,
  `people_group_refid` varchar(26) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `people`
  ADD PRIMARY KEY (`dataid`),
  ADD UNIQUE KEY `people_refid` (`people_refid`);

ALTER TABLE `people_auth`
  ADD PRIMARY KEY (`dataid`);

ALTER TABLE `people_group`
  ADD PRIMARY KEY (`dataid`),
  ADD UNIQUE KEY `people_group_refid` (`people_group_refid`);

ALTER TABLE `people`
  MODIFY `dataid` int(26) NOT NULL AUTO_INCREMENT;

ALTER TABLE `people_auth`
  MODIFY `dataid` int(10) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `people_group`
  MODIFY `dataid` int(10) NOT NULL AUTO_INCREMENT;