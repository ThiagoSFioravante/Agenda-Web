<?php
$servername="localhost";
$username="root";
$password="";
$dbname="agendajn";

$conexao=mysqli_connect($servername, $username, $password, $dbname);

if(!$conexao)
die("Falha de Conexão:".mysqli_connect_error());

?>
