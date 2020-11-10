<?php
$username = "Jas";
$password = "Saida2103";
$banco   = "desenvolvimentoweb";
$host =    "localhost";


try{
    $conn = new PDO("mysql:host={$host};dbname={$banco};charset=utf8", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "Erro: {$erro->getMessage()}";
}








?>