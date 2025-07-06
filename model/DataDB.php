<?php
require_once("model/ConnectionDB.php");

class DataDB{
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

        mysqli_close($this->con);
    }
}



$datadb = new DataDB();

$datadb->insertUser("Joao Carlos", "carlos123@gmail.com");

