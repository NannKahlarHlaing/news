<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_en', 'name_mm', 'name_ch', 'order'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxOrder = static::max('order'); // Get the maximum 'order' value in the table
            $model->order = $maxOrder + 1; // Set 'order' to the next available value
        });
    }

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
