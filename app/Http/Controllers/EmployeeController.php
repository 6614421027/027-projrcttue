<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = Employee::latest()->paginate(10);

        // ตรวจสอบว่าเป็น API Request หรือไม่
        if ($request->is('api/*')) {
            return response()->json($employees, 200);
        }

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // ข้อมูลส่วนตัว (1-8)
            'employee_code' => 'required|string|max:50|unique:employees,employee_code',
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'gender'        => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date|before:today',
            'id_card_number'=> 'required|string|size:13|unique:employees,id_card_number',
            'email'         => 'required|email|max:150|unique:employees,email',
            'phone_number'  => 'required|string|max:20',
            
            // ข้อมูลที่อยู่ (9-12)
            'address'       => 'required|string',
            'district'      => 'required|string|max:100',
            'province'      => 'required|string|max:100',
            'postal_code'   => 'required|string|max:10',
            
            // ข้อมูลการทำงาน (13-16)
            'department'    => 'required|string|max:100',
            'position'      => 'required|string|max:100',
            'salary'        => 'required|numeric|min:0',
            'hire_date'     => 'required|date',
            
            // ข้อมูลติดต่อฉุกเฉิน (17-18)
            'emergency_contact_name'  => 'required|string|max:150',
            'emergency_contact_phone' => 'required|string|max:20',
        ]);

        $employee = Employee::create($validatedData);

        // ตรวจสอบว่าเป็น API Request หรือไม่
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'เพิ่มข้อมูลพนักงานสำเร็จ!',
                'data' => $employee
            ], 201);
        }

        return redirect()->route('employees.index')->with('success', 'เพิ่มข้อมูลพนักงานสำเร็จ!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Employee $employee)
    {
        // ตรวจสอบว่าเป็น API Request หรือไม่
        if ($request->is('api/*')) {
            return response()->json($employee, 200);
        }

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            // ข้อมูลส่วนตัว (ใส่ $employee->id เพื่อละเว้นการเช็คข้อมูลซ้ำของตัวเอง)
            'employee_code' => 'required|string|max:50|unique:employees,employee_code,' . $employee->id,
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'gender'        => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date|before:today',
            'id_card_number'=> 'required|string|size:13|unique:employees,id_card_number,' . $employee->id,
            'email'         => 'required|email|max:150|unique:employees,email,' . $employee->id,
            'phone_number'  => 'required|string|max:20',
            
            // ข้อมูลที่อยู่
            'address'       => 'required|string',
            'district'      => 'required|string|max:100',
            'province'      => 'required|string|max:100',
            'postal_code'   => 'required|string|max:10',
            
            // ข้อมูลการทำงาน
            'department'    => 'required|string|max:100',
            'position'      => 'required|string|max:100',
            'salary'        => 'required|numeric|min:0',
            'hire_date'     => 'required|date',
            
            // ข้อมูลติดต่อฉุกเฉิน
            'emergency_contact_name'  => 'required|string|max:150',
            'emergency_contact_phone' => 'required|string|max:20',
        ]);

        $employee->update($validatedData);

        // ตรวจสอบว่าเป็น API Request หรือไม่
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'อัปเดตข้อมูลสำเร็จ!',
                'data' => $employee
            ], 200);
        }

        return redirect()->route('employees.index')
                         ->with('success', 'อัปเดตข้อมูลสำเร็จ!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();

        // ตรวจสอบว่าเป็น API Request หรือไม่
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'ลบข้อมูลพนักงานสำเร็จ!'
            ], 200);
        }

        return redirect()->route('employees.index')
                         ->with('success', 'ลบข้อมูลพนักงานสำเร็จ!');
    }
}