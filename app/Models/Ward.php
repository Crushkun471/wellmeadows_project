<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $primaryKey = 'wardID';
    protected $fillable = ['wardName', 'location', 'totalBeds', 'telExtension', 'staffID'];

    public function staff() {
        return $this->hasMany(Staff::class, 'wardID');
    }

    public function beds() {
        return $this->hasMany(Bed::class, 'wardID');
    }

    public function chargeNurses() {
        return $this->hasMany(ChargeNurse::class, 'wardID');
    }
}
