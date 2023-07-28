<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['img_link', 'category_id', 'sub_category_id', 'tags', 'title_en', 'title_mm', 'title_ch', 'topic_en', 'topic_mm', 'topic_ch', 'short_desc_en', 'short_desc_mm', 'short_desc_ch', 'desc_en', 'desc_mm', 'desc_ch', 'views', 'like', 'love', 'wow', 'sad'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function sub_category(){
        return $this->belongsTo('App\Models\SubCategory', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(App\Models\Tag::class)->with('tagNames');
    }

    protected $casts = [
        'tags' => 'array',
    ];
}
