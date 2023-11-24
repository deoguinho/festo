<!-- SCRIPT DO FORMS DE EDIÇÃO DOS DADOS DO USUÁRIO -->
<?php

header("Content-type: text/html; charset=UTF-8");

if (!empty($_GET['id'])) {

    include_once('../conexao-mysql/conexao-banco.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM prestadores WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $senha = $user_data['senha'];
            $email = $user_data['email'];
            $cnpj_cpf = $user_data['cnpj_cpf'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $data_nasc = $user_data['data_nasc'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
        }
    } else {
        header('Location: sys-prest.php');
    }

} else {
    header('Location: sys-prest.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>
<div class="header">
        <div>
            <?php
            if (isset($_SESSION["id"]) == true) {
                echo '<a href="../sistema/homepage.php"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png" /></a>';
            } else {
                echo '<a href="index.html"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png" /></a>';

            }
            ?>
        </div>
        <div class="buttonstop">
            <a class="btnstop" href="../suporte/suporte.html">Suporte</a>
            <?php
            if (isset($perfil) && $perfil == 2) {
                echo '<a class="btnstop btnstopcadastro" id="btnborder" href="../sistema/sys-prest.php">Gerenciar</a>';
            }
            ?>
            <a class="btnstop btnstopcadastro" id="btnborder" href="../servicos/meus-pedidos.php">Meus pedidos</a>
        </div>
    </div>
    <div class="box">
        <div class="img_box">
            conteudo
        </div>
        <div>
        <form action="savedt-prest.php" method="POST">
            <fieldset>
                <legend><b>Editar Perfil</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <p>Tipo de cadastro:</p>
                    <input type="radio" id="cnpj" name="cad_nacional" value="cnpj" required
                        onclick="selecionarTipoCadastro()">
                    <label for="cnpj_cpf">CNPJ</label>
                    <br>
                    <input type="radio" id="cpf" name="cad_nacional" value="cpf" required
                        onclick="selecionarTipoCadastro()">
                    <label for="cnpj_cpf">CPF</label>
                    <br>
                    <input type="text" name="cnpj_cpf" id="cad_nacional_input" class="inputUser" required
                        oninput="mascararEntrada()">
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>"
                        required oninput="mascara_telefone()" maxlength="14">
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="sexo" value="feminino" <?php echo ($sexo == "feminino") ? "checked" : "" ?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino" <?php echo ($sexo == "masculino") ? "checked" : "" ?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro" <?php echo ($sexo == "outro") ? "checked" : "" ?>
                    required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><a>Data de Nascimento:</a></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc ?>"
                    required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>"
                        required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>"
                        required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>"
                        required>
                    <label for="endereco" class="labelInput">Endere�o</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
        </div>
    </div>
    <script src="../js/mask.js"></script>
</body>

</html>