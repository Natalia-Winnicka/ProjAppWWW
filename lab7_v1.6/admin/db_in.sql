CREATE DATABASE IF NOT EXISTS moja_strona;

USE moja_strona;

CREATE TABLE IF NOT EXISTS page_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_title VARCHAR(255),
    page_content TEXT,
    status INT DEFAULT 1
);