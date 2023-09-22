CREATE DATABASE blog_db;
 

CREATE TABLE IF NOT EXISTS verify (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    token VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    expiry_time DATETIME NOT NULL,
    authorusername VARCHAR(50),
authorpassword VARCHAR(200),
registration_date datetime DEFAULT current_timestamp()

);

);
CREATE TABLE `blog_writing` (
  `authorname` varchar(80) NOT NULL,
  `articletitle` varchar(150) NOT NULL,
  `articletext` longtext NOT NULL,
  `publicationdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `article_id` int(11) NOT NULL auto_increment,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



drop table author;
select*from verify;
select*from author;
drop table verify;
drop table blog_writing;



