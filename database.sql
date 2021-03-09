CREATE DATABASE IF NOT EXISTS bd_test;
USE bd_test;

CREATE TABLE product(
id           int(10) auto_increment NOT NULL,
name         varchar(100) NOT NULL,
description  text NULL,
price        decimal(10,4) NOT NULL,
created_at   datetime DEFAULT CURRENT_TIMESTAMP,
update_at    datetime DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT pk_product PRIMARY KEY(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
