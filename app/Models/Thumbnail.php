<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $table = 'thumbs_files';
    public function photo() {
        return $this->belongsTo(Photo::class);
    }
}
