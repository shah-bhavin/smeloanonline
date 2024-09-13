<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machineloan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'cost_with_gst',
        'machine_used_before',
        'machine_ready_time',
        'status',
        'created_at',
        'updated_at',
    ];
}
