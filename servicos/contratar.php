<!-- SCRIPT DO FORMS DE EDIÇÃO DOS DADOS DO USUÁRIO -->
<?php

header('Content-Type: text/html; charset=utf-8');

if (!empty($_GET['id_serv'])) {

    include_once('../conexao-mysql/conexao-banco.php');

    $id = $_GET['id_serv'];

    $sqlSelect = "SELECT * FROM servicos_prestadores WHERE id_serv=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome_serv = $user_data['nome_serv'];
            $finalidade = $user_data['finalidade'];
            $preco = $user_data['preco'];
            $dias = $user_data['dias'];
            $cidades = $user_data['cidades'];
            $tam_equipe = $user_data['tam_equipe'];
            $fornecedor = $user_data['fornecedor'];
            $contato = $user_data['contato'];
            $pix = $user_data['pix'];
            $preco_por_pessoa = $user_data['preco_por_pessoa'];
        }
    } else {
        // header('Location: meus-servicos.php');
    }
} else {
    // header('Location: meus-servicos.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/contratar.css">

</head>


<body>
    <div class="header">
        <div>
            <a href="../index.html"><img class="logo" src="../assets/festoblacknobgLOGOTOP.png" /></a>
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
    <section>
        <form id="regForm" action="svcontrato.php?id_serv=<?php echo $id ?>" method="POST">

            <h1>Conferia as informações:</h1>

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="info">
                    <div>
                        <img src='../assets/sitioexemplo.jpg'>
                        <div class="preco">
                            <div>
                                <h4>Preço por pessoa</h4>
                                <p id="preco_por_pessoa" value="<?php echo $preco_por_pessoa ?>">
                                    <?php echo $preco_por_pessoa ?>
                                </p>
                            </div>
                            <div>
                                <h4>Preço base</h4>
                                <p id="preco" value="<?php echo $preco ?>">
                                    <?php echo $preco ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="info_text">
                        <div class="info_texts">
                            <div class="info_block">
                                <h2>
                                    <?php echo $nome_serv ?>
                                </h2>
                                <p>
                                    <?php echo $finalidade ?>
                                </p>
                                <p>
                                    <?php echo $cidades ?>
                                </p>
                                <p>
                                    <?php echo $tam_equipe ?> colaboradores
                                </p>
                            </div>
                            <div class="contato">
                                <div>
                                    <h4>Contato</h4>
                                    <p>
                                        <?php echo $contato ?>
                                    </p>
                                    <h4>Metodo de pagamento</h4>
                                    <p>
                                        <?php echo $pix ?>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="tab">Para que dia você quer?
                <p><input type="date" oninput="this.className = ''"></p>
            </div>

            <div class="tab">E quantas pessoas você receberá?
                <p><input type="text" name="quantas_pessoas" id="quantas_pessoas" class="" onchange="calcular()"
                        oninput="this.className = ''" required></p>
            </div>

            <div class="tab">
                <h2>Preço final:</h2>
                <p id="preco_final" name="preco_final">0</p>
                <input type="hidden" id="preco_final_hidden" name="preco_final">
                <div class="info">
                    <div>
                        <img src='../assets/sitioexemplo.jpg'>
                        <div class="preco">
                            <div>
                                <h4>Preço por pessoa</h4>

                                <p id="preco_por_pessoa" value="<?php echo $preco_por_pessoa ?>">
                                    <?php echo $preco_por_pessoa ?>
                                </p>

                            </div>
                            <div>
                                <h4>Preço base</h4>
                                <p id="preco" value="<?php echo $preco ?>">
                                    <?php echo $preco ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="info_text">
                        <div class="info_texts">
                            <div class="info_block">
                                <h2>
                                    <?php echo $nome_serv ?>
                                </h2>
                                <p>
                                    <?php echo $finalidade ?>
                                </p>
                                <p>Rua flores mil, 88 - Belo Horizonte/MG</p>
                                <p>0 colaboradores</p>
                            </div>
                            <div class="contato">
                                <div>
                                    <h4>Contato</h4>
                                    <p>(31) 9 99542-9780</p>
                                    <h4>Metodo de pagamento</h4>
                                    <p>Pix</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div style="overflow:auto;">
                <div style="display: flex;justify-content: space-evenly;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" style="display: inline;">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
    </section>

    <script src="../js/mask.js"></script>
    <script>
        const preco_por_pessoa = document.querySelector('#preco_por_pessoa').innerText;
        const preco = document.querySelector('#preco').innerText;
        let preco_final = document.querySelector('#preco_final');

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }

        function calcular() {
            var x = document.getElementById("quantas_pessoas").value;
            var z = document.querySelector("#preco_final_hidden");


            preco_final.innerText = parseFloat(preco_por_pessoa) * parseFloat(x) + parseFloat(preco);

            z.value = parseFloat(preco_por_pessoa) * parseFloat(x) + parseFloat(preco);
            preco_final.innerText = `R$ ${(parseFloat(preco_por_pessoa) * parseFloat(x) + parseFloat(preco)).toFixed(2)}`;


            console.log({
                x,
                preco_por_pessoa,
                preco
            });
        }
    </script>
</body>

</html>