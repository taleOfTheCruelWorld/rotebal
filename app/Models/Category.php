<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function categories() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

}
