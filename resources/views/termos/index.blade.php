@extends('layout')

@section('titulo')
Termos
@endsection

@section('conteudo')
    @includeWhen(session('mensagem'), 'mensagem', ['mensagem' => session('mensagem')])
    <h1>Termos</h1>
    <hr>
    <div class="text-center">
        <a href=" {{ route('form-criar-termo') }} " class="btn btn-primary btn-lg mb-2">Novo Termo</a>
    </div>
    <hr>
    <div class="divMd">
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th id="nomePage" scope="col">Termo</th>
                    <th class="text-center" scope="col">Semestre</th>
                    <th class="text-center" scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($termos as $termo)
                <tr class="trTermo{{$termo->status == 'IN' ? ' table-danger' : ''}}" id="tr-{{$termo->id}}">
                    <td>{{$termo->id}}</td>
                    <td class="text-center">{{$termo->semestre}}</td>
                    <td class="text-center">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-check form-switch form-check-reverse">
                                <input 
                                    class="form-check-input chkStatus" 
                                    type="checkbox" 
                                    role="switch" 
                                    id="chk-{{$termo->id}}"
                                    data-id="{{$termo->id}}" 
                                    value="{{$termo->status}}" 
                                    {{$termo->status == 'AT' ? 'checked' : ''}}>
                            </div>
                        </form>
                    </td>
                    <td id="td-status-{{$termo->id}}">{{$termo->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
{{ asset('js/termo-turno-js.js')}}
@endsection