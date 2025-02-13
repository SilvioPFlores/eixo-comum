<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NomeDoCurso
{
    public function nomeCursos()
    {
        $cursos = DB::table('cursos')
            ->join('turnos', 'cursos.turno_id', '=', 'turnos.id')
            ->select('cursos.*', 'turnos.nome as turno')
            ->orderBy('cursos.id')
            ->get();
        return $cursos;
    }
    public function nomeCursosId(int $id)
    {
        $curso = DB::table('cursos')
            ->join('turnos', 'cursos.turno_id', '=', 'turnos.id')
            ->select('cursos.*', 'turnos.nome as turno')
            ->where('id', '=', $id)
            ->get();
        return $curso;
    }
    public function nomeCursosAt()
    {
        $cursos = DB::table('cursos')
            ->join('turnos', 'cursos.turno_id', '=', 'turnos.id')
            ->select('cursos.*', 'turnos.nome as turno')
            ->where('cursos.status', '=', 'AT')
            ->orderBy('cursos.id')
            ->get();
        return $cursos;
    }
}
