<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verifique se o email foi fornecido na URL
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        ?>
        <!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="../css/redefinir.css">
</head>
<body>
    <div class="container">
        <h2>Redefinir Senha</h2>
        <form method="POST" action="">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" name="nova_senha" id="nova_senha" required><br><br>
            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha" required><br><br>
            <input type="submit" name="submit" value="Redefinir Senha">
        </form>
    </div>
</body>
</html>

        <?php
    } else {
        // Se o email não estiver presente na URL, redirecione para a página inicial
        header('Location: ../index.html');
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Processar o formulário de redefinição de senha
    $email = $_POST['email'];
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    // Verificar se as senhas coincidem
    if ($novaSenha === $confirmarSenha) {
        // Salvar a nova senha no banco de dados para o usuário com o email fornecido
        salvarNovaSenhaNoBancoDeDados($email, $novaSenha);

        // Exibir uma mensagem de sucesso
        echo "Senha redefinida com sucesso!";
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Senha Redefinida</title>
        </head>
        <body>

            <a href='../login/log-prest.html'>Voltar para a tela de login</a>
        </body>
        </html>
        <?php
    } else {
        // Exibir uma mensagem de erro se as senhas não coincidirem
        echo "As senhas n�o coincidem. Por favor, tente novamente.";
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Erro na Redefini��o de Senha</title>
        </head>
        <body>

            <button onclick="window.history.back()">Voltar</button>
        </body>
        </html>
        <?php
    }
}

function salvarNovaSenhaNoBancoDeDados($email, $novaSenha)
{
    // Aqui você deve adicionar a lógica para salvar a nova senha no banco de dados
    // para o usuário com o email fornecido
    // Exemplo:
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'cadastro');

    // Verifique se houve algum erro na conexão
    if ($conn->connect_error) {
        die("Falha na conex�o com o banco de dados: " . $conn->connect_error);
    }

    // Prepare a consulta para atualizar a senha do usuário
    $stmt = $conn->prepare("UPDATE prestadores SET senha = ? WHERE email = ?");
    $stmt->bind_param("ss", $novaSenha, $email);
    $stmt->execute();

    // Feche a consulta e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
