<?php
    session_start();
    include_once("conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); 
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
   
    $result_contato = "UPDATE contato SET nome = '$nome', telefone = '$telefone', endereco = '$endereco', 
    estado = '$estado', cidade = '$cidade' WHERE id ='$id'";

    $resultado = mysqli_query($conexao, $result_contato);

    if(mysqli_affected_rows($conexao)){
        echo"<script language='javascript' type='text/javascript'>
             alert('Contato editado com sucesso!');window.location.
             href='index.php'</script>";
    } 
    else{
        echo"<script language='javascript' type='text/javascript'>
             alert('Erro ao tentar editar contato!');window.location.
             href='editar.php?id=$id'</script>";
    }
