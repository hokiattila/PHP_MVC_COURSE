CREATE DATABASE IF NOT EXISTS product_db;
USE product_db;

CREATE USER IF NOT EXISTS 'product_db_user'@'localhost' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON product_db.* TO 'product_db_user'@'localhost';

CREATE TABLE IF NOT EXISTS product(
	id INT  AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	description VARCHAR(125) NOT NULL
);

INSERT INTO product(name, description) VALUES
('Milk', 'Fresh farm milk'),
('Flour', 'Great for baking'),
('Sugar', 'For flavoring tea');
