<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'category', 'topic', 'short_desc', 'desc', 'img_link','fb_link', 'tw_link', 'li_link','views'];
    
}
