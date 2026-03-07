<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อพนักงานทั้งหมด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f4f7f6; /* สีพื้นหลังสไตล์ Dashboard */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        }
        .table {
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        /* ตกแต่งหัวตาราง */
        .table thead th {
            background-color: #f8f9fc;
            color: #4e73df;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e3e6f0;
            white-space: nowrap;
            padding: 1rem;
        }
        .table tbody td {
            vertical-align: middle;
            white-space: nowrap;
            padding: 0.8rem 1rem;
            color: #5a5c69;
        }
        /* ล็อกคอลัมน์จัดการให้อยู่ขวาสุดเสมอ */
        .sticky-action {
            position: sticky;
            right: 0;
            background-color: #fff;
            border-left: 1px solid #e3e6f0;
            box-shadow: -2px 0 4px rgba(0,0,0,0.02);
            z-index: 1;
        }
        /* เปลี่ยนสีพื้นหลังคอลัมน์ล็อกเวลาเอาเมาส์ชี้แถว */
        .table-hover tbody tr:hover .sticky-action {
            background-color: #f8f9fa;
        }
        .btn-action {
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-5 px-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">
                <i class="bi bi-people-fill text-primary me-2"></i> ระบบจัดการพนักงาน
            </h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary btn-action shadow-sm">
                <i class="bi bi-person-plus-fill me-1"></i> เพิ่มพนักงานใหม่
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>เพศ</th>
                                <th>วันเกิด</th>
                                <th>เลขบัตรประชาชน</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>ที่อยู่</th>
                                <th>เขต/อำเภอ</th>
                                <th>จังหวัด</th>
                                <th>รหัสไปรษณีย์</th>
                                <th>แผนก</th>
                                <th>ตำแหน่ง</th>
                                <th class="text-end">เงินเดือน</th>
                                <th>วันที่เริ่มงาน</th>
                                <th>ชื่อติดต่อฉุกเฉิน</th>
                                <th>เบอร์ติดต่อฉุกเฉิน</th>
                                <th class="text-center sticky-action">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $index => $emp)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $employees->firstItem() + $index }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $emp->employee_code }}</span></td>
                                <td class="fw-bold text-dark">{{ $emp->first_name }} {{ $emp->last_name }}</td>
                                <td>
                                    @if($emp->gender == 'Male') 
                                        <span class="badge bg-info bg-opacity-10 text-info border border-info"><i class="bi bi-gender-male"></i> ชาย</span>
                                    @elseif($emp->gender == 'Female') 
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger"><i class="bi bi-gender-female"></i> หญิง</span>
                                    @else 
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">อื่นๆ</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($emp->date_of_birth)->format('d/m/Y') }}</td>
                                <td>{{ $emp->id_card_number }}</td>
                                <td><a href="mailto:{{ $emp->email }}" class="text-decoration-none">{{ $emp->email }}</a></td>
                                <td>{{ $emp->phone_number }}</td>
                                <td>{{ Str::limit($emp->address, 25) }}</td>
                                <td>{{ $emp->district }}</td>
                                <td>{{ $emp->province }}</td>
                                <td>{{ $emp->postal_code }}</td>
                                <td><span class="badge bg-primary rounded-pill">{{ $emp->department }}</span></td>
                                <td>{{ $emp->position }}</td>
                                <td class="text-end text-success fw-bold">฿{{ number_format($emp->salary, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($emp->hire_date)->format('d/m/Y') }}</td>
                                <td>{{ $emp->emergency_contact_name }}</td>
                                <td>{{ $emp->emergency_contact_phone }}</td>
                                <td class="text-center sticky-action">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('employees.show', $emp->id) }}" class="btn btn-outline-info btn-sm btn-action">
    <i class="bi bi-eye"></i> ดู
</a>
                                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-outline-warning btn-sm btn-action">
                                            <i class="bi bi-pencil-square"></i> แก้ไข
                                        </a>
                                        <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm btn-action" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลพนักงานคนนี้?')">
                                                <i class="bi bi-trash3-fill"></i> ลบ
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="19" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-folder2-open display-4 d-block mb-3"></i>
                                        <h5>ยังไม่มีข้อมูลพนักงานในระบบ</h5>
                                        <p>คลิกที่ปุ่ม "เพิ่มพนักงานใหม่" เพื่อเริ่มต้นเพิ่มข้อมูล</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            @if($employees->hasPages())
            <div class="card-footer bg-white py-3 d-flex justify-content-end border-top-0">
                {{ $employees->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>