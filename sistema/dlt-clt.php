<!-- SCRIPT PARA DELETAR O USUARIO NO BANCO-->

<?php

if (!empty($_GET['id'])) 
{    
    include_once('../conexao-mysql/conexao-banco.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM clientes WHERE id=$id";

    $result = $conexao->query($sqlSelect);
     
    if($result->num_rows > 0)
    {
      $sqlDelete = "DELETE FROM clientes WHERE id=$id"; 
      $resultDelete = $conexao->query($sqlDelete);
    }
  }
  header('Location: sys-clt.php');

?>