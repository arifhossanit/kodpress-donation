<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','title','slug','excerpt','content','featured_image','published','published_at'];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
