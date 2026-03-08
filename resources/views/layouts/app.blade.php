<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ระบบจัดการพนักงาน')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { 
            font-family: 'Prompt', sans-serif; 
            background-color: #f4f7f6; 
            overflow-x: hidden; 
        }
        
        /* แถบเมนูด้านซ้าย (Sidebar) */
        .sidebar { 
            height: 100vh; 
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%); 
            color: white; 
            position: fixed; 
            width: 250px; 
            z-index: 100; 
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar-brand { 
            padding: 1.5rem; 
            text-align: center; 
            font-size: 1.2rem; 
            font-weight: 700; 
            letter-spacing: 1px; 
            border-bottom: 1px solid rgba(255,255,255,0.1); 
        }
        .nav-item .nav-link { 
            color: rgba(255,255,255,.8); 
            padding: 1rem 1.5rem; 
            transition: all 0.2s; 
            font-weight: 500;
        }
        .nav-item .nav-link:hover, .nav-item .nav-link.active { 
            color: #fff; 
            background: rgba(255,255,255,0.15); 
            border-radius: 8px; 
            margin: 0 10px; 
        }

        /* พื้นที่เนื้อหาด้านขวา (Main Content) */
        .main-content { 
            margin-left: 250px; 
            min-height: 100vh; 
        }
        .topbar { 
            background: #fff; 
            height: 70px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
            display: flex; 
            align-items: center; 
            padding: 0 2rem; 
        }
        .content-wrapper { 
            padding: 2rem; 
        }

        /* ตกแต่ง Card ให้โค้งมนและมีเงา */
        .card { 
            border: none; 
            border-radius: 12px; 
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); 
        }
    </style>
</head>
<body>

    <div class="sidebar d-none d-md-block">
        <div class="sidebar-brand">
            <i class="bi bi-buildings-fill me-2 text-warning"></i> HR System
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('employees.index') }}">
                    <i class="bi bi-people-fill me-2"></i> ข้อมูลพนักงาน
                </a>
            </li>
            
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar justify-content-between">
            <h5 class="mb-0 text-dark fw-bold text-primary">ระบบบริหารทรัพยากรบุคคล</h5>
            <div class="d-flex align-items-center">
                <span class="me-3 text-muted small fw-bold">ยินดีต้อนรับ, Admin</span>
                <img src="https://ui-avatars.com/api/?name=Admin&background=4e73df&color=fff" class="rounded-circle shadow-sm" width="40">
            </div>
        </div>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>