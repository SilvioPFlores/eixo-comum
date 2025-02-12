@extends('layout')

@section('titulo')
Turnos
@endsection

@section('conteudo')
    @includeWhen(session('mensagem'), 'mensagem', ['mensagem' => session('mensagem')])
    <h1>Turnos</h1>
    <hr>
    <div class="text-center">
        <a href=" {{ route('form-criar-turno') }} " class="btn btn-primary btn-lg mb-2">Novo Turno</a>
    </div>
    <hr>
    <div class="divMd">
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th id="nomePage" scope="col">Turno</th>
                    <th class="text-center" scope="col">Sigla</th>
                    <th class="text-center" scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($turnos as $turno)
                <tr class="trTurno{{$turno->status == 'IN' ? ' table-danger' : ''}}" id="tr-{{$turno->id}}">
                    <td>{{$turno->nome}}</td>
                    <td class="text-center">{{$turno->sigla}}</td>
                    <td class="text-center">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-check form-switch form-check-reverse">
                                <input 
                                    class="form-check-input chkStatus" 
                                    type="checkbox" 
                                    role="switch" 
                                    id="chk-{{$turno->id}}"
                                    data-id="{{$turno->id}}" 
                                    value="{{$turno->status}}" 
                                    {{$turno->status == 'AT' ? 'checked' : ''}}>
                            </div>
                        </form>
                    </td>
                    <td id="td-status-{{$turno->id}}">{{$turno->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
{{ asset('js/termo-turno-js.js')}}
@endsection