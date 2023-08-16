<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cartoon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['img_link', 'category_id', 'title_en', 'title_mm', 'title_ch', 'cartoonist_en', 'cartoonist_mm', 'cartoonist_ch', 'views'];
}
