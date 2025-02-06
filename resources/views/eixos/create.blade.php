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
                <input type="hidden" id="status" name="status" value="AT">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" required>
                    <label for="sigla">Sigla:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Descrição" required>
                    <label for="nome">Descrição:</label>
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