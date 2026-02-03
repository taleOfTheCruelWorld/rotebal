<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function photos() {
        return $this->hasMany(Photo::class);
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function country() {
        return $this->belongsTo(Country::class);
    }
     protected $fillable = [
        'name',
        'description',
        'price',
        'sort',
        'category_id',
        'country_id'
    ];
}
