<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [

        'user_id',
        'patient_name',
        'patient_phonenumber',
        'doctor_name',
        'appointment_date',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
