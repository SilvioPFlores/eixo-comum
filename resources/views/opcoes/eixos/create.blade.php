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
                @include('forms/formSiglaDesc')
            </form>
        </fildset>
    </div>
@endsection