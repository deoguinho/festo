<!-- SCRIPT PARA AUTENTICA��O DO LOGIN -->

<?php
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

    $sql = "SELECT * FROM prestadores WHERE email = '$email' and senha = '$senha'";


    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
    // print_r($sql);
    // print_r($result);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: log-prest.html');
    } else {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['senha'] = $row['senha'];
        $_SESSION['perfil'] = $row['perfil'];
        header('Location: ../sistema/homepage.php');
    }
} else {
    // Não acessa
    header('Location: log-prest.html');
}
?>