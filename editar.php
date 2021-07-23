<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_contato = "SELECT * FROM contato WHERE id = '$id'";
$resultado_cont = mysqli_query($conexao, $result_contato);
$linha_contato = mysqli_fetch_assoc($resultado_cont);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="">
    <title>Editar Contato</title>
</head>

<body>
    <div class="menu">
        <nav class="content">
            <ul>
                <li> <a href="index.php"> Voltar para a Agenda </a></li>
                <li> <a href="cadastrar.php"> Adicionar Novo Contato </a></li>
            </ul>
        </nav>
    </div>
    <div class="form">
        <h1 class="h1cad">EDITAR CONTATO</h1>
        <form method="POST" action="proeditar.php" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $linha_contato['id']; ?>">
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="  Informe o Nome" required value="<?php echo $linha_contato['nome']; ?>">
            </div>

            <div class="campo">
                <label for="telefone">Telefone:</label>
                <input type="phone" name="telefone" maxlength="20" id="telefone" onblur="mascaraDeTelefone(this)" placeholder="  Informe o Telefone" required value="<?php echo $linha_contato['telefone']; ?>">
            </div>

            <div class="campo">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" maxlength="50" id="endereco" placeholder="  Informe o Endereço" required value="<?php echo $linha_contato['endereco']; ?>">
            </div>

            <fieldset class="ufcidade">
                <div class="campo">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" required>
                        <option selected disabled value="">Selecione</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" maxlength="50" id="cidade" placeholder="  Informe a Cidade" required value="<?php echo $linha_contato['cidade']; ?>">
                </div>
            </fieldset>

            <div>
                <input type="submit" value="editar" class="btnedit">
            </div>
        </form>
    </div>
</body>
<script src="js/mask.js"></script>

</html>