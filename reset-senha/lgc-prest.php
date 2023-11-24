<?php
// ...

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

function tokenExisteNoBancoDeDados($token)
{
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'cadastro');

    // Verifique se houve algum erro na conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepare a consulta para verificar se o token existe
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    // Obtenha o resultado da consulta
    $stmt->bind_result($count);
    $stmt->fetch();

    // Feche a consulta e a conexão com o banco de dados
    $stmt->close();
    $conn->close();

    // Verifique se o token existe no banco de dados
    // Se o count for maior que 0, significa que o token existe
    return $count > 0;
}
?>
