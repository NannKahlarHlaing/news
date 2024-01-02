<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['img_link', 'category_id', 'sub_category_id', 'tags', 'title', 'topic', 'short_desc', 'desc', 'lang','views', 'like', 'love', 'wow', 'sad'];

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
