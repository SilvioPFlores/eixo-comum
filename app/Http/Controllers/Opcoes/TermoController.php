<?php

namespace App\Http\Controllers\Opcoes;

use App\Http\Controllers\Controller;
use App\Models\Termo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermoController extends Controller
{
    public function index() {
        $termos = Termo::query()
        ->orderBy('id')
        ->get();
        return view('opcoes.termos.index', compact('termos'));
    }
    public function create()
    {
        return view('opcoes.termos.create');
    }
    public function store (Request $request)
    {
        DB::beginTransaction();
        $termo = Termo::create($request->all());
        DB::commit();
        return redirect()->route('termos')->with(
            'mensagem', 
            "{$termo->id}º termo ({$termo->semestre}º semestre) criado com sucesso"
        );
    }
    public function mudaStatus(int $id, Request $request){
        $termo = Termo::find($id);
        if($request->status == 'AT'){
            $termo->status = 'IN';
        }
        else{
            $termo->status = 'AT';
        }
        $termo->save();
    }
}
