@extends('layout')

@section('titulo')
Cursos
@endsection

@section('conteudo')
    @includeWhen(session('mensagem'), 'mensagem', ['mensagem' => session('mensagem')])
    <h1>Cursos</h1>
    <hr>
    <div class="text-center">
        <a href=" {{ route('form-criar-curso') }} " class="btn btn-primary btn-lg mb-2">Novo Curso</a>
    </div>
    <hr>
    <table class="table table-hover table-secondary">
        <thead>
            <tr>
                <th class="text-center" scope="col">Código</th>
                <th class="text-center" scope="col">Sigla</th>
                <th scope="col">Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr class="trCurso{{$curso->status == 'IN' ? ' table-danger' : ''}}" data-id="{{$curso->id}}">
                <td class="text-center">{{$curso->id}}</td>
                <td class="text-center">{{$curso->sigla}}</td>
                <td>{{$curso->nome}} - {{$curso->turno}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
{{ asset('js/curso-js.js')}}
@endsection
