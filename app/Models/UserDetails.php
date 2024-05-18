<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'id',
        'identification_code',
        'password',
        'first_name',
        'last_name',
        'age',
        'sex',
        'class',
        'g1_first_name',
        'g2_first_name',
        'g3_first_name',
        'g1_last_name',
        'g2_last_name',
        'g3_last_name',
        'g1_city',
        'g2_city',
        'g1_address',
        'g2_address',
        'g1_zip',
        'g2_zip',
        'g1_email',
        'g2_email',
        'g1_home_phone',
        'g2_home_phone',
        'g3_home_phone',
        'g1_mobile_phone',
        'g2_mobile_phone',
        'g3_mobile_phone',
        'school_to_home',
        'home_to_school'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         'password' => 'hashed',
    //     ];
    // }
}
