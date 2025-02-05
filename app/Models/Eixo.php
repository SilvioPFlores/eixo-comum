<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    public $timestamps = false;
    protected $fillable = ['sg_eixo', 'ds_eixo', 'status'];
}
