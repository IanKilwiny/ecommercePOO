-- Criação do banco de dados e uso
CREATE DATABASE loja;
USE loja;

-- Tabela de usuários
CREATE TABLE `user` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(10) NOT NULL
);

-- Tabela de produtos
CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    price DOUBLE NOT NULL,
    stock INT DEFAULT 0
);

-- Tabela de carrinhos de compras (cada carrinho pertence a um usuário)
CREATE TABLE cart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fk_user INT,
    CONSTRAINT fk_cart_user FOREIGN KEY (fk_user) REFERENCES `user`(id)
);

-- Tabela de relação entre carrinhos e produtos (quantidade de cada produto no carrinho)
CREATE TABLE cart_product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fk_cart INT,
    fk_product INT,
    qtd INT DEFAULT 0,
    CONSTRAINT fk_cart_product_cart FOREIGN KEY (fk_cart) REFERENCES cart(id),
    CONSTRAINT fk_cart_product_product FOREIGN KEY (fk_product) REFERENCES product(id)
);

-- Inserção de dados de usuários
INSERT INTO `user` (name, email, password) VALUES ("Ian Kilwiny", "iankilwiny@gmail.com", "12345");

-- Inserção de dados de produtos
INSERT INTO product (name, price, stock) VALUES ("Xbox Series S", 2300, 5);
INSERT INTO product (name, price, stock) VALUES ("Iphone 12", 3200, 7);

-- Inserção de carrinho para o usuário
INSERT INTO cart (fk_user) VALUES (1);

-- Inserção de produtos no carrinho, com a quantidade de cada
INSERT INTO cart_product (fk_cart, fk_product, qtd) VALUES (1, 1, 2); -- Xbox Series S, 2 unidades
INSERT INTO cart_product (fk_cart, fk_product, qtd) VALUES (1, 2, 3); -- Iphone 12, 3 unidades

-- Consulta para ver os produtos no carrinho de um usuário
SELECT 
    u.name AS usuario, 
    pr.name AS produto,
    cp.qtd AS quantidade,
    pr.price AS preco_unitario,
    pr.price * cp.qtd AS total
FROM `user` u
INNER JOIN cart ca ON ca.fk_user = u.id
INNER JOIN cart_product cp ON ca.id = cp.fk_cart
INNER JOIN product pr ON pr.id = cp.fk_product
WHERE u.id = 1;  -- Exemplo: Exibindo para o usuário com ID 1
