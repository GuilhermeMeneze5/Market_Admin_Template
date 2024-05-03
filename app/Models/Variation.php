<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    protected $fillable = ['cod', 'Text1', 'Price', 'Blocked', 'Type'];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'variation_tags', 'variation_id', 'tag_id');
    }
    public function products()
{
    return $this->belongsToMany(Product::class, 'product_variations', 'variation_id', 'product_id');
}
}
