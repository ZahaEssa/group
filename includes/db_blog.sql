CREATE DATABASE blog_db;
 
CREATE TABLE blog_writing(
authorname VARCHAR(80),
articletitle VARCHAR(150),
articletext longtext,
publicationdate TIMESTAMP DEFAULT current_timestamp
);

CREATE TABLE IF NOT EXISTS verify (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    token VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    expiry_time DATETIME NOT NULL,
    authorusername VARCHAR(50),
authorpassword VARCHAR(200)

);


drop table author;
select*from verify;
select*from author;
