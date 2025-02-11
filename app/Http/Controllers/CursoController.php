<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoFormRequest;
use App\Models\{Curso, Turno};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index() {
        $cursos = DB::table('cursos')
            ->join('turnos', 'cursos.turno_id', '=', 'turnos.id')
            ->select('cursos.*', 'turnos.nome as turno')
            ->orderBy('cursos.id')
            ->get();

        //var_dump($cursos);
        return view('cursos.index', compact('cursos'));
    }
    public function create()
    {
        $turnos = Turno::query()
            ->where('status', '=', 'AT')
            ->get();
        return view('cursos.create', compact('turnos'));
    }
    public function store(CursoFormRequest $request)
    {
        DB::beginTransaction();
        $curso = Curso::create($request->all());
        DB::commit();
        return redirect()->route('cursos')->with(
            'mensagem', 
            "Curso {$curso->nome} ({$curso->nome}) criado com sucesso"
        );
    }
    public function verCurso (int $id) {
        $curso = Curso::find($id);
        $turnos = Turno::query()
            ->where('status', '=', 'AT')
            ->get();

        return view('cursos.ver', compact(['curso', 'turnos']));
    }
    public function update(int $id, Request $request) {
        DB::beginTransaction();
        $curso = Curso::find($id);
        $curso->update($request->all());
        DB::commit();
        return redirect()->route('cursos')->with(
            'mensagem', 
            "Curso {$curso->nome} ({$curso->nome}) alterado com sucesso"
        );
    }
}
