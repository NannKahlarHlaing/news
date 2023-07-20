<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'category_id', 'topic', 'short_desc', 'desc', 'img_link', 'views', 'like', 'love', 'wow', 'sad'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
