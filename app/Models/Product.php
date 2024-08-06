<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_name',
        'product_shortname', 
        'product_desc',
        'product_type',       
        'status',
        'created_at',
        'updated_at',
    ];
}
