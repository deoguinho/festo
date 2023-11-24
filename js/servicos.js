/* SCRIPT DAS MÁSCARAS DO CADASTRO DE SERVIÇOS  */

function mascara_dinheiro_cifrao() {
    var dinheiro_formatado = document.getElementById("preco").value;
    if (dinheiro_formatado[0] != "R") {
        if (dinheiro_formatado[0] != undefined) {
            document.getElementById("preco").value = "R$" + dinheiro_formatado[0];
        }
    }
    if (dinheiro_formatado[1] != "$") {
        if (dinheiro_formatado[1] != undefined) {
            document.getElementById("preco").value = dinheiro_formatado[0] + "$" + dinheiro_formatado[1];
        }
    }
}

function mascara_dinheiro_virgula() {
    var dinheiro_formatado = document.getElementById("preco").value;
    if (dinheiro_formatado[dinheiro_formatado.length - 3] != ",") {
        if (dinheiro_formatado[dinheiro_formatado.length - 2] == ",") {
            document.getElementById("preco").value = dinheiro_formatado + "0";
        } else {
            if (dinheiro_formatado[dinheiro_formatado.length - 1] == ",") {
                document.getElementById("preco").value = dinheiro_formatado + "00";
            } else {
                document.getElementById("preco").value = dinheiro_formatado + ",00";
            }
        }
    }
}

function moeda(z) {
    var v = z.value;
    v = v.replace(/\D/g, "");
    v = v.replace(/(\d{1})(\d{14})$/, "$1.$2");
    v = v.replace(/(\d{1})(\d{11})$/, "$1.$2");
    v = v.replace(/(\d{1})(\d{8})$/, "$1.$2");
    v = v.replace(/(\d{1})(\d{5})$/, "$1.$2");
    v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2");
    z.value = v;
}
