<!-- SCRIPT PARA SALVAR A EDIÇÃO DOS DADOS DO USUÁRIO NO BANCO-->

<?php
session_start();
include_once("../conexao-mysql/conexao-banco.php");

if (isset($_POST["update"])) {
  $id_serv = $_GET['id_serv'];
  $nome_serv = $_POST['nome_serv'];
  $finalidade = $_POST['finalidade'];
  $preco = $_POST['preco'];
  $dias = $_POST['dias'];
  $cidades = $_POST['cidades'];
  $tam_equipe = $_POST['tam_equipe'];
  $id = $_SESSION['id'];
  $sqlUpdate = "UPDATE servicos_prestadores SET nome_serv ='$nome_serv', finalidade ='$finalidade', preco ='$preco', dias ='$dias', cidades ='$cidades', tam_equipe ='$tam_equipe', FK_id_prestador = '$id' WHERE id_serv='$id_serv'";

  $result = $conexao->query($sqlUpdate);
  print_r($result);
}

header('location: ../sistema/sys-prest.php');

?>