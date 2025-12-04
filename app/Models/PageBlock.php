<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    use HasFactory;

    protected $fillable = ['section_id','type','content','settings','order'];

    protected $casts = ['settings' => 'array'];

    public function section()
    {
        return $this->belongsTo(PageSection::class, 'section_id');
    }
}
