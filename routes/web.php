<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// 1. ตั้งให้หน้าแรก (/) วิ่งไปที่หน้ารายชื่อพนักงานเลย
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// 2. เส้นทางสำหรับระบบพนักงาน (แบบไม่ต้องล็อกอิน)
Route::resource('employees', EmployeeController::class);