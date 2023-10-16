<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['img_url', 'title_en', 'title_mm', 'title_ch', 'title_ta', 'desc_en', 'desc_mm', 'desc_ch', 'desc_ta', 'url_slug'];
}
