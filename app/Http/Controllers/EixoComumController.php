<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EixoComumController extends Controller
{
    public function index(){
        return view('eixo-comum.index');
    }
}
