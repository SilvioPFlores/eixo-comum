<?php

namespace App\Http\Controllers\Opcoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\EixoFormRequest;
use App\Models\Eixo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::query()
            ->orderBy('sigla')
            ->get();
        return view('opcoes.eixos.index', compact('eixos'));
    }
    public function create()
    {
        return view('opcoes.eixos.create');
    }
    public function store (EixoFormRequest $request)
    {
        DB::beginTransaction();
        $eixo = Eixo::create($request->all());
        DB::commit();
        return redirect()->route('eixos')->with(
            'mensagem', 
            "Eixo {$eixo->sigla} - {$eixo->nome} criado com sucesso"
        );
    }
    public function verEixo (int $id)
    {
        $eixo = Eixo::find($id);
        return view('opcoes.eixos.ver', compact('eixo'));
    }
    public function update(int $id, EixoFormRequest $request) {
        DB::beginTransaction();
        $eixo = Eixo::find($id);
        $eixo->update($request->all());
        DB::commit();
        return redirect()->route('eixos')->with(
            'mensagem', 
            "Eixo {$eixo->sigla} - {$eixo->nome} alterado com sucesso"
        );
    }
}
