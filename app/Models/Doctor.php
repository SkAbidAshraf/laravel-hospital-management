<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'doctor_name',
        'doctor_phonenumber',
        'services_id',
        'doctor_details',
        'doctor_image',
    ];

    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Services::class, 'services_id');
    }
}
