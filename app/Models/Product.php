<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    protected $fillable = ['cod', 'type', 'text1', 'text2', 'text3', 'full_price', 'discount', 'value_discount', 'salesprice', 'image1', 'image2', 'image3', 'image4', 'image5', 'file', 'weight', 'length', 'width', 'blocked'];
    public function variations()
    {
        return $this->belongsToMany(Variation::class, 'product_variations', 'product_id', 'variation_id');
    }
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'product_reviews', 'product_id', 'review_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'product_grades', 'product_id', 'grade_id');
    }
    public function offers()
{
    return $this->morphToMany(Offer::class, 'offerable');
}

}
