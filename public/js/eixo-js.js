function trocaStatus(boo){
    if(boo){
        $('#sigla').removeClass('inativo');
        $('#nome').removeClass('inativo');
        $('#labelStatus').html("Ativo");
        $('#status').val('AT');
    }
    else{
        $('#sigla').addClass('inativo');
        $('#nome').addClass('inativo');
        $('#labelStatus').html("Inativo");
        $('#status').val('IN');
    }
}
$(document).ready(function () {
    $('.trEixo').click(function () {
        var id = $(this).data("id"); // Pega o ID armazenado no data-id
        window.location.href = "/eixos/"+id; // Redireciona para a URL desejada
    });
    if($('#chkStatus').length){
        trocaStatus($('#chkStatus').is(":checked"));
    }
    $("#chkStatus").change(function(){
        trocaStatus($('#chkStatus').is(":checked"));
    });
});