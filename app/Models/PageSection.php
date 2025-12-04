<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = ['page_id','name','settings','order'];

    protected $casts = ['settings' => 'array'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function blocks()
    {
        return $this->hasMany(PageBlock::class)->orderBy('order');
    }
}
