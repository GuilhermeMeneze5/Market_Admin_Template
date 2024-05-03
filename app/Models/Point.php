<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
   
    protected $fillable = [
        'TIPO',
        'hora_entrada',
        'hora_saida',
        'dia_entrada',
        'dia_saida',
        'hora_trabalhada',
        'STATUS',
        'CLOSED_BY',
        'DAY_CHECKED',
        'CHECKED_BY',
        'CHECKED_BY_ID',
        'CREATED_BY',
        'CREATED_BY_ID',
        'OBS',

    ];
}
