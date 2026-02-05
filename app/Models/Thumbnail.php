<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'file_id',
        'path',
    ];
    protected $table = 'thumbs_files';
    public function photo() {
        return $this->belongsTo(Photo::class);
    }
}
