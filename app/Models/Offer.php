<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'cod', 'discount', 'valid_at', 'used_at', 'text1', 'blocked'];

    public function products()
    {
        return $this->morphedByMany(Product::class, 'offerable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'offerable');
    }

    public function tags()
    {
        return $this->morphedByMany(Tag::class, 'offerable');
    }
}
