<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoEssay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title_en', 'title_mm', 'title_ch', 'topic_en', 'topic_mm', 'topic_ch', 'short_desc_en', 'short_desc_mm', 'short_desc_ch', 'desc_en', 'desc_mm', 'desc_ch', 'img_link', 'author', 'date'];
}
