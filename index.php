<?php
require_once("classes/Product.class.php");
require_once("classes/User.class.php");
require_once("classes/Cart.class.php");
require_once("classes/Order.class.php");

require_once("model/UserDB.php");
require_once("model/ProductDB.php");
require_once("model/CartDB.php");

// Cadastrando produtos
// $p1 = new Product("Galaxy S23 Ultra", 4500, 10);
// $p2 = new Product("iPhone 16", 7500, 2);
// $p3 = new Product("Dell Inspiron 15", 3500, 3);

// $user = new User("Nicolas Dias", "nicolas@ifce.edu.br");

// $pedido = new Order();
// $pedido->addProduct($p3, 1);
// $pedido->addProduct($p2, 2);
// $pedido->addProduct($p1, 5);


// $pedido->checkout($user)

// $product = new ProductDB();

// $product->insertProduct("Playstation 5", 4500, 50);

// $cart = new CartDB();

// $cart->createCart(1, 2);
// $cart->addPurchace(1, 1);

// $userDB = new UserDB();

// $existeUsuario = $userDB ->verificarUsuario("iankilwiy@gmail.com", "12345");

// if($existeUsuario){
//     echo "Usuário logado!";
// }else{
//     echo "Usuário Inexistente";
// }

$cart = new Cart();

$cart->addProduct(2, 3);
