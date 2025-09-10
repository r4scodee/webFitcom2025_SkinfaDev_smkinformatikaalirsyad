CREATE DATABASE smart_farm_db;
USE smart_farm_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,  -- Kode unik produk
    name VARCHAR(100) NOT NULL,        
    price DECIMAL(10,2) NOT NULL,      
    image VARCHAR(255) DEFAULT NULL,  
    supplier VARCHAR(100) NOT NULL     
);