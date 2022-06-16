-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 04:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realstate`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `for_loop_example` ()   wholeblock:BEGIN
  DECLARE x INT;
  SET x = -5;

  loop_label: LOOP
    IF x > 0 THEN
      LEAVE loop_label;
    END IF;
    INSERT INTO `ad` (`ID`, `UID`, `pics`, `price`, `address`, `type`, `furnished`, `sale_type`, `rooms_num`, `bathrooms_num`, `area`, `ad_dasc`, `contact_email`, `contact_phone`, `contact_whatsapp`) VALUES (NULL, '1234', 'pic/1.png|pic/2.png', '1250000', '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', '1', '1', '1', '4', '2', '190', ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', '1022234567', '1022234567');
    SET x = x + 1;
    ITERATE loop_label;
  END LOOP;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `while` ()   wholeblock:BEGIN
  
  declare x INT default 0;
  SET x = 1;

  WHILE x <= 10 DO
    INSERT INTO `ad` (`ID`, `UID`, `pics`, `price`, `address`, `type`, `furnished`, `sale_type`, `rooms_num`, `bathrooms_num`, `area`, `ad_dasc`, `contact_email`, `contact_phone`, `contact_whatsapp`) VALUES (NULL, '1234', 'pic/1.png|pic/2.png', '1250000', '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', '1', '1', '1', '4', '2', '190', ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', '1022234567', '1022234567');
    SET x = x + 1;
  END WHILE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `while_example` ()   wholeblock:BEGIN
  declare x INT default 0;
  SET x = 1;

  WHILE x <= 10 DO
    INSERT INTO `ad` (`ID`, `UID`, `pics`, `price`, `address`, `type`, `furnished`, `sale_type`, `rooms_num`, `bathrooms_num`, `area`, `ad_dasc`, `contact_email`,`contact_phone`, `contact_whatsapp`) VALUES (NULL, '1234', 'pic/1.png|pic/2.png', '1250000', '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', '1', '1', '1', '4', '2', '190', ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', '1022234567', '1022234567');

    SET x = x + 1;
  END WHILE;

  select str;
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL COMMENT 'User ID',
  `pics` text NOT NULL,
  `price` int(11) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL COMMENT 'Villa, Apartment..',
  `furnished` tinyint(1) NOT NULL COMMENT 'furnished or not',
  `sale_type` int(11) NOT NULL COMMENT 'for sale or for rent',
  `rooms_num` int(11) NOT NULL COMMENT 'Number of rooms',
  `bathrooms_num` int(11) NOT NULL COMMENT 'Number of bathrooms',
  `area` int(11) NOT NULL COMMENT 'Area m2',
  `ad_dasc` text NOT NULL COMMENT 'Description',
  `contact_email` varchar(50) NOT NULL,
  `contact_phone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `contact_whatsapp` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Unit Ad';

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`ID`, `UID`, `pics`, `price`, `address`, `type`, `furnished`, `sale_type`, `rooms_num`, `bathrooms_num`, `area`, `ad_dasc`, `contact_email`, `contact_phone`, `contact_whatsapp`) VALUES
(1, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(2, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(3, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(4, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(5, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(6, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(7, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(8, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(9, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(10, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(11, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(12, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(13, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(14, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(15, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(16, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(17, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(18, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(19, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(20, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(21, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(22, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(23, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(24, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(25, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(26, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(27, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(28, 1234, 'pic/1.png|pic/2.png', 1250000, '123 hjjkasdlh fkjasdhkj hlksadjh fjkasdh fkja dhfkjadsh fk', 1, 1, 1, 4, 2, 190, ' jkash fkjd hjkfahsd kjfhaksld hfkl haksj hdaksjh fasjk hldasj fhash fkas haksd hfkasj hfdkasj hdfalsk halsk hjadfsjka dfs haskl hasd', 'klasdhfjkadshjhaksldf@hfdssdf.sdf', 1022234567, 1022234567),
(45, 123, '/pics/a.png', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(46, 123, 'Array', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(47, 123, 'd4c3cafcc7b2958f58e637203a537935.png', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(48, 123, 'd4c3cafcc7b2958f58e637203a537935.png|IMG_2009.JPG', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(49, 123, 'd4c3cafcc7b2958f58e637203a537935.png|IMG_2009.JPG', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(50, 123, 'd4c3cafcc7b2958f58e637203a537935.png|IMG_2009.JPG', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(51, 11, 'd4c3cafcc7b2958f58e637203a537935.png|IMG_2009.JPG', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(55, 11, './pics/52-a.png|./pics/52-IMG_2009.JPG', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432),
(56, 11, './pics/56-Screenshot (1).png', 1250000, '15 aasdf, asdfasdf asdf ', 2, 1, 2, 4, 2, 180, 'lasjdhfj hsdakjh sadjhfkj hasdkljhf ksjadh kjhflaksdjh fkjdsa asdf', 'kjlhasd@sadd.asd', 1099999999, 1098765432);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
