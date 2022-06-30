function validarDescricao() {
    var descricao = document.getElementById("descricao");
    if (descricao.value == "") {
        alert ("Descrição não informada");
        descricao.focus();
    }
}