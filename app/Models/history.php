<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        "user_id",
        "date",
        "home_to_school_time",
        "school_to_home_time",
        "requested_at"
    ];
}
