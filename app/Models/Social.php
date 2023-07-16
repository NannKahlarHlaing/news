<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['site_title', 'email', 'contact', 'address','facebook', 'youtube', 'instagram', 'twitter', 'linked_in', 'whatsapp', 'line', 'footer_text'];
}
