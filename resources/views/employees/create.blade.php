@extends('layouts.app')

@section('title', 'เพิ่มข้อมูลพนักงานใหม่')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-dark fw-bold"><i class="bi bi-person-plus-fill text-primary me-2"></i>เพิ่มข้อมูลพนักงานใหม่</h4>
            <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm border">
                <i class="bi bi-arrow-left"></i> กลับ
            </a>
        </div>
    </div>
    
    <div class="card-body p-4">
        @if ($errors->any())
            <div class="alert alert-danger rounded-3 shadow-sm">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>พบข้อผิดพลาด:</div>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-2"><i class="bi bi-person-vcard me-2"></i>ข้อมูลส่วนตัว</h6>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">รหัสพนักงาน <span class="text-danger">*</span></label>
                    <input type="text" name="employee_code" class="form-control" value="{{ old('employee_code') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">ชื่อ <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">นามสกุล <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">เพศ <span class="text-danger">*</span></label>
                    <select name="gender" class="form-select">
                        <option value="">-- เลือกเพศ --</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>ชาย</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>หญิง</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">วันเกิด <span class="text-danger">*</span></label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                    <input type="text" name="id_card_number" class="form-control" value="{{ old('id_card_number') }}" maxlength="13">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">อีเมล <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                </div>
            </div>

            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4"><i class="bi bi-house-door me-2"></i>ข้อมูลที่อยู่</h6>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label text-muted small fw-bold">ที่อยู่ (บ้านเลขที่, หมู่, ถนน) <span class="text-danger">*</span></label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label text-muted small fw-bold">เขต/อำเภอ <span class="text-danger">*</span></label>
                    <input type="text" name="district" class="form-control" value="{{ old('district') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label text-muted small fw-bold">จังหวัด <span class="text-danger">*</span></label>
                    <input type="text" name="province" class="form-control" value="{{ old('province') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label text-muted small fw-bold">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                    <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                </div>
            </div>

            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4"><i class="bi bi-briefcase me-2"></i>ข้อมูลการทำงาน</h6>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">แผนก <span class="text-danger">*</span></label>
                    <input type="text" name="department" class="form-control" value="{{ old('department') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">ตำแหน่ง <span class="text-danger">*</span></label>
                    <input type="text" name="position" class="form-control" value="{{ old('position') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">เงินเดือน <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">฿</span>
                        <input type="number" step="0.01" name="salary" class="form-control border-start-0" value="{{ old('salary') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">วันที่เริ่มงาน <span class="text-danger">*</span></label>
                    <input type="date" name="hire_date" class="form-control" value="{{ old('hire_date') }}">
                </div>
            </div>

            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4"><i class="bi bi-telephone-inbound me-2"></i>ข้อมูลติดต่อฉุกเฉิน</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small fw-bold">ชื่อผู้ติดต่อฉุกเฉิน <span class="text-danger">*</span></label>
                    <input type="text" name="emergency_contact_name" class="form-control" value="{{ old('emergency_contact_name') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted small fw-bold">เบอร์โทรศัพท์ผู้ติดต่อฉุกเฉิน <span class="text-danger">*</span></label>
                    <input type="text" name="emergency_contact_phone" class="form-control" value="{{ old('emergency_contact_phone') }}">
                </div>
            </div>

            <hr class="mt-4 mb-4 text-muted">
            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm"><i class="bi bi-save me-1"></i> บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>
@endsection