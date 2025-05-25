<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = 'patientID';
    protected $fillable = [
        'fname', 'lname', 'patienttype', 'address', 'phone', 'dateofbirth',
        'sex', 'maritalstatus', 'dateregistered', 'clinicID'
    ];

    public function doctor() {
        return $this->belongsTo(LocalDoctor::class, 'clinicID');
    }

    public function kin() {
        return $this->hasMany(NextOfKin::class, 'patientID');
    }

    public function medications() {
        return $this->hasMany(Medication::class, 'patientID');
    }

    public function inpatient() {
        return $this->hasOne(Inpatient::class, 'patientID');
    }

    public function outpatient() {
        return $this->hasOne(Outpatient::class, 'patientID');
    }

    public function appointments() {
        return $this->hasMany(PatientAppointment::class, 'patientID');
    }
}
