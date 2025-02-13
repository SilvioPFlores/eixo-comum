@extends('layout')

@section('titulo')
UC
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    @include('modal/ucs')
    <div class="divGr">
        <h4>Nova UC</h4>
        <form class="row g-3" action="" method="POST">
            @csrf
            <div class="text-center">
                <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalUc">
                    UC <i class="fa-solid fa-magnifying-glass-plus"></i>
                </a>
            </div>
            <input type="hidden" id="status" name="status" value="AT">
            <div class="col-md-2">
                <label for="codigo" class="form-label">Código da UC</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="col-md-10">
                <label for="nome" class="form-label">Nome da UC</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-4">
                <label for="semestre" class="form-label">Semestre</label>
                <select id="semestre" name="semestre" class="form-select" required>
                    <option selected>SELECIONE</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="termo_id" class="form-label">Termo</label>
                <select id="termo_id" name="termo_id" class="form-select" required>
                    <option selected>SELECIONE</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="eixo_id" class="form-label">Eixo</label>
                <select id="eixo_id" name="eixo_id" class="form-select" required>
                    @foreach ($eixos as $eixo)
                        <option value="{{ $eixo->id }}">{{ $eixo->sigla }}</option>
                    @endforeach
                </select>
            </div>
            <fieldset>
                <legend class="col-form-label pt-0">Cursos à cursar está UC:</legend>
                <div class="col-12">
                    @foreach ($cursos as $curso) 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="codCurso[]" id="{{ $curso->id }}" value="{{ $curso->id }}">
                            <label class="form-check-label" for="{{ $curso->id }}">
                                {{ $curso->nome }} {{ $curso->turno }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </fieldset>
            <div class="text-center">
                <input type="button" class="btn btn-secondary" value="Voltar" onClick="history.go(-1)">
                <input type="submit" class="btn btn-success" value="Gravar">
            </div>
        </form>
    </div>
@endsection

@section('js')
{{ asset('js/uc-js.js')}}
@endsection