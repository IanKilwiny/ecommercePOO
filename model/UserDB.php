<?php
require_once("model/ConnectionDB.php");

class UserDB{
    private $con;

    function __construct(){

        $host = "localhost";
        $user = "root";
        $password = "1234";
        $dbname = "loja";

        $connectiondb = new ConnectionDB($host, $user, $password, $dbname);
        $this->con = $connectiondb -> conexao();

    }


    function insertUser($name, $email){
        $query = "INSERT INTO `user` (name, email) VALUES ('$name', '$email')";

        $result = mysqli_query($this->con, $query);

        if(mysqli_affected_rows($this->con) > 0){
            echo "dados adicionados";
        }

    }

    function verificarUsuario($email, $password){
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->con, $sql);


        return true ? mysqli_num_rows($result) > 0 : false;
    }

    function buscarIdUser($email){
        $sql = "SELECT * FROM user WHERE email = $email";

        $result = mysqli_query($this->con, $sql);

        $dados = mysqli_fetch_assoc($result);

        return $dados["id"];
    }
}






