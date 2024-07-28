<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'enterprise_name',
        'enterprise_constitution',
        'enterprise_pan',
        'enterprise_office_address',
        'enterprise_factory_address	',
        'premises_type',
        'located_in_municipal_area',
        'telephone',
        'email',
        'website',
        'udaym_reg_no',
        'udyam_reg_date',
        'enterprise_category',
        'enterprise_type',
        'enterprise_activity',
        'scheme_name',
        'status',
        'created_at',
        'updated_at',
    ];
}
