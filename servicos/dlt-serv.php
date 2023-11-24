<!-- SCRIPT PARA DELETAR O SERIVÇO NO BANCO-->

<?php

if (!empty($_GET['id'])) 
{    
    include_once('../conexao-mysql/conexao-banco.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM servicos_prestadores WHERE id_serv=$id";

    $result = $conexao->query($sqlSelect);
     
    if($result->num_rows > 0)
    {
      $sqlDelete = "DELETE FROM servicos_prestadores WHERE id_serv=$id"; 
      $resultDelete = $conexao->query($sqlDelete);
    }
  }
  header('Location: ../sistema/sys-prest.php');

?>