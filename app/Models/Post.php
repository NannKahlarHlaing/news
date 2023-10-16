<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['img_link', 'category_id', 'sub_category_id', 'tags', 'title_en', 'title_mm', 'title_ch', 'title_ta', 'topic_en', 'topic_mm', 'topic_ch', 'topic_ta', 'short_desc_en', 'short_desc_mm', 'short_desc_ch', 'short_desc_ta', 'desc_en', 'desc_mm', 'desc_ch', 'desc_ta', 'views', 'like', 'love', 'wow', 'sad'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function sub_category(){
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(App\Models\Tag::class)->with('tagNames');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    protected $casts = [
        'tags' => 'array',
    ];
}
