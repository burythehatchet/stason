<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'date',
        'time',
        'description',
        'service',
        'doctor',
        'confirmed'
    ];
}
