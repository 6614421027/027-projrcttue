<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 12px; }
        .section-title { 
            border-bottom: 2px solid #e3e6f0; 
            padding-bottom: 10px; 
            margin-bottom: 20px; 
            color: #4e73df; 
            font-weight: bold; 
        }
        .info-label {
            font-size: 0.85rem;
            color: #858796;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        .info-value {
            font-size: 1rem;
            color: #3a3b45;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }
        /* ตกแต่งส่วนหัว Profile */
        .profile-header {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            
            <div class="profile-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center me-4 shadow" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fw-bold">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                        <p class="mb-0 text-white-50 fs-5"><i class="bi bi-briefcase-fill me-2"></i>{{ $employee->position }} | {{ $employee->department }}</p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-light text-primary fw-bold px-3">
                        <i class="bi bi-pencil-square me-1"></i> แก้ไขข้อมูล
                    </a>
                    <a href="{{ route('employees.index') }}" class="btn btn-outline-light px-3">
                        <i class="bi bi-list me-1"></i> หน้ารายการ
                    </a>
                </div>
            </div>
            
            <div class="card-body p-5">
                <h5 class="section-title"><i class="bi bi-person-vcard me-2"></i>ข้อมูลส่วนตัว</h5>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-label">รหัสพนักงาน</div>
                        <div class="info-value"><span class="badge bg-light text-dark border fs-6">{{ $employee->employee_code }}</span></div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-label">เพศ</div>
                        <div class="info-value">
                            @if($employee->gender == 'Male') <span class="text-info"><i class="bi bi-gender-male"></i> ชาย</span>
                            @elseif($employee->gender == 'Female') <span class="text-danger"><i class="bi bi-gender-female"></i> หญิง</span>
                            @else <span class="text-secondary">อื่นๆ</span> @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-label">วันเกิด</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y') }}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-label">เลขบัตรประชาชน</div>
                        <div class="info-value">{{ $employee->id_card_number }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">อีเมล</div>
                        <div class="info-value"><a href="mailto:{{ $employee->email }}" class="text-decoration-none">{{ $employee->email }}</a></div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">เบอร์โทรศัพท์</div>
                        <div class="info-value">{{ $employee->phone_number }}</div>
                    </div>
                </div>

                <h5 class="section-title mt-2"><i class="bi bi-house-door me-2"></i>ข้อมูลที่อยู่</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-label">ที่อยู่ปัจจุบัน</div>
                        <div class="info-value">{{ $employee->address }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">เขต/อำเภอ</div>
                        <div class="info-value">{{ $employee->district }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">จังหวัด</div>
                        <div class="info-value">{{ $employee->province }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">รหัสไปรษณีย์</div>
                        <div class="info-value">{{ $employee->postal_code }}</div>
                    </div>
                </div>

                <h5 class="section-title mt-2"><i class="bi bi-pc-display me-2"></i>ข้อมูลการทำงาน</h5>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-label">แผนก</div>
                        <div class="info-value"><span class="badge bg-primary fs-6">{{ $employee->department }}</span></div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-label">ตำแหน่ง</div>
                        <div class="info-value">{{ $employee->position }}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-label">เงินเดือน</div>
                        <div class="info-value text-success fw-bold">฿{{ number_format($employee->salary, 2) }}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-label">วันที่เริ่มงาน</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</div>
                    </div>
                </div>

                <h5 class="section-title mt-2"><i class="bi bi-telephone-inbound me-2"></i>ข้อมูลติดต่อฉุกเฉิน</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-label">ชื่อผู้ติดต่อฉุกเฉิน</div>
                        <div class="info-value text-danger fw-bold">{{ $employee->emergency_contact_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">เบอร์โทรศัพท์ผู้ติดต่อฉุกเฉิน</div>
                        <div class="info-value text-danger fw-bold">{{ $employee->emergency_contact_phone }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>