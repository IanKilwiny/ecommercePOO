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

// $cart = new Cart();

// $cart->addProduct(2, 3);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="index.php" method="post" class="login-form">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="email" id="username" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="login-btn" name="submit">Entrar</button>
        </form>
    </div>

    <?php

       
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $userDB = new UserDB();

            if($userDB->verificarUsuario($email, $pass)){
                echo "<br>Usuário logado com sucesso";
            }else{
                echo "<br>Usuário inexistente";
            }
    ?>
</body>
</html>
