@extends('layouts.app')

@section('title', 'รายละเอียดข้อมูลพนักงาน')

@section('content')
<div class="card shadow-sm border-0 overflow-hidden">
    <div class="bg-primary text-white p-4" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center me-4 shadow" style="width: 80px; height: 80px; font-size: 2.5rem;">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <h2 class="mb-1 fw-bold">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                    <p class="mb-0 text-white-50"><i class="bi bi-briefcase-fill me-2"></i>{{ $employee->position }} | {{ $employee->department }}</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-light text-primary fw-bold px-4 rounded-pill shadow-sm">
                    <i class="bi bi-pencil-square me-1"></i> แก้ไข
                </a>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-light px-4 rounded-pill">
                    <i class="bi bi-arrow-left me-1"></i> กลับ
                </a>
            </div>
        </div>
    </div>
    
    <div class="card-body p-4 p-md-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-3"><i class="bi bi-person-vcard me-2"></i>ข้อมูลส่วนตัว</h6>
                <table class="table table-borderless table-sm">
                    <tr><td width="150" class="text-muted fw-bold small">รหัสพนักงาน:</td><td><span class="badge bg-light text-dark border">{{ $employee->employee_code }}</span></td></tr>
                    <tr><td class="text-muted fw-bold small">เพศ:</td>
                        <td>
                            @if($employee->gender == 'Male') <span class="text-info"><i class="bi bi-gender-male"></i> ชาย</span>
                            @elseif($employee->gender == 'Female') <span class="text-danger"><i class="bi bi-gender-female"></i> หญิง</span>
                            @else <span class="text-secondary">อื่นๆ</span> @endif
                        </td>
                    </tr>
                    <tr><td class="text-muted fw-bold small">วันเกิด:</td><td>{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y') }}</td></tr>
                    <tr><td class="text-muted fw-bold small">เลขบัตรประชาชน:</td><td>{{ $employee->id_card_number }}</td></tr>
                    <tr><td class="text-muted fw-bold small">อีเมล:</td><td><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td></tr>
                    <tr><td class="text-muted fw-bold small">เบอร์โทรศัพท์:</td><td>{{ $employee->phone_number }}</td></tr>
                </table>

                <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4"><i class="bi bi-telephone-inbound me-2"></i>ข้อมูลติดต่อฉุกเฉิน</h6>
                <table class="table table-borderless table-sm">
                    <tr><td width="150" class="text-muted fw-bold small">ชื่อผู้ติดต่อ:</td><td class="text-danger fw-bold">{{ $employee->emergency_contact_name }}</td></tr>
                    <tr><td class="text-muted fw-bold small">เบอร์โทรศัพท์:</td><td class="text-danger fw-bold">{{ $employee->emergency_contact_phone }}</td></tr>
                </table>
            </div>

            <div class="col-lg-6">
                <h6 class="text-primary fw-bold border-bottom pb-2 mb-3"><i class="bi bi-briefcase me-2"></i>ข้อมูลการทำงาน</h6>
                <table class="table table-borderless table-sm">
                    <tr><td width="150" class="text-muted fw-bold small">แผนก:</td><td><span class="badge bg-primary rounded-pill px-3">{{ $employee->department }}</span></td></tr>
                    <tr><td class="text-muted fw-bold small">ตำแหน่ง:</td><td>{{ $employee->position }}</td></tr>
                    <tr><td class="text-muted fw-bold small">เงินเดือน:</td><td class="text-success fw-bold">฿{{ number_format($employee->salary, 2) }}</td></tr>
                    <tr><td class="text-muted fw-bold small">วันที่เริ่มงาน:</td><td>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</td></tr>
                </table>

                <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4"><i class="bi bi-house-door me-2"></i>ข้อมูลที่อยู่</h6>
                <table class="table table-borderless table-sm">
                    <tr><td width="150" class="text-muted fw-bold small">ที่อยู่ปัจจุบัน:</td><td>{{ $employee->address }}</td></tr>
                    <tr><td class="text-muted fw-bold small">เขต/อำเภอ:</td><td>{{ $employee->district }}</td></tr>
                    <tr><td class="text-muted fw-bold small">จังหวัด:</td><td>{{ $employee->province }}</td></tr>
                    <tr><td class="text-muted fw-bold small">รหัสไปรษณีย์:</td><td>{{ $employee->postal_code }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection