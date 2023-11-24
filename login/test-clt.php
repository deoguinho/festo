<!-- SCRIPT PARA AUTENTICA��O DO LOGIN -->

<?php
session_start();
session_destroy();
session_start();
// print_r($_REQUEST);
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Acesso ao sistema
    include_once('../conexao-mysql/conexao-banco.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // print_r($email);
    // print_r('<br>');
    // print_r($senha);

    $sql = "SELECT * FROM clientes WHERE email = '$email' and senha = '$senha'";


    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();

    // print_r($sql);
    // print_r($result);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: log-clt.html');
    } else {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: ../sistema/homepage.php');
    }
} else {
    // Não acessa
    header('Location: log-clt.html');
}
?>