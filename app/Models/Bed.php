<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $primaryKey = 'bedID';
    protected $fillable = ['wardID', 'patientID'];

    public function ward() {
        return $this->belongsTo(Ward::class, 'wardID');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'patientID');
    }
}
