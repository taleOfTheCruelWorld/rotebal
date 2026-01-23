<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function photos() {
        return $this->hasMany(Photo::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function country() {
        return $this->belongsTo(Country::class);
    }
}
