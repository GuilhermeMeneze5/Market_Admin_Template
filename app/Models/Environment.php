<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Environment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'cep',
        'uf',
        'city',
        'address',
        'email',
        'XID_Token',
    ];
    public function u_envirolments(){
        return $this->belongsToMany('App\Models\User');

    }
}
