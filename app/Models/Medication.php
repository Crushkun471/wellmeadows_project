<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $primaryKey = 'medicationID';
    protected $fillable = ['patientID', 'drugID', 'unitsPerDay', 'administrationMethod', 'startDate', 'endDate'];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patientID');
    }

    public function drug() {
        return $this->belongsTo(PharmaSupply::class, 'drugID');
    }
}
