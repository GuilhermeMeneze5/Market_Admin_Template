<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['cod','cod_eng','group','group_eng','type'];
    public function products()
{
    return $this->belongsToMany(Product::class, 'product_tags', 'tag_id', 'product_id');
}
public function offers()
{
    return $this->morphToMany(Offer::class, 'offerable');
}
}
