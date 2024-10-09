CREATE DATABASE IF NOT EXISTS sparepart_motor;
USE sparepart_motor;

CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT(11) NOT NULL,
    password VARCHAR(255) NOT NULL
);
