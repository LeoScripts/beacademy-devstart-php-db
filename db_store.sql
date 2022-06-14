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

INSERT INTO  tb_product (name, description, photo, price, category_id, quantity, created_at)
VALUES
('teclado','teclado mecanico','https://m.media-amazon.com/images/I/71xVYmz-y9S._AC_SY450_.jpg',199.99,1,50,'2022-05-10 22:10:34'),
('mouse','mouse gamer','https://m.media-amazon.com/images/I/416XwN-ZiHL._AC_.jpg',250.50,1,10,'2022-05-10 22:20:34'),
('monitor','monitor gamer de 24 pol.','https://m.media-amazon.com/images/I/61QJlo+D8pL._AC_SY450_.jpg',188.99,1,5,'2022-05-10 22:22:34');
