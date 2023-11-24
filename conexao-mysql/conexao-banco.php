<!-- Criação do Banco -->

<?php
    $dbhost = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'cadastro';

    $conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

//  Testar conexão

//  if($conexao->connect_errno){
//    echo "Erro";
//  } else {
//    echo "Conectado";
//  }

?>