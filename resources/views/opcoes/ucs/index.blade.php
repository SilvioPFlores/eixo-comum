@extends('layout')

@section('titulo')
UCs
@endsection

@section('conteudo')
    @includeWhen(session('mensagem'), 'mensagem', ['mensagem' => session('mensagem')])
    <h1>UCs</h1>
    <hr>
    <div class="text-center">
        <a href=" {{ route('form-criar-uc') }} " class="btn btn-primary btn-lg mb-2">Nova UC</a>
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
            @foreach ($ucs as $uc)
            <tr class="truc{{$uc->status == 'IN' ? ' table-danger' : ''}}" data-id="{{$uc->id}}">
                <td class="text-center">{{$uc->id}}</td>
                <td>{{$uc->nome}} - {{$uc->termo}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection