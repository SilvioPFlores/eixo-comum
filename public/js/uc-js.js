$(document).ready(function () {
    $('.trCurso').click(function () {
        var id = $(this).data("id"); // Pega o ID armazenado no data-id
        window.location.href = "/cursos/" + id; // Redireciona para a URL desejada
    });
    if ($('#chkStatus').length) {
        trocaStatus($('#chkStatus').is(":checked"));
    }
    $("#chkStatus").change(function () {
        trocaStatus($('#chkStatus').is(":checked"));
    });
    $('#modalUc').on('show.bs.modal', function (event) {
        const token = $('input[name="_token"]').first().val(); 
        const url = "/cursos/buscarCursos";
        $.post(url,
            {
                _token: token
            },
            function (data) {
                let $tabelaBody = $('#tabelaDados tbody'); // Seleciona o tbody da tabela
                $tabelaBody.empty(); // Limpa a tabela antes de adicionar novos dados

                // Percorre os dados e adiciona à tabela
                $.each(data, function (index, item) {
                    let linha = `
                        <tr data-id="${item.cod_curso}" data-nome="${item.ds_curso}" data-turno="${item.cd_turno}">
                            <td class="text-center">${item.cod_curso}</td>
                            <td>${item.ds_curso}</td>
                        </tr>
                    `;
                    $tabelaBody.append(linha);
                });
            });
            
    })
    // Quando o usuário clicar em uma linha da tabela
    $('#tabelaDados tbody').on('click', 'tr', function () {
        let id = $(this).data('id');
        let nome = $(this).data('nome');
        let turno_id = $(this).data('turno');

        // Preenche os campos do formulário
        $('#id').val(id);
        $('#nome').val(nome);
        $('#turno_id').val(turno_id);

        // Fecha o modal automaticamente
        $('#modalUc').modal('hide');
    });
    $('#semestre').change(function () {
        const optionSelect = $('#termo_id');
        optionSelect.attr('disabled','disabled');
        const url = "/ucs/burcarTermo";
        const token = $('input[name="_token"]').first().val(); 
        const semestre = this.value;
        $.post(url,
            {
                _token: token,
                semestre: semestre
            },
            function (data) {
                console.log(data);
                optionSelect.empty();
                $.each(data, function (index, item) {
                    let op = `<option value="${item.id}">${item.id}</option>`;
                    optionSelect.append(op);
                });
            });
            
        optionSelect.removeAttr('disabled');
    });
});