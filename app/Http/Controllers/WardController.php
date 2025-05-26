<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;
use App\Models\Staff;


class WardController extends Controller
{
    public function index()
    {
        $wards = Ward::paginate(10); // paginate for manage wards table
        return view('wards.index', compact('wards'));
    }

    public function create()
    {
        // Fetch all staff to populate the dropdown
        $staff = \App\Models\Staff::all();

        return view('wards.create', compact('staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wardName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'totalBeds' => 'required|integer|min:1',
            'telExtension' => 'required|string|max:20',
            'staffID' => 'nullable|exists:staff,staffID',
        ]);

        Ward::create($request->all());

        return redirect()->route('wards.index')->with('success', 'Ward created successfully.');
    }

    public function edit($id)
    {
        $ward = Ward::findOrFail($id);
        $staff = Staff::all(); // Make sure you import your Staff model

        return view('wards.edit', compact('ward', 'staff'));
    }


    public function update(Request $request, Ward $ward)
    {
        $request->validate([
            'wardName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'totalBeds' => 'required|integer|min:1',
            'telExtension' => 'required|string|max:20',
            'staffID' => 'nullable|exists:staff,staffID',
        ]);

        $ward->update($request->all());

        return redirect()->route('wards.index')->with('success', 'Ward updated successfully.');
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('wards.index')->with('success', 'Ward deleted successfully.');
    }
}
