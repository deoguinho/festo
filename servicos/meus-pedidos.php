<!-- SCRIPT PARA A P?GINA DE PERFIL DO USU?RIO -->

<?php
header("Content-type: text/html; charset=UTF-8");
session_start();
// print_r($_SESSION);
include_once("../conexao-mysql/conexao-banco.php");
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login/login-prest.php');
}
$id = $_SESSION['id'];
$logado = $_SESSION['email'];
$sql = "SELECT * FROM prestadores where id = $id";
$result = $conexao->query($sql);

// meus serviços
$sql = "SELECT * from contratado INNER JOIN clientes ON contratado.id_cliente = clientes.id INNER JOIN servicos_prestadores ON servicos_prestadores.id_serv = contratado.id_serv;";

$resultServico = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Prestador</title>
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/prestadorperfil.css">
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

    <!-- Perfil SECTION  -->
    <div>
        <h2>Meu perfil</h2>
    </div>
    <section id="perfil">
        <div>
            <img src='../assets/placeholder.jpg' width='100px'>
        </div>
        <div class="perfil_text">
            <?php
            while ($user_data = mysqli_fetch_assoc($result)) {
                echo '<h3>' . $user_data["nome"] . '</h3>';
                echo '<p>' . $user_data["email"] . '</p>';
                echo '<p>' . $user_data["telefone"] . '</p>';
                echo '<p>' . $user_data["endereco"] . ' - ' . $user_data["cidade"] . '/' . $user_data["estado"] . '</p>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<div>';
                echo "<a class='editar_perfil' href='../sistema/edt-clt.php?id=$user_data[id]'>Editar perfil</a>";
                echo "<a class='excluir_perfil' href='dlt-prest.php?id=$user_data[id]'>Excluir perfil</a>";
                echo '</div>';

            }
            ?>
        </div>
    </section>
    <hr>
    <br>
    <div class="fazer">
        O que fazer agora?
        <br> <br> <br> <a href="../sistema/homepage.php" class="botao btnpedido">Realizar novo pedido</a>
    </div>
    <br>
    <hr>
    <section>
        Meu serviços
        <div class="servicos">
            <?php
            while ($servicoData = mysqli_fetch_assoc($resultServico)) {
                echo '<div class="servicos_block">';
                echo '<img src="../assets/sitioexemplo.jpg" width="100px">';
                echo '<h3>' . $servicoData["nome"] . '</h3>';
                echo '<h3>' . $servicoData["nome_serv"] . '</h3>';
                echo '<p>' . $servicoData["finalidade"] . '</p>';
                echo '<p>' . $servicoData["preco"] . '</p>';
                echo '<p>' . $servicoData["dias"] . '</p>';
                echo '<p>' . $servicoData["cidades"] . '</p>';
                echo '<p>' . $servicoData["tam_equipe"] . '</p>';
                echo '<p>' . $servicoData["fornecedor"] . '</p>';
                echo '<p>' . $servicoData["contato"] . '</p>';
                echo '<p>' . $servicoData["pix"] . '</p>';
                // echo "<a class='editar_perfil' href='../servicos/edt-serv.php?id=$servicoData[id_serv]'>Editar</a>";
                echo "<a class='excluir_perfil' href='../servicos/dlt-serv.php?id=$servicoData[id_serv]'>Excluir</a>";
                echo '</div>';
            }

            ?>



        </div>
        <table>
            <tbody>
                <?php
                while ($servicoData = mysqli_fetch_assoc($resultServico)) {
                    echo "<div class='classe'>";

                    echo "<ul class='aaaa'><li><img src='../assets/placeholder.jpg' width='100px'></li></ul>";
                    echo "<ul class='aaaa' id='aa'>";
                    echo "<li>Nome do servi�o: </li>";
                    echo "<li>Finalidade: </li>";
                    echo "<li>Pre�o: </li>";
                    echo "<li>Dias dispon�veis:</li>";
                    echo "<li>Cidades atendidas:</li>";
                    echo "<li>Tamanho da equipe:</li>";
                    echo "<li>Fornecedor: </li>";
                    echo "<li>Contato: </li>";
                    echo "<li>Chave PIX: </li>";
                    echo "</ul>";

                    echo "<ul class='aaaa'>";
                    echo "<li>" . $servicoData["nome_serv"] . "</li>";
                    echo "<li>" . $servicoData["finalidade"] . "</li>";
                    echo "<li>" . $servicoData["preco"] . "</li>";
                    echo "<li>" . $servicoData["dias"] . "</li>";
                    echo "<li>" . $servicoData["cidades"] . "</li>";
                    echo "<li>" . $servicoData["tam_equipe"] . "</li>";
                    echo "<li>" . $servicoData["fornecedor"] . "</li>";
                    echo "<li>" . $servicoData["contato"] . "</li>";
                    echo "<li>" . $servicoData["pix"] . "</li>";
                    echo "</ul>";

                    echo "</div>";
                    echo "<ul class='a'>";
                    echo "<a class='btn btn-sm btn-primary' href='edt-serv.php?id=$servicoData[id_serv]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                    </a>";
                    echo "<br>" . "<a class='btn btn-sm btn-danger' id='bt' href='dlt-serv.php?id=$servicoData[id_serv]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg>
                    </a>";
                    echo "</ul>";
                }
                ?>
            </tbody>
        </table>
    </section>
    </div>

</body>

</html>