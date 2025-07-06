CREATE DATABASE loja;
USE loja;

CREATE TABLE `user` (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE product (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    price DOUBLE NOT NULL,
    stock INT DEFAULT 0
);

CREATE TABLE cart_product (
	id INT PRIMARY KEY AUTO_INCREMENT,
    qtd INT DEFAULT 0,
    fk_product INT,
    
	CONSTRAINT fk_cart_product_product FOREIGN KEY (fk_product) REFERENCES product(id)
);

CREATE TABLE cart (
	id INT PRIMARY KEY AUTO_INCREMENT,
    fk_cart_product INT,
    fk_user INT,
    
    CONSTRAINT fk_cart_user FOREIGN KEY (fk_user) REFERENCES `user`(id),
    CONSTRAINT fk_cart_cartproduct FOREIGN KEY (fk_cart_product) REFERENCES cart_product(id)
);


INSERT INTO `user` (name, email) VALUES ("Ian Kilwiny", "iankilwiny@gmail.com");

INSERT INTO product (name, price, stock) VALUES ("Xbox Series S", 2300, 5);
INSERT INTO product (name, price, stock) VALUES ("Iphone 12", 3200, 7);

INSERT INTO cart_product (qtd, fk_product) VALUES (2, 1); -- Xbox
INSERT INTO cart_product (qtd, fk_product) VALUES (3, 2); -- iPhone


INSERT INTO cart (fk_cart_product, fk_user) VALUES (1, 1);
INSERT INTO cart (fk_cart_product, fk_user) VALUES (2, 1);


SELECT 
    u.name AS usuario, 
    pr.name AS produto
FROM `user` u
INNER JOIN cart ca ON ca.fk_user = u.id
INNER JOIN cart_product cp ON ca.fk_cart_product = cp.id
INNER JOIN product pr ON pr.id = cp.fk_product;
