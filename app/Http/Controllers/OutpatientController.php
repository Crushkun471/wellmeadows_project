<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class OutpatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::where('patienttype', 'outpatient')->with(['latestAppointment']);

        // Search by first name, last name, or phone
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('fname', 'like', '%' . $search . '%')
                    ->orWhere('lname', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        // Sorting
        if ($sort = $request->input('sort')) {
            $allowedSorts = ['fname', 'lname'];
            if (in_array($sort, $allowedSorts)) {
                $query->orderBy($sort);
            }
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        // Paginate results
        $outpatients = $query->paginate(10)->withQueryString();

        return view('outpatients.index', compact('outpatients'));
    }
}
