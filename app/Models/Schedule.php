<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'bus_no',
        'driver_name',
        'password',
        'driver_password',
        'license_no',
        'insurance',
        'monitor',
        'policy_no',
        'bus_plate',
        'color',
        'phone_number',
        'home_to_school',
        'school_to_home',
        'latitude',
        'longitude'
    ];
}
