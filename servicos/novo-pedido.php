<!-- SCRIPT DA Pï¿½GINA FORMS DA CRIAï¿½ï¿½O DO SERVIï¿½O DO PRESTADOR -->

<?php
header("Content-type: text/html; charset=ISO-8859-1");
if (isset($_POST['submit'])) {
    include_once('../conexao-mysql/conexao-banco.php');

    $nome_serv = $_POST['nome_serv'];
    $finalidade = $_POST['finalidade'];
    $dias = $_POST['dias'];
    $cidades = $_POST['cidades'];
    $cliente = $_POST['cliente'];
    $contato = $_POST['contato'];

    $result = mysqli_query($conexao, "INSERT INTO servicos_clientes(nome_serv,finalidade,dias,cidades,cliente,contato) VALUES ('$nome_serv','$finalidade','$dias','$cidades','$cliente','$contato')");

    header("Location: ../sistema/sys-clt.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar pedido</title>
    <link rel="icon" type="image/x-icon" href="../assests/festo.ico">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>
    <div class="box">
        <form action="novo-pedido.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Cadastrar novo pedido</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome_serv" id="nome_serv" class="inputUser" required>
                    <label for="nome_serv" class="labelInput">Pedido</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="finalidade" id="finalidade" class="inputUser" required>
                    <label for="finalidade" class="labelInput">Finalidade (Ex: Casamento, Shows, etc)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="dias" id="dias" class="inputUser" required>
                    <label for="dias" class="labelInput">Data</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidades" id="cidades" class="inputUser" required>
                    <label for="cidades" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cliente" id="cliente" class="inputUser" required>
                    <label for="cliente" class="labelInput">Cliente (Quem fez o pedido)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="contato" id="contato" class="inputUser" required>
                    <label for="contato" class="labelInput">Contato</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
                <br><br>
                <a class="link" href="../sistema/sys-clt.php">Voltar</a>
            </fieldset>
        </form>
    </div>
    <script src="../js/servicos.js"></script>
</body>
</html>