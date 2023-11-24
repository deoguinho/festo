<?php
session_start();
print_r($_SESSION);
header("Content-type: text/html; charset=ISO-8859-1");
include_once('../conexao-mysql/conexao-banco.php');

$id_serv = $_GET['id_serv'];
$id_cliente = $_SESSION['id'];

// Busca serviço
$sql = "SELECT * FROM servicos_prestadores WHERE id_serv = $id_serv";
$result = $conexao->query($sql);
$row = $result->fetch_assoc();
$id_prestador = $row['FK_id_prestador'];

// print_r($row["preco"]);

$quantas_pessoas = $_POST['quantas_pessoas'];
$dia = $_POST["dia"];
$preco_final = $_POST["preco_final"];

$resultInsert = mysqli_query($conexao,"INSERT INTO contratado(id_cliente,id_prestador,id_serv,dia, quantas_pessoas,preco_final) VALUES ('$id_cliente','$id_prestador','$id_serv','$dia','$quantas_pessoas','$preco_final')");

header('location: ../sistema/homepage.php');

?>