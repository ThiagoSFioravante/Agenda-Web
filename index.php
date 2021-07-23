<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Home</title>
</head>

<body>
    <div class="menu">
        <nav class="content2">
            <ul>
                <li> <a href="cadastrar.php"> Adicionar Novo Contato </a></li>
            </ul>
        </nav>
    </div>
    <center>
        <h1 class="lista">LISTA DE CONTATOS</h1>
        <?php

        $primeira_pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina_atual = (!empty($primeira_pagina)) ? $primeira_pagina : 1;

        $qnt_resultpg = 3;

        $inicio = ($qnt_resultpg * $pagina_atual) - $qnt_resultpg;

        $r_contatos = "SELECT * FROM contato 
        LIMIT $inicio, $qnt_resultpg";
        $result_contato = mysqli_query($conexao, $r_contatos);
        while ($row_contato = mysqli_fetch_assoc($result_contato)) {
            echo '<div class="master">';
            echo '<div class="registro">';
            echo "Nome: " . $row_contato['nome'] . "<br>";
            echo "Telefone: " . $row_contato['telefone'] . "<br>";
            echo "Endereço: " . $row_contato['endereco'] . "<br>";
            echo "Estado: " . $row_contato['estado'] . "<br>";
            echo "Cidade: " . $row_contato['cidade'] . "<br>";
            echo "<a href='editar.php?id=" . $row_contato['id'] . "' title='EDITAR CONTATO'>
                    <img src='imagens/editaricon.png' alt='' class='imgbtn'>
                  </a>";
            echo "<a href='apagar.php?id=" . $row_contato['id'] . "' title='APAGAR CONTATO'>
                    <img src='imagens/apagaricon.png' alt='' class='imgbtn'>
                  </a>";
            echo '</div>';
            echo '</div>';
        }

        $resultpg = "SELECT COUNT(id) AS num_result FROM contato";
        $r_paginas = mysqli_query($conexao, $resultpg);
        $linhapg = mysqli_fetch_assoc($r_paginas);

        $qnt_pg = ceil($linhapg['num_result'] / $qnt_resultpg);

        echo '<div class="divpg">';
        echo "<a href='index.php?pagina=1' class='pg'> << </a>";

        for ($pg_anterior = $pagina_atual - 1; $pg_anterior <= $pagina_atual - 1; $pg_anterior++) {
            if ($pg_anterior >= 1) {
                echo "<a href='index.php?pagina=$pg_anterior' class='pg'> $pg_anterior </a>";
            }
        }

        echo  "<b>$pagina_atual</b>";

        for ($pg_posterior = $pagina_atual + 1; $pg_posterior <= $pagina_atual + 1; $pg_posterior++) {
            if ($pg_posterior <= $qnt_pg) {
                echo "<a href='index.php?pagina=$pg_posterior' class='pg'> $pg_posterior </a>";
            }
        }
        echo "<a href='index.php?pagina=$qnt_pg' class='pg'> >> </a>";
        echo '</div>';
        ?>
    </center>
</body>

</html>