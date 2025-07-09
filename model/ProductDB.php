<?php

class ProductDB{
    private $con;

    function __construct(){

        $host = "localhost";
        $user = "root";
        $password = "1234";
        $dbname = "loja";

        $connectiondb = new ConnectionDB($host, $user, $password, $dbname);
        $this->con = $connectiondb -> conexao();

    }


    function insertProduct($name, $price, $stock){
        $query = "INSERT INTO product (name, price, stock) VALUES ('$name', '$price', '$stock')";

        $result = mysqli_query($this->con, $query);

        if(mysqli_affected_rows($this->con) > 0){
            echo "Produto cadastro";
        }else{
            echo "Erro ao adicionar produto";
        }

        mysqli_close($this->con);
    }
}