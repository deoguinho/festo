<!-- SCRIPT PARA A P?GINA DE PERFIL DO USU?RIO -->

<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
// print_r($_SESSION);
include_once("../conexao-mysql/conexao-banco.php");

$email = $_SESSION['email'];
if (isset($_SESSION['perfil'])) {
    $perfil = $_SESSION['perfil'];
}
$sql = "SELECT * FROM cadastro.servicos_prestadores;";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Festô!</title>

    <!-- LINKS -->

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- LINKS -->
</head>

<body>



    <!-- HEADER SECTION  -->

    <!-- <nav class="topbar navbar navbar-expand-lg navbar-dark bg">
        <div class="container-fluid">
            <a href="../index.html"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
        </div>
        <div class="d-flex btntop">
            <a href="../servicos/meus-pedidos.php" class="botao">Pedidos</a>
            <a href="sair-clt.php" class="botao">Sair</a>
        </div>
    </nav> -->

    <!-- HEADER SECTION  -->
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
            <a href="sair-clt.php" class="botao">Sair</a>

            <a class="btnstop" href="index.html">Suporte</a>
            <?php
            if (isset($perfil) && $perfil == 2) {
                echo '<a class="btnstop btnstopcadastro" id="btnborder" href="../sistema/sys-prest.php">Gerenciar</a>';
            }
            ?>
            <a class="btnstop btnstopcadastro" id="btnborder" href="../servicos/meus-pedidos.php">Meus pedidos</a>
        </div>
    </div>


    <div class="banner unselectable">
        <img class="unselectable" src="../assets/banner.jpg" alt="" />
        <div class="banner-text">
            <h1 class="unselectable">Faça seu evento pelo Festô!</h1>
            <a href="#" class="btnveja" id="btnborder">Ver ofertas</a>
        </div>
    </div>


    <section class="latest-products">
        <div class="prod-text">
            <h2>Serviços disponíveis</h2>
            <hr />
            <a href="#">
                <h2>Ver Todos</h2>
            </a>
        </div>
        <div class="product-container" id="product-container">
            <?php while ($dado = $result->fetch_array()) { ?>
                <div class='product'>
                    <img src='../assets/sitioexemplo.jpg'>
                    <h2>
                        <?php echo $dado['nome_serv']; ?>
                    </h2>
                    <p>
                        <?php echo $dado['finalidade']; ?>
                    </p>
                    <p>
                        <?php echo $dado['fornecedor']; ?>
                    </p>
                    <p>
                        <?php echo $dado['dias']; ?>
                    </p>
                    <p>
                        <?php echo $dado['cidades']; ?>
                    </p>
                    <p>
                        <?php echo $dado['tam_equipe']; ?> Colaboradores
                    </p>

                    <p>
                        <?php echo $dado['contato']; ?>
                    </p>
                    <p>
                        <?php echo $dado['pix']; ?>
                    </p>
                    <p>
                        <?php echo $dado['preco']; ?>
                    </p>
                    <p>
                        <?php echo $dado['preco_por_pessoa']; ?>
                    </p>
                    <form style="border:none" action="../servicos/contratar.php?id_serv=<?php echo $dado['id_serv'] ?>"
                        method="POST">
                        <input class="contratar" type="submit" value="Contratar" />
                    </form>
                </div>;
            <?php } ?>


        </div>
    </section>
</body>

</html>