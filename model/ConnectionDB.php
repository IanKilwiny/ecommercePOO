<?php

class ConnectionDB{
    
    private $con;

    function __construct($host, $user, $password, $db)
    {
        $this->con = new mysqli($host, $user, $password, $db);

    }

    function conexao(){
        if(!$this->con) die ("Error ao conectar o banco de dados: ".mysqli_error($this->con));

        return $this->con;
    }


}









