<!-- SCRIPT DO FORMS DE CADASTRO DO USU?RIO NO SITE -->

<?php
header("Content-type: text/html; charset=ISO-8859-1");
if (isset($_POST['submit'])) {
    include_once('../conexao-mysql/conexao-banco.php');

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $foto_perfil = $_FILES['foto_perfil'];

    $result = mysqli_query($conexao, "INSERT INTO clientes(nome,senha,email,cpf,telefone,sexo,data_nasc,cidade,estado,endereco,foto_perfil, perfil) VALUES ('$nome','$senha','$email','$cpf','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco','$foto_perfil',1)");

    if ($result) {
        header("Location: ../sistemas/homepage.php");
    } else {
        echo "Erro ao salvar os dados no banco de dados: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Cliente</title>
    <link rel="icon" type="image/x-icon" href="imgs/festo.ico">
    <link rel="stylesheet" href="../css/cadastrocliente.css">
</head>

<body>
    <div class="main-cadastro">
        <div class="left-cadastro">
            <div class="titlelogo">
                <a href="../index.html"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png"></a>
                <h2>Portal do cliente</h2>
            </div>
            <img src="../assets/cadastrocliente.svg" class="left-cadastro-image" alt="PartyPros Planejamento">
        </div>


        <div class="right-cadastro">
            <div class="card-cadastro">
                <h1>Cadastro</h1>
                <form action="cad-clt.php" method="POST" enctype="multipart/form-data">
                    <div class="colunas">
                        <fieldset>
                            <legend><b>Cadastro de cliente</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="nome" id="nome" class="inputUser" required>
                                <label for="nome" class="labelInput">Nome completo</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="password" name="senha" id="senha" class="inputUser" required>
                                <label for="senha" class="labelInput">Senha</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="email" id="email" class="inputUser" required>
                                <label for="email" class="labelInput">Email</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="file" id="foto" name="foto" accept="image/png, image/jpeg">
                                <label for="foto" id="btnFoto">Insira sua foto de perfil</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="cpf" id="cpf" class="inputUser" required oninput="mascara_cpf()" maxlength="14">
                                <label for="cpf" class="labelInput">CPF</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="tel" name="telefone" id="telefone" class="inputUser" required oninput="mascara_telefone()" maxlength="14">
                                <label for="telefone" class="labelInput">Telefone</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <p>Sexo:</p>
                            <input type="radio" id="feminino" name="sexo" value="feminino" required>
                            <label for="feminino">Feminino</label>
                            <br>
                            <input type="radio" id="masculino" name="sexo" value="masculino" required>
                            <label for="masculino">Masculino</label>
                            <br>
                            <input type="radio" id="outro" name="sexo" value="outro" required>
                            <label for="outro">Outro</label>
                            <br><br>
                            <label for="data_nascimento"><a>Data de Nascimento:</a></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" required>
                            <br><br><br>
                            <div class="inputBox">
                                <input type="text" name="cidade" id="cidade" class="inputUser" required>
                                <label for="cidade" class="labelInput">Cidade</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="estado" id="estado" class="inputUser" required>
                                <label for="estado" class="labelInput">Estado</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="endereco" id="endereco" class="inputUser" required>
                                <label for="endereco" class="labelInput">Endere?o</label>
                            </div>
                            <br><br>

                        </fieldset>

                    </div>
                    <div class="divbtn">
                        <fieldset>
                            <input type="submit" name="submit" id="submit" value="Enviar">
                        </fieldset>
                    </div>
                </form>
                <br>
                <a class="link" href="../login/escolha-log.html">Ja tem uma conta? Faca login agora mesmo!</a>
                <hr>
                <a class="link" href="../index.html">Voltar</a>
            </div>
        </div>
    </div>
    <script src="../js/mask.js"></script>
</body>

</html>