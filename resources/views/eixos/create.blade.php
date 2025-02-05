@extends('layout')

@section('titulo')
Eixo
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    <div class="divMd">
        <fildset>
            <legend>Novo Eixo</legend>
            <form action="" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="txtSigla" id="txtSigla" placeholder="Sigla" required>
                    <label for="txtSigla">Sigla:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="txtEixo" id="txtEixo" placeholder="Descrição" required>
                    <label for="txtEixo">Descrição:</label>
                </div>
                <br>
                <div class="text-center">
                    <input type="button" id='btnVoltar' class="btn btn-secondary" value="Voltar" onClick="history.go(-1)">
                    <button class="btn btn-success">Gravar</button>
                </div>
            </form>
        </fildset>
    </div>
@endsection