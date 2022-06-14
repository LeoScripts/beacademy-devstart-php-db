CREATE DATABASE db_store;

USE db_store;

CREATE TABLE tb_category (
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL, 
  description VARCHAR(100) NOT NULL
);

CREATE TABLE tb_product (
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL, 
  description VARCHAR(100) NOT NULL,
  photo VARCHAR(255) NOT NULL,
  price FLOAT(5,2) NOT NULL,
  category_id INT(11) NOT NULL,
  quantity INT(5) NOT NULL,
  created_at DATETIME NOT NULL
);


INSERT INTO  tb_category (name, description)
VALUES
('informatica', 'coisas de informatica'),
('escritorio', 'coisas de escritorio'),
('papelaria', 'coisas de papelaria');