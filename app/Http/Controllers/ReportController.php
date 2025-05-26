<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function staffByWard()
    {
        $wards = Ward::with('staff')->get(); // Eager load staff for each ward
        return view('reports.staff_by_ward', compact('wards'));
    }
}
