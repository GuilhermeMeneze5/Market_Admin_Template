<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Custom extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'custom_nome',
        'custom_status1',
        'custom_status2',
        'custom_status3',
        'custom_status4',
        'custom_status5',
        'custom_status6',
        'custom_status7',
        'custom_status8',
        'custom_status9',
        'custom_valor1',
        'custom_valor2',
        'custom_valor3',
        'custom_valor4',
        'custom_valor5',
        'custom_valor6',
        'custom_valor7',
        'custom_valor8',
        'custom_valor9',

    ];
}
