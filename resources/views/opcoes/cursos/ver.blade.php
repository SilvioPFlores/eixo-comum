@extends('layout')

@section('titulo')
Curso
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    <div class="divMd">
        <fildset>
            <legend>Curso Cód {{ $curso->id }}</legend>
            <form class="row g-3" action="" method="POST">
                @csrf
                @method('PATCH')
                <div class="col-md-12">
                    <label for="nome" class="form-label">Nome do Curso</label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="{{ $curso->nome }}">
                </div>
                <div class="col-md-6">
                    <label for="sigla" class="form-label">Sigla do Curso</label>
                    <input type="text" class="form-control" id="sigla" name="sigla" style="text-transform:uppercase" required value="{{ $curso->sigla }}">
                </div>
                <div class="col-md-6">
                    <label for="turno_id" class="form-label">Turno</label>
                    <select id="turno_id" name="turno_id" class="form-select" required>
                        @foreach ($turnos as $turno)
                            <option value="{{ $turno->id }}" {{ $turno->id == $curso->turno_id ? 'selected' : ''}}>
                                {{ $turno->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-check form-switch ms-2">
                    <input type="hidden" id="status" name="status" value="{{ $curso->status }}">
                    <input class="form-check-input" type="checkbox" role="switch" id="chkStatus" {{$curso->status == 'AT' ? 'checked' : ''}}>
                    <label class="form-check-label" for="chkStatus" id="labelStatus">{{$curso->status == 'AT' ? 'Ativo' : 'Inativo'}}</label>
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
{{ asset('js/curso-js.js')}}
@endsection