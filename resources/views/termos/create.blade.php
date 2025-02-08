@extends('layout')

@section('titulo')
Turno
@endsection

@section('conteudo')
    @includeWhen($errors->any(), 'erros', ['errors' => $errors])
    <div class="divMd">
        <fildset>
            <legend>Novo Turno</legend>
            <form class="row g-3" action="" method="POST">
                @csrf
                <input type="hidden" id="status" name="status" value="AT">
                <div class="col-md-6">
                    <label for="id" class="form-label">Termo</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
                <div class="col-md-6">
                    <label for="turno" class="form-label">Semestre</label>
                    <select id="semestre" name="semestre" class="form-select">
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                    </select>
                </div>
                <div class="center">
                    <input type="button" class="btn btn-secondary" value="Voltar" onClick="history.go(-1)">
                    <input type="submit" class="btn btn-success" value="Gravar">
                </div>
            </form>
        </fildset>
    </div>
@endsection