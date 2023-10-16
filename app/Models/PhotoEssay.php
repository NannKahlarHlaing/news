<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoEssay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title_en', 'title_mm', 'title_ch', 'title_ta', 'topic_en', 'topic_mm', 'topic_ch', 'topic_ta', 'short_desc_en', 'short_desc_mm', 'short_desc_ch', 'short_desc_ta', 'desc_en', 'desc_mm', 'desc_ch', 'desc_ta', 'img_link', 'author', 'date', 'like', 'love', 'wow', 'sad', 'country'];
}
