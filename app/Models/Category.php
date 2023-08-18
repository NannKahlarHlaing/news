<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_en', 'name_mm', 'name_ch'];

    public function posts(){
        return $this->hasMany('App\Models\Post', 'id');
    }

    public function sub_categories(){
        return $this->hasMany('App\Models\SubCategory', 'category_id');
    }

    public function videos(){
        return $this->hasMany('App\Models\Video', 'id');
    }

}
