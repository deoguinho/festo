<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifique o email enviado pelo formulário
    $email = $_POST['email'];

    // Verifique se o email existe no banco de dados
    if (emailExisteNoBancoDeDados($email)) {
        // Redirecione para a próxima tela de redefinição de senha
        header('Location: rdf-prest.php?email=' . urlencode($email));
        exit;
    } else {
        // Se o email não existir, exiba uma mensagem de erro
        echo "O email fornecido não existe.";
    }
}

function emailExisteNoBancoDeDados($email)
{
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'cadastro');

    // Verifique se houve algum erro na conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepare a consulta para verificar se o email existe
    $stmt = $conn->prepare("SELECT COUNT(*) FROM prestadores WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Obtenha o resultado da consulta
    $stmt->bind_result($count);
    $stmt->fetch();

    // Feche a consulta e a conexão com o banco de dados
    $stmt->close();
    $conn->close();

    // Verifique se o email existe no banco de dados
    // Se o count for maior que 0, significa que o email existe
    return $count > 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Esqueci minha senha</title>
    <link rel="stylesheet" href="../css/esqueci.css">
</head>
<body>
    <div class="container">
        <h2>Esqueci minha senha</h2>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>

