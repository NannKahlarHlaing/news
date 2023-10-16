<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_en', 'name_mm', 'name_ch', 'name_ta', 'url_slug'];

    public function tagNames()
    {
        return $this->select('name_en', 'name_mm', 'name_ch', 'name_ta');
    }

}
