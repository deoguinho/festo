<!-- SCRIPT PARA SALVAR A EDIÇÃO DOS DADOS DO USUÁRIO NO BANCO-->

<?php 

  include_once("../conexao-mysql/conexao-banco.php");

  if(isset($_POST["update"]))
  {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $cnpj_cpf = $_POST['cnpj_cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $sqlUpdate = "UPDATE prestadores SET nome ='$nome', senha ='$senha', email ='$email', cnpj_cpf ='$cnpj_cpf', telefone ='$telefone', sexo ='$sexo', data_nasc ='$data_nasc', cidade ='$cidade', estado ='$estado', endereco ='$endereco' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
  }

  header('location: sys-prest.php');

?>