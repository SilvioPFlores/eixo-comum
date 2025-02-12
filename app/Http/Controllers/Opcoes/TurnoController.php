<?php

namespace App\Http\Controllers\Opcoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\EixoFormRequest;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::query()
        ->orderBy('sigla')
        ->get();
        return view('opcoes.turnos.index', compact('turnos'));
    }
    public function create()
    {
        return view('opcoes.turnos.create');
    }
    public function store (EixoFormRequest $request)
    {
        DB::beginTransaction();
        $turno = Turno::create($request->all());
        DB::commit();
        return redirect()->route('turnos')->with(
            'mensagem', 
            "Turno {$turno->nome} - {$turno->sigla} criado com sucesso"
        );
    }
    public function mudaStatus(int $id, Request $request){
        $turno = Turno::find($id);
        if($request->status == 'AT'){
            $turno->status = 'IN';
        }
        else{
            $turno->status = 'AT';
        }
        $turno->save();
    }
}
