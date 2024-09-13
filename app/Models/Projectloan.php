<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectloan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'cost_of_land',
        'cost_of_construction',
        'cost_with_gst',
        'project_line',
        'project_stage',
        'production_start_time',
        'status',
        'created_at',
        'updated_at',
    ];
}
