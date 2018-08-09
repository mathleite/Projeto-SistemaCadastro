$('#formularioCategoria').submit(function () {
    $.ajax({
        url: '/control/categoriaControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'novaCategoria': $('input[name="novaCategoria"]').val(),
            'metodo': 'cadastrarCategoria'
        },
        success: function (data) {
            confirm("Realmente deseja fazer este cadastro?");
            alert("Cadastro realizado ! ");

            if (!data.tipo !== 'erro') {
                window.location.href = "../espacos/espacoCategoria.php";
            }
        }
    });
});