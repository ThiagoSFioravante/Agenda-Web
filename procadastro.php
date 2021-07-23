<?php
    session_start();

    include_once("conexao.php");

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

   
   $result_contato = "INSERT INTO contato (nome, telefone, endereco, estado, cidade) 
   VALUES ('$nome', '$telefone', '$endereco', '$estado', '$cidade')";

    $resultado = mysqli_query($conexao, $result_contato);

    if(mysqli_insert_id($conexao)){
        echo"<script language='javascript' type='text/javascript'>
             alert('Contato adicionado a agenda!');window.location.
             href='index.php'</script>";
    } 
    else{
        echo"<script language='javascript' type='text/javascript'>
             alert('Erro ao inserir contato a agenda!');window.location.
             href='cadastrar.php'</script>";
    }
    
?>