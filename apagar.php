<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_contato = "DELETE FROM contato WHERE id='$id'";
$resultado_cont = mysqli_query($conexao, $result_contato);

if(mysqli_affected_rows($conexao)){
    echo"<script language='javascript' type='text/javascript'>
         alert('Contato apagado com sucesso!');window.location.
         href='index.php'</script>";
} 
else{
    echo"<script language='javascript' type='text/javascript'>
         alert('Erro ao tentar apagar contato!')window.location.;
         href='index.php'</script>";
}
?>