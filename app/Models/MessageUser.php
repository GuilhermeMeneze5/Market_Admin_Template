<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'message_user'; // Defina o nome da tabela, se for diferente

    protected $fillable = [
        'user_id',
        'message_id',
        'important',
        'promotions',
        'social',
        'Drafts',
        'blocked',
        'read_at',
    ];

    // Defina relacionamentos com outros modelos, se necessário
    public function getCountUnreadMessages()
    {
        $userId = Auth::user()->id;

        $count = MessageUser::where('user_id', $userId)
            ->where('read_at', null)
            ->count();

        return $count;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
}
