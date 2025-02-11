<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'sigla', 'nome', 'turno_id', 'status'];
    
    public function turno()
    {
        return $this->belongsTo(Turno::class);        
    }
}
