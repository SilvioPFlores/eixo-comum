<?php

namespace App\Http\Controllers\Opcoes;

use App\Http\Controllers\Controller;
use App\Models\{Curso,Eixo,Termo,Uc};
use App\Services\NomeDoCurso;
use Illuminate\Http\Request;

class UcController extends Controller
{
    public function index() {
        $ucs = Uc::query()
            ->orderBy('id')
            ->get();
        return view('opcoes.ucs.index', compact('ucs'));
    }
    public function create(NomeDoCurso $nomeDoCurso)
    {
        $eixos = Eixo::query()
            ->where('status', '=', 'AT')
            ->get();
        $cursos = $nomeDoCurso->nomeCursosAt();
        return view('opcoes.ucs.create', compact(['eixos','cursos']));
    }
    public function burcarTermo(Request $request)
    {
        $termos = Termo::query()
            ->where('semestre', '=', $request->semestre)
            ->get();
        return $termos;
    }
}
