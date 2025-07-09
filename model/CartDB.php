<?php
class CartDB{
    private $con;

    function __construct(){

        $host = "localhost";
        $user = "root";
        $password = "1234";
        $dbname = "loja";

        $connectiondb = new ConnectionDB($host, $user, $password, $dbname);
        $this->con = $connectiondb -> conexao();

    }


    function createCart($idUser){
        $query = "INSERT INTO cart_product (fk_product) VALUES ('$idUser')";

        $result = mysqli_query($this->con, $query);

        if(mysqli_affected_rows($this->con) > 0){
            echo "Carrinho Criado";
        }else{
            echo "Erro ao criar o carrinho: ".mysqli_error($this->con);
        }

    }


    function addPurchace($idUser, $idCarrinho){
        $query = "INSERT INTO purchase(fk_user, fk_cart_product) VALUES ('$idUser', '$idCarrinho')";

        $result = mysqli_query($this->con, $query);

        if(mysqli_affected_rows($this->con) > 0){
            echo "Produto adicionado a venda";
        }else{
            echo "Erro na venda: ".mysqli_error($this->con);
        }

    }

    function conexao(){
        return $this->con;
    }
}