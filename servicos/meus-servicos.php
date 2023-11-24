<!-- SCRIPT DA LISTAGEM EDIÇÃO E EXCLUSÃO DOS SERVICOS -->
<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");

include_once("../conexao-mysql/conexao-banco.php");

// ID do cliente
$id = $_SESSION['id'];

//ID do serviço


$sql = "SELECT * from contratado INNER JOIN clientes ON contratado.id_cliente = clientes.$id INNER JOIN servicos_prestadores ON servicos_prestadores.id_serv = contratado.id_serv";

$result = $conexao->query($sql);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus servicos</title>
    <link rel="icon" type="image/x-icon" href="assets/festo.ico">
    <link rel="stylesheet" href="../css/sistemas.css">
</head>

<body>
    <div class="banner">
        <a href="../sistema/sys-prest.php">Voltar</a>
        <h1>
            Meus servicos
        </h1>
        <table>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
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
                    echo "<li>" . $user_data["quantas_pessoas"] . "</li>";
                    echo "<li>" . $user_data["dia"] . "</li>";
                    echo "<li>" . $user_data["preco"] . "</li>";
                    echo "<li>" . $user_data["dias"] . "</li>";
                    echo "<li>" . $user_data["cidades"] . "</li>";
                    echo "<li>" . $user_data["tam_equipe"] . "</li>";
                    echo "<li>" . $user_data["fornecedor"] . "</li>";
                    echo "<li>" . $user_data["contato"] . "</li>";
                    echo "<li>" . $user_data["pix"] . "</li>";
                    echo "</ul>";

                    echo "</div>";
                    echo "<ul class='a'>";
                    echo "<a class='btn btn-sm btn-primary' href='edt-serv.php?id=$user_data[id_serv]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                    </a>";
                    echo "<br>" . "<a class='btn btn-sm btn-danger' id='bt' href='dlt-serv.php?id=$user_data[id_serv]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg>
                    </a>";
                    echo "</ul>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>