function trocaStatus(id, boo){
    if(boo){
        $('#tr-'+id).removeClass('table-danger');
        $('#chk-'+id).val('AT');
        $('#td-status-'+id).html('AT');
    }
    else{
        $('#tr-'+id).addClass('table-danger');
        $('#chk-'+id).val('IN');
        $('#td-status-'+id).html('IN');
    }
}
$(document).ready(function () {
    $(".chkStatus").change(function(){
        let formData = new FormData();
        const id = $(this).data("id");
        const status = $(this).val();
        const token = $('input[name="_token"]').first().val();        
        formData.append('status', status);
        formData.append('_token', token); 
        const url = `/turnos/${id}`;

        fetch(url, {
            body: formData,
            method: 'POST'
        }).then( () => { 
            trocaStatus(id, $(this).is(":checked"));
        });
    });
});