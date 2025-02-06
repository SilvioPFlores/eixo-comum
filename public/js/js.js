/*
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
});
function focusAlert(texto, foco) {
    swalWithBootstrapButtons.fire({
        title: 'Atenção!',
        text: texto,
        icon: 'warning',
        confirmButtonText: 'Ok',
        didClose: () => {
            setTimeout(() => $(foco).focus(), 100);
        }
    });
}
function newAlert(texto) {
    swalWithBootstrapButtons.fire({
        text: texto,
        icon: 'success',
        confirmButtonText: 'Ok'
    });
}
function okNewPage(texto, page) {
    swalWithBootstrapButtons.fire({
        text: texto,
        icon: 'success',
        confirmButtonText: 'Ok',
    }).then(function (isConfirm) {
        if (isConfirm) {
            window.location.replace(page);
        }
    });
}
function erroNewPage(texto, page) {
    swalWithBootstrapButtons.fire({
        text: texto,
        icon: 'error',
        //confirmButtonColor: '#'
        confirmButtonText: 'Ok',
    }).then(function (isConfirm) {
        if (isConfirm) {
            window.location.replace(page);
        }
    });
}
function exibirConteudo(data) {
    if (data != '') {
        $(".divConteudo").html(data);
    }
    else {
        erroNewPage('Página não encontrada!', 'index.php');
    }
}
*/
$(document).ready(function () {
    $('.trAcesso').click(function () {
        let id = $(this).closest('tr[data-id]').data('id');
        $.post("acesso.php",
            {
                formEditaUsuario: "edita",
                cdUsuario: id
            },
            function (data) {
                exibirConteudo(data);
            });
    });
    $('.trNivel').click(function () {
        let id = $(this).closest('tr[data-id]').data('id');
        $.post("nivel.php",
            {
                formEditaNivel: "edita",
                cdNivel: id
            },
            function (data) {
                exibirConteudo(data);
            });
    });/*
    $('.trEixo').click(function () {
        var id = $(this).data("id"); // Pega o ID armazenado no data-id
        window.location.href = "/eixos/"+id; // Redireciona para a URL desejada
    });*/
    $('.trTurno').click(function () {
        let id = $(this).closest('tr[data-id]').data('id');
        $.post("turno.php",
            {
                formEditaTurno: "edita",
                cdTurno: id
            },
            function (data) {
                exibirConteudo(data);
            });
    });
    $('.trCurso').click(function () {
        let id = $(this).closest('tr[data-id]').data('id');
        $.post("curso.php",
            {
                formEditaCurso: "edita",
                cdCurso: id
            },
            function (data) {
                exibirConteudo(data);
            });
    });
    $('.trTermo').click(function () {
        let id = $(this).closest('tr[data-id]').data('id');
        $.post("termo.php",
            {
                formEditaTermo: "edita",
                cdTermo: id
            },
            function (data) {
                exibirConteudo(data);
            });
    });
});