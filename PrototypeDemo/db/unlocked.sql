--
-- Database: `unlocked`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `cid` int(11) NOT NULL,
  `Parent` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`cid`, `Parent`, `Code`, `FirstName`, `LastName`) VALUES
(1, '2', '45', 'Johnny', 'Johnny');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `codeID` int(11) NOT NULL,
  `codevalue` varchar(255) NOT NULL,
  `idparent` int(11) NOT NULL,
  `idchild` int(11) NOT NULL,
  `cFirstName` varchar(255) NOT NULL,
  `cLastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `AccountType` enum('Parent','Child') NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `FirstName`, `LastName`, `EmailAddress`, `AccountType`, `Password`) VALUES
(2, 'asd', 'asd', 'asd@mail.com', 'Parent', '$2y$10$ftNdGcLHqZIyrUxoH1K6uOGAjuv0oali2mG0fHxZxmow4ecFzK7NO'),
(3, 'kill', 'me', 'plz@plz.com', 'Parent', '$2y$10$EXwQc/XD30/Tr3XBLB.0G.DaGXZMjThI8Auwy1.twz36CxRyRBxcC'),
(4, '123', '123', '123@123.com', 'Parent', '$2y$10$vp8z0KOz0NjlI2iTykX6fetdhwfnR5pT2hf//BYzKR8WCzWOLfnay'),
(5, 'sb', 'sb', 'sb@sb.com', 'Parent', '$2y$10$J.jyxYtWCXY8ONbpie2kBOEOpA/ct0D7CZ28SHHb1ZiEoMGeKTMZC'),
(6, 'REEE', 'REEE', 'ree@ree.com', 'Parent', '$2y$10$WEwz13kuusUFZ3tMUlWTuukeDIVtuM.xikFt4xfRQUg4CNsYvIqpq'),
(7, 'ree', 'ree', 'ree1@ree.com', 'Parent', '$2y$10$Y9dZGAotm5STQ4Yrsqsm2O0wGRCDMsJcR4LYjwe8VF/IHqzYA1rju'),
(8, 'sign', 'up', 'signup@signup.com', 'Parent', '$2y$10$SD7lXlkdQ0HPHvlReZDg2ubyIuzt9YvuWPsK0HrATjXf5DzT0ogE2'),
(9, 'Hi', 'Testing', '69@69.com', 'Parent', '69'),
(10, 'testing', 'testing', 'testing@testing.com', 'Parent', 'testing'),
(11, 'burrito', 'burrito', 'burrito@burrito.com', 'Parent', '$2y$10$91U86ONa11BaT7O/axv1Z.Bfx/K40LpG9vfCjr/2jRfYAQzn3eEcq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`codeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `codeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
