<!-- SCRIPT PARA A P?GINA DE PERFIL DO USU?RIO -->

<?php
header("Content-type: text/html; charset=ISO-8859-1");
session_start();
// print_r($_SESSION);
include_once("../conexao-mysql/conexao-banco.php");
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login/log-clt.php');
}
$logado = $_SESSION['email'];

$sql = "SELECT * FROM clientes ORDER BY id DESC";

$result = $conexao->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Cliente</title>
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/sistemas.css">
    <link rel="icon" type="image/x-icon" href="../assets/festo.ico">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body>

    <!-- HEADER SECTION  -->

    <div class="header">
        <div>
            <?php
            if (isset($_SESSION["id"]) == true) {
                echo '<a href="../sistema/homepage.php"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png" /></a>';
            } else {
                echo '<a href="index.html"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png" /></a>';

            }
            ?>
        </div>
        <div class="buttonstop">
            <a class="btnstop" href="../suporte/suporte.html">Suporte</a>
            <?php
            if (isset($perfil) && $perfil == 2) {
                echo '<a class="btnstop btnstopcadastro" id="btnborder" href="../sistema/sys-prest.php">Gerenciar</a>';
            }
            ?>
            <a class="btnstop btnstopcadastro" id="btnborder" href="../servicos/meus-pedidos.php">Meus pedidos</a>
        </div>
    </div>

    <!-- HEADER SECTION  -->
    
    <div class="banner-logado">
        <?php
        echo "<h1>Bem vindo <u>". $row["nome"]. "</u></h1>";
        ?>
    </div>
    <div class="fazer-pedido">
        <h4>Fa�a agora seu pedido personalizado para sua festa!</h4>
        <a href="../servicos/novo-pedido.php" class="botao btnpedido">Fazer novo pedido</a>
    </div>
    <hr>
    <h2>Dados do perfil</h2>
    <table>
        <tbody>
            <?php
            while ($user_data = mysqli_fetch_assoc($result)) {
                echo "<div class='classe'>";

                echo "<ul class='dados-perfil'><li><img src='../assets/placeholder.jpg' width='100px'></li></ul>";
                echo "<ul class='dados-perfil' id='aa'>";
                echo "<li>Nome Completo: </li>";
                echo "<li>Email: </li>";
                echo "<li>Telefone: </li>";
                echo "<li>Cidade:</li>";
                echo "<li>Estado:</li>";
                echo "<li>Endere�o:</li>";
                echo "</ul>";

                echo "<ul class='dados-perfil'>";
                echo "<li>" . $user_data["nome"] . "</li>";
                echo "<li>" . $user_data["email"] . "</li>";
                echo "<li>" . $user_data["telefone"] . "</li>";
                echo "<li>" . $user_data["cidade"] . "</li>";
                echo "<li>" . $user_data["estado"] . "</li>";
                echo "<li>" . $user_data["endereco"] . "</li>";
                echo "</ul>";

                echo "</div>";
                echo "<ul class='a'>";
                echo "<a class='btn btn-sm btn-primary' href='edt-clt.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                    </a>";
                echo "<br>" . "<a class='btn btn-sm btn-danger' id='bt' href='dlt-clt.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg>
                    </a>";
                echo "</ul>";
            }
            ?>
            </div>


</body>

</html>