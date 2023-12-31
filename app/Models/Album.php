<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'owner_id',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
