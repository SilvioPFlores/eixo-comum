<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoFormRequest;
use App\Models\{Curso, Turno};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

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
    public function buscarCursos () : Array {
        $cursos = array(
            array('cd_curso' => '1','cod_curso' => '780','sg_curso' => 'EDF','ds_curso' => 'EDUCAÇÃO FÍSICA','cd_turno' => '1','ic_status' => 'AT'),
            array('cd_curso' => '2','cod_curso' => '781','sg_curso' => 'FIS','ds_curso' => 'FISIOTERAPIA','cd_turno' => '1','ic_status' => 'AT'),
            array('cd_curso' => '3','cod_curso' => '782','sg_curso' => 'NUT','ds_curso' => 'NUTRIÇÃO','cd_turno' => '1','ic_status' => 'AT'),
            array('cd_curso' => '4','cod_curso' => '783','sg_curso' => 'PSI','ds_curso' => 'PSICOLOGIA','cd_turno' => '1','ic_status' => 'AT'),
            array('cd_curso' => '5','cod_curso' => '784','sg_curso' => 'TO','ds_curso' => 'TERAPIA OCUPACIONAL','cd_turno' => '1','ic_status' => 'AT'),
            array('cd_curso' => '6','cod_curso' => '1042','sg_curso' => 'SSV','ds_curso' => 'SERVIÇO SOCIAL','cd_turno' => '3','ic_status' => 'AT'),
            array('cd_curso' => '7','cod_curso' => '1043','sg_curso' => 'SSN','ds_curso' => 'SERVIÇO SOCIAL','cd_turno' => '4','ic_status' => 'AT'),
            array('cd_curso' => '8','cod_curso' => '1521','sg_curso' => 'BICTN','ds_curso' => 'BACHARELADO INTERDISCIPLINAR EM CIÊNCIAS E TECNOLOGIA DO MAR','cd_turno' => '4','ic_status' => 'IN'),
            array('cd_curso' => '9','cod_curso' => '1523','sg_curso' => 'BICTV','ds_curso' => 'BACHARELADO INTERDISCIPLINAR EM CIÊNCIAS E TECNOLOGIA DO MAR','cd_turno' => '3','ic_status' => 'IN'),
            array('cd_curso' => '10','cod_curso' => '1887','sg_curso' => 'ENGA','ds_curso' => 'ENGENHARIA AMBIENTAL','cd_turno' => '4','ic_status' => 'IN'),
            array('cd_curso' => '11','cod_curso' => '1888','sg_curso' => 'ENGP','ds_curso' => 'ENGENHARIA DO PETRÓLEO','cd_turno' => '1','ic_status' => 'IN')
        );

        return $cursos;
    }
}
