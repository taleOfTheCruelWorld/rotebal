<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'product_id',
        'path',
    ];
    protected $table = 'product_files';
    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function thumbnails() {
        return $this->hasOne(Thumbnail::class, 'file_id', 'id');
    }
}
