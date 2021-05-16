-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 11:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmsproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_post`
--

CREATE TABLE `create_post` (
  `postid` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` text NOT NULL,
  `hashtag` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `posttype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_post`
--

INSERT INTO `create_post` (`postid`, `user_id`, `title`, `image`, `caption`, `hashtag`, `date`, `posttype`) VALUES
(9, 1, 'DBMS PROJECT', 'https://cellularnews.com/wp-content/uploads/2020/03/17-Summer-Sky-Wallpaper-325x485.jpg', 'AESTHETIC WALLPAPER !                                   ', '#aesthetic #wallpaper', '2021-04-29 17:19:42', ''),
(11, 2, '5th post', 'https://www.aesdes.org/wp-content/uploads/2020/01/boho2.jpg', '   heyy this is a dumb post                  ', '#this #is #a #dummy #caption', '2021-04-29 17:19:49', ''),
(12, 1, '3rd post', 'https://img.freepik.com/free-vector/social-media-template-puzzle-square-with-aesthetic-color_8259-95.jpg?size=626&ext=jpg', 'this is the 3rd post', '#3rd #post', '2021-04-29 17:22:15', 'blog'),
(13, 2, 'tester blog post', '', 'this is a dummy blog post', '#dummy', '2021-04-29 17:41:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `first_name`, `last_name`, `username`, `bio`, `email`, `user_image`) VALUES
(1, 'Gauri', 'Shinde', 'gauri_shinde', 'heyy this is our DBMS project', 'gaurishinde094@gmail.com', 'https://images.unsplash.com/photo-1556103255-4443dbae8e5a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cGhvdG9ncmFwaGVyfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80'),
(2, 'krushal', 'shah', 'krushal_shah', 'heyyyyyyyyyyyyyyyyyyyyyyyy', 'krushal@gmail.com', 'https://images.unsplash.com/photo-1541359927273-d76820fc43f9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGFlc3RoZXRpY3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_post`
--
ALTER TABLE `create_post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_post`
--
ALTER TABLE `create_post`
  MODIFY `postid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP DATABASE dbms_project ;
CREATE DATABASE dbms_projeect ;
USE DATABASE dbms_project ; 


CREATE TABLE newblogs(
	id int(11)PRIMARY Key AUTO_INCREMENT,
	userID int(11),
	title varchar(255),
	description blob,
    type varchar(45),
    commentsCount int(11),
    timestamp timestamp DEFAULT CURRENT_TIMESTAMP(),
    pictureUrl blob,
    comment varchar(45),
    hashtag varchar(45)
)

CREATE TABLE create_post(
	id int(11)PRIMARY Key AUTO_INCREMENT,
	userID int(11),
	title varchar(255),
	description blob,
    type varchar(45),
    commentsCount int(11),
    timestamp timestamp DEFAULT CURRENT_TIMESTAMP(),
    pictureUrl blob,
    comment varchar(45),
    hashtag varchar(45)
)

CREATE TABLE comments(
    id int(11) PRIMARY Key AUTO_INCREMENT,
    userID int(11),
    postID int(11),
    message varchar(255),
    timestamp timestamp DEFAULT CURRENT_TIMESTAMP()
)



CREATE TABLE users(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    email varchar(255),
    username varchar(45),
    profileUrl varchar(500),
    timestamp timestamp DEFAULT CURRENT_TIMESTAMP(),
    bio blob,
    skills blob,
    posts int(11),
    password varchar(255)
    vkey varchar (45) not null,
    verified int(1) DEFAULT 0 not null,
    createdate timestamp(6) DEFAULT CURRENT_TIMESTAMP(6)
)



#Verification mail will not be sent from you device so just go in users account and change verified to 1 and then login.
 $_SESSION['username'] = $u;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `getUsername`(`uid` INT UNSIGNED) RETURNS varchar(50) CHARSET utf8mb4
    READS SQL DATA
BEGIN
 DECLARE usern varchar(50);
 SELECT username into usern FROM users
 WHERE users.id = uid;
 RETURN usern;
END$$
DELIMITER ;

