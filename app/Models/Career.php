<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['position', 'terms', 'location', 'org_background', 'job_overview', 'role', 'qualification', 'benefits', 'latest_date' ];
}
