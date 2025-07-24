<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Step 1: Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'marital_status' => 'required',
            'phone' => 'required|string|max:20',
            'email' => 'required|email', // ⬅️ Removed 'unique' rule here
            'address' => 'required|string',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:100',
            'hire_date' => 'required|date',
            'department' => 'required|string|max:100',
]);


        // Step 2: Prepare JSON structure
        $employee = [
            'name' => $validated['name'],
            'gender' => $validated['gender'],
            'marital_status' => $validated['marital_status'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'dob' => $validated['dob'],
            'nationality' => $validated['nationality'],
            'hire_date' => $validated['hire_date'],
            'department' => $validated['department'],
        ];

        // Step 3: Store data into JSON file (storage/app/employees.json)
        $filePath = storage_path('app/employees.json');

        if (file_exists($filePath)) {
            $data = json_decode(file_get_contents($filePath), true);
        } else {
            $data = [];
        }

        $data[] = $employee;

        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

        // Step 4: Redirect with success message
        return redirect()->route('employees.create')->with('success', 'Employee registered successfully!');

        
    }

    public function index()
{
    $filePath = storage_path('app/employees.json');
    $employees = [];

    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $employees = json_decode($json, true);
    }

    return view('employees.index', compact('employees'));
}



}
