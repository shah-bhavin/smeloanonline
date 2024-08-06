<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'applicants_name',
        'applicants_mobile',
        'applicants_city',
        'loan_time',
        'status',
        'created_at',
        'updated_at',
    ];
}
