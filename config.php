<?php
session_start();
global $pdo;
try {
$db="mysql:dbname=classificados;host=localhost";
$user="root";
$pass="";

   $pdo=new PDO("$db","$user","$pass");
} catch (PDOException $e) {
   echo "Falhou: ".$e->getMessage();
   exit;
}


?>