<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_en', 'name_mm', 'name_ch', 'name_ta', 'category_id', 'url_slug'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post', 'id');
    }
}
