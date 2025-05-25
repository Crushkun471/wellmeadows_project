<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Show all staff
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    // Show the form to create new staff
    public function create()
    {
        return view('staff.create');
    }

    // Store new staff record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'dateOfBirth' => 'required|date',
            'sex' => 'required|in:M,F',
            'nationalInsuranceNumber' => 'required|string|unique:staff,nationalInsuranceNumber',
            'position' => 'required|string|max:255',
            'currentSalary' => 'required|numeric',
            'salaryScale' => 'required|string|max:255',
            'contractType' => 'required|string|max:255',
            'hoursPerWeek' => 'required|integer',
            'paymentType' => 'required|string|max:255',
            'wardID' => 'nullable|exists:wards,wardID',
        ]);

        Staff::create($validated);

        return redirect()->route('staff.index')->with('success', 'Staff member created successfully.');
    }

    // Show single staff details
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    // Show edit form
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    // Update the staff record
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'dateOfBirth' => 'required|date',
            'sex' => 'required|in:M,F',
            'nationalInsuranceNumber' => 'required|string|unique:staff,nationalInsuranceNumber,' . $staff->staffID . ',staffID',
            'position' => 'required|string|max:255',
            'currentSalary' => 'required|numeric',
            'salaryScale' => 'required|string|max:255',
            'contractType' => 'required|string|max:255',
            'hoursPerWeek' => 'required|integer',
            'paymentType' => 'required|string|max:255',
            'wardID' => 'nullable|exists:wards,wardID',
        ]);

        $staff->update($validated);

        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    // Delete staff
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
