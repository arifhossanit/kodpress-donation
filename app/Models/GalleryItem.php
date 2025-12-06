<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id','title','image_path','caption','order'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
