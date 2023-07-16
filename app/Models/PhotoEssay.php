<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoEssay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'topic', 'short_desc', 'desc', 'author', 'date', 'img_link'];
}
