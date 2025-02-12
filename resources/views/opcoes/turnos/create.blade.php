@extends('layout')

@section('titulo')
Turno
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    <div class="divMd">
        <fildset>
            <legend>Novo Turno</legend>
            <form action="" method="POST">
                @csrf
                @include('forms/formSiglaDesc')
            </form>
        </fildset>
    </div>
@endsection