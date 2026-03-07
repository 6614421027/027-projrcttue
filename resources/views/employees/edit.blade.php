<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; }
        .card { border: none; border-radius: 12px; }
        .form-label { font-weight: 500; color: #5a5c69; font-size: 0.9rem; }
        .section-title { border-bottom: 2px solid #e3e6f0; padding-bottom: 10px; margin-bottom: 20px; color: #4e73df; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 text-dark"><i class="bi bi-pencil-square text-warning me-2"></i>แก้ไขข้อมูลพนักงาน</h3>
                    <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> กลับหน้ารายการ</a>
                </div>
            </div>
            
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h5 class="section-title mt-2"><i class="bi bi-person-vcard me-2"></i>ข้อมูลส่วนตัว</h5>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">รหัสพนักงาน <span class="text-danger">*</span></label>
                            <input type="text" name="employee_code" class="form-control bg-light" value="{{ old('employee_code', $employee->employee_code) }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">ชื่อ <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">เพศ <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select">
                                <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>ชาย</option>
                                <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>หญิง</option>
                                <option value="Other" {{ old('gender', $employee->gender) == 'Other' ? 'selected' : '' }}>อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">วันเกิด <span class="text-danger">*</span></label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', \Carbon\Carbon::parse($employee->date_of_birth)->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                            <input type="text" name="id_card_number" class="form-control" value="{{ old('id_card_number', $employee->id_card_number) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">อีเมล <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $employee->phone_number) }}">
                        </div>
                    </div>

                    <h5 class="section-title mt-4"><i class="bi bi-house-door me-2"></i>ข้อมูลที่อยู่</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">ที่อยู่ (บ้านเลขที่, หมู่, ถนน) <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address', $employee->address) }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">เขต/อำเภอ <span class="text-danger">*</span></label>
                            <input type="text" name="district" class="form-control" value="{{ old('district', $employee->district) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">จังหวัด <span class="text-danger">*</span></label>
                            <input type="text" name="province" class="form-control" value="{{ old('province', $employee->province) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                            <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $employee->postal_code) }}">
                        </div>
                    </div>

                    <h5 class="section-title mt-4"><i class="bi bi-briefcase me-2"></i>ข้อมูลการทำงาน</h5>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">แผนก <span class="text-danger">*</span></label>
                            <input type="text" name="department" class="form-control" value="{{ old('department', $employee->department) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                            <input type="text" name="position" class="form-control" value="{{ old('position', $employee->position) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">เงินเดือน <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">฿</span>
                                <input type="number" step="0.01" name="salary" class="form-control" value="{{ old('salary', $employee->salary) }}">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">วันที่เริ่มงาน <span class="text-danger">*</span></label>
                            <input type="date" name="hire_date" class="form-control" value="{{ old('hire_date', \Carbon\Carbon::parse($employee->hire_date)->format('Y-m-d')) }}">
                        </div>
                    </div>

                    <h5 class="section-title mt-4"><i class="bi bi-telephone-inbound me-2"></i>ข้อมูลติดต่อฉุกเฉิน</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ชื่อผู้ติดต่อฉุกเฉิน <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_contact_name" class="form-control" value="{{ old('emergency_contact_name', $employee->emergency_contact_name) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">เบอร์โทรศัพท์ผู้ติดต่อฉุกเฉิน <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_contact_phone" class="form-control" value="{{ old('emergency_contact_phone', $employee->emergency_contact_phone) }}">
                        </div>
                    </div>

                    <hr class="mt-4 mb-4">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4">ยกเลิก</a>
                        <button type="submit" class="btn btn-warning px-4"><i class="bi bi-save me-1"></i> บันทึกการแก้ไข</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
