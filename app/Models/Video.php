<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['video_url', 'img_url', 'category_id', 'title_en', 'title_mm' ,'title_ch', 'desc_en', 'desc_mm', 'desc_ch'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'id');
    }
}
