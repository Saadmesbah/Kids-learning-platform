<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image_path',
        'audio_path',
        'video_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
