<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'from',
        'cc',
        'to',
        'title',
        'message',

];
public function u_messages(){
    return $this->belongsToMany('App\Models\User');

}
}
