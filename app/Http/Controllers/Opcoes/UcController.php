<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UcController extends Controller
{
    public function index() {
        return view('turnos.index');  //sempre no plural
    }
}
