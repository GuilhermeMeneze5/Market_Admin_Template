<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'user_id', 'user_name','text1', 'blocked'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
{
    return $this->belongsToMany(Product::class, 'product_reviews', 'review_id', 'product_id');
}
}
