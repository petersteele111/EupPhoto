<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fileName',
        'title',
        'caption',
        'description',
        'mime_type',
        'extension',
        'size',
        'width',
        'height',
    ];

    public function album() {
        return $this->belongsTo(Album::class);
    }
}
