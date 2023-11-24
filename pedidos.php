<!-- SCRIPT DA LISTAGEM EDIÇÃO E EXCLUSÃO DOS SERVICOS -->
<?php
header("Content-type: text/html; charset=ISO-8859-1");

include_once("conexao-mysql/conexao-banco.php");

$sql = "SELECT * FROM servicos_clientes ORDER BY id_serv DESC";

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus pedidos</title>

    <!-- LINKS -->

    <link rel="icon" type="image/x-icon" href="assets/festo.ico">
    <link rel="stylesheet" href="css/sistemas.css">

    <!-- LINKS -->
</head>

<body>

    <!-- HEADER -->

    <a href="index.html">Voltar</a>

    <!-- HEADER -->

    <!-- SECTION PEDIDOS -->

    <div class="banner">
        <h1>
            Pedidos recentes
        </h1>
        <table>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<div class='classe'>";

                    echo "<ul class='dados-perfil' id='aa'>";
                    echo "<li>Pedido: </li>";
                    echo "<li>Finalidade: </li>";
                    echo "<li>Data: </li>";
                    echo "<li>Local:</li>";
                    echo "<li>Cliente:</li>";
                    echo "<li>Contato:</li>";
                    echo "</ul>";

                    echo "<ul class='dados-perfil'>";
                    echo "<li>" . $user_data["nome_serv"] . "</li>";
                    echo "<li>" . $user_data["finalidade"] . "</li>";
                    echo "<li>" . $user_data["dias"] . "</li>";
                    echo "<li>" . $user_data["cidades"] . "</li>";
                    echo "<li>" . $user_data["cliente"] . "</li>";
                    echo "<li>" . $user_data["contato"] . "</li>";
                    echo "</ul>";
                    echo "</div>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- SECTION PEDIDOS -->

</body>

</html>