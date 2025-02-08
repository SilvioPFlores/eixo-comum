<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'semestre', 'status'];
}
