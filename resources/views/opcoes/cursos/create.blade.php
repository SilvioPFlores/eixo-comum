@extends('layout')

@section('titulo')
Curso
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    @include('modal/cursos')
    <div class="divMd">
        <fildset>
            <legend>Novo Curso</legend>
            <form class="row g-3" action="" method="POST">
                @csrf
                <div class="text-center">
                    <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalCursos">Curso <i class="fa-solid fa-magnifying-glass-plus"></i></a>
                </div>
                <input type="hidden" id="status" name="status" value="AT">
                <div class="col-md-4">
                    <label for="id" class="form-label">Código do Curso</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
                <div class="col-md-4">
                    <label for="sigla" class="form-label">Sigla do Curso</label>
                    <input type="text" class="form-control" id="sigla" name="sigla" style="text-transform:uppercase" required>
                </div>
                <div class="col-md-4">
                    <label for="turno_id" class="form-label">Turno</label>
                    <select id="turno_id" name="turno_id" class="form-select" required>
                        @foreach ($turnos as $turno)
                            <option value="{{ $turno->id }}">{{ $turno->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="nome" class="form-label">Nome do Curso</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="text-center">
                    <input type="button" class="btn btn-secondary" value="Voltar" onClick="history.go(-1)">
                    <input type="submit" class="btn btn-success" value="Gravar">
                </div>
            </form>
        </fildset>
    </div>
@endsection

@section('js')
{{ asset('js/curso-js.js')}}
@endsection