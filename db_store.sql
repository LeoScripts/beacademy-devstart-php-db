CREATE DATABASE db_store;

USE db_store;

CREATE TABLE tb_category (
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL 
  description VARCHAR(100) NOT NULL
);

INSERT INTO  tb_category (name, description)
VALUES
('informatica', 'coisas de informatica'),
('escritorio', 'coisas de escritorio'),
('papelaria', 'coisas de papelaria');