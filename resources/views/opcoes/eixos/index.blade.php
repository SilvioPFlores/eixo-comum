@extends('layout')

@section('titulo')
Eixos
@endsection

@section('conteudo')
    @includeWhen(session('mensagem'), 'mensagem', ['mensagem' => session('mensagem')])
    <h1>Eixos</h1>
    <hr>
    <div class="text-center">
        <a href=" {{ route('form-criar-eixo') }} " class="btn btn-primary btn-lg mb-2">Novo Eixo</a>
    </div>
    <hr>
    <table class="table table-secondary table-hover ">
        <thead>
            <tr>
                <th class="text-center" scope="col">Eixo</th>
                <th scope="col">Descrição</th>
                <th class="text-center" scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eixos as $eixo)
                <tr class="trEixo {{$eixo->status == 'IN' ? 'table-danger' : ''}}" data-id="{{$eixo->id}}">
                    <td class="text-center">{{$eixo->sigla}}</td>
                    <td>{{$eixo->nome}}</td>
                    <td class="text-center">{{$eixo->status}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
{{ asset('js/eixo-js.js')}}
@endsection
