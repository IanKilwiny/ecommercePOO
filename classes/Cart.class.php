<?php

require("model/CartDB.php");

class Cart {
    protected $items = [];
    protected $cartDB;
    


    function __construct()
    {
        $this->cartDB = new CartDB();
        $this->cartDB->createCart(1); // adicionar o id do usuário pelo session
    }

    public function addProduct($idProduct, $quantity) {

        $idCart = $this->buscarCart(1);

        $sql = "INSERT INTO cart_product(fk_product, fk_cart, qtd) VALUES ('$idProduct', '$idCart', '$quantity')";
        
        $con =$this->cartDB->conexao();

        $result = mysqli_query($con, $sql);

        if(!$result) die("Erro ao adicionar produto: ".mysqli_error($this->cartDB->conexao()));

    }

    public function listCart() {
        // foreach ($this->items as $item) {
        //     echo $item['product']->getInfo() . " - Quantidade: {$item['quantity']}<br>";
        // }
    }

    public function getTotal() {
    //     $total = 0;
    //     foreach ($this->items as $item) {
    //         $total += $item['product']->getPrice() * $item['quantity'];
    //     }
    //     return $total;
    }


    public function buscarCart($idUser){
        $sql = "SELECT * from cart where fk_user=$idUser";

        $con = $this->cartDB->conexao();

        $result = mysqli_query($con, $sql);

        $dados = mysqli_fetch_assoc($result);

        $idCart = $dados["id"];

        echo $idCart;

        return $idCart;
    }
}
