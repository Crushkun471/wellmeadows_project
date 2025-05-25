<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    protected $primaryKey = 'inpatientID';
    protected $fillable = [
        'patientID', 'wardID', 'bedID', 'datePlacedOnWaitlist', 'wardRequired',
        'expectedDaysToStay', 'dateAdmittedInWard', 'expectedLeave', 'actualLeave'
    ];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patientID');
    }

    public function ward() {
        return $this->belongsTo(Ward::class, 'wardID');
    }

    public function bed() {
        return $this->belongsTo(Bed::class, 'bedID');
    }
}
