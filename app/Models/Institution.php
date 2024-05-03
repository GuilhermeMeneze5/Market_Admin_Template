<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
                'nome',
                'cep',
                'uf',
                'city',
                'address',
                'email',
                'updated_at',
                'created_at',
                'XID_Token',
    ];

}
