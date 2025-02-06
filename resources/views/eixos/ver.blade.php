@extends('layout')

@section('titulo')
Eixo
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    <div class="divMd">
        <fildset>
            <legend>Eixo</legend>
            <form action="" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" required value="{{ $eixo->sigla }}">
                    <label for="sigla">Sigla:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Descrição" required value="{{ $eixo->nome }}">
                    <label for="nome">Descrição:</label>
                </div>
                <div class="form-check form-switch">
                    <input type="hidden" id="status" name="status" value="{{ $eixo->status }}">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkStatus" {{$eixo->status == 'AT' ? 'checked' : ''}}>
                    <label class="form-check-label" for="chkStatus" id="labelStatus">{{$eixo->status == 'AT' ? 'Ativo' : 'Inativo'}}</label>
                </div>
                <br>
                <div class="text-center">
                    <input type="button" id='btnVoltar' class="btn btn-secondary" value="Voltar" onClick="history.go(-1)">
                    <button class="btn btn-success">Alterar</button>
                </div>
            </form>
        </fildset>
    </div>
@endsection

@section('js')
{{ asset('js/eixo-js.js')}}
@endsection