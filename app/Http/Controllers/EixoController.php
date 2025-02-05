<?php

namespace App\Http\Controllers;

use App\Http\Requests\EixoFormRequest;
use App\Models\Eixo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::query()
            ->orderBy('sg_eixo')
            ->get();
        return view('eixos.index', compact('eixos'));
    }
    public function create()
    {
        return view('eixos.create');
    }
    public function store (EixoFormRequest $request)
    {
        DB::beginTransaction();
        $eixo = Eixo::create([
            'sg_eixo' => $request->txtSigla,
            'ds_eixo' => $request->txtEixo,
            'status' => 'AT'
        ]);
        DB::commit();
        return redirect()->route('eixos')->with(
            'mensagem', 
            "Eixo {$eixo->sg_eixo} - {$eixo->ds_eixo} criado com sucesso"
        );
    }
    public function verEixo (Request $request)
    {
        var_dump($request);
        //return view('eixos.create');
    }
}
