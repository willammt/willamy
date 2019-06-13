<?php
 //DSN - Data Source Name
 $prefixo = "mysql:";
 $hostname = "localhost";
 $dbname = "dbsenai";
 $dsn = $prefixo."dbname=". $dbname . ";" . "hostname=". $hostname;
 $user = "root";
 $password = "";

 //PDO - Classe PHP para a inserção de dados

 //Try e Catch serve para retornar erros
 try {
$pdo = new PDO($dsn,$user,$password);

//echo $sql

 }catch(\trowable $th){
        echo $erro->getMessage(); 
 }

?>