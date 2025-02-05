@extends('layout')

@section('titulo')
Eixos
@endsection

@section('conteudo')
    @includeWhen(session('mensagem'), 'mensagem', ['mensagem' => session('mensagem')])
    <h1>Eixos</h1>
    <hr>
    <div class="text-center">
        <a href=" {{ route('form-criar-eixo') }} " class="btn btn-primary btn-lg mb-2">Novo Eixo</a>
    </div>
    <hr>
    <hr>
    <table class="table table-secondary table-hover ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Eixo</th>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eixos as $eixo)
                @if ($eixo->status == 'IN')
                <tr class="table-danger">
                @else
                <tr>
                @endif
                    <td class="text-center">{{$eixo->sg_eixo}}</td>
                    <td>{{$eixo->ds_eixo}}</td>
                    <td class="text-center">{{$eixo->status}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<script>
    $(document).ready(function () {
        $('.trEixo').click(function () {
            let id = $(this).closest('tr[data-id]').data('id');
            const token = document.querySelector('input[name="_token"]').value;
            let formData = new FormData();
            formData.append('id', id);
            formData.append('_token', token);
            const url = `/eixos/${serieId}`;
            fetch(url, {
                body: formData,
                method: 'GET'
            })
            /*$.post("eixo.php",
                {
                    formEditaEixo: "edita",
                    cdEixo: id
                },
                function (data) {
                    exibirConteudo(data);
                });
                */
        });
    });
</script>