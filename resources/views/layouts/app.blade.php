<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AgroRekom')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .has-bg {
            background: url('/images/ppp.png') no-repeat center center fixed;
            background-size: cover;
        }

        .has-bg .content-wrapper {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        nav.navbar {
            background: #2e7d32;
            color: #fff;
            padding: 10px 20px;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }

        .sidebar {
            width: 260px;
            background-color: #1b5e20;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            margin-top: 56px;
            transition: 0.3s ease;
            overflow-y: auto;
            padding-top: 20px;
            z-index: 999;
        }

        .sidebar.hide {
            left: -260px;
        }

        .sidebar a {
            color: #e8f5e9;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
        }
        
        .card-hover {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .auth-page {
            margin-left: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .auth-page .content-wrapper > * {
            width: 100%;
            max-width: 450px;
        }

        .form-container-custom {
            background-color: rgba(255, 255, 255, 0.85); /* putih transparan */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 30px;
            width: 380px;
        }

        .sidebar a:hover {
            background: #2e7d32;
        }

        .content-wrapper {
            margin-left: 260px;
            padding: 80px 30px 80px;
            transition: 0.3s;
        }
        .collapsed .content-wrapper {
            margin-left: 0;
        }

        #btnToggle {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 22px;
            margin-right: 15px;
        }

        footer {
            background: #e8f5e9;
            text-align: center;
            padding: 8px;
            bottom: 0;
            width: 100%;
            position: fixed;
            left: 0;
        }
    </style>

</head>
<body class="@yield('body-class')">
    <nav class="navbar navbar-dark fixed-top d-flex align-items-center">
        <button id="btnToggle"><i class="bi bi-list"></i></button>

        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/foto/s.png') }}" alt="Logo Bulan" style="height:32px; width:32px; margin-right:8px;">
            <span>AgroRekom</span>
        </a>

        <form class="d-none d-md-flex ms-auto me-3">
            <input type="text" class="form-control form-control-sm" placeholder="Cari sesuatu...">
        </form>

        @auth
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->foto ? asset('images/foto/'.Auth::user()->foto) : asset('images/foto/s.png') }}" 
                        alt="Avatar" class="rounded-circle me-2" style="width:28px; height:28px; object-fit:cover;">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('akun.show') }}">Akun Saya</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="dropdown-item text-danger">Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                Login
            </a>
        @endauth
    </nav>


    @if (!Request::is('login') && !Request::is('register') && !Request::is('/'))
    <div class="sidebar" id="sidebar">
        <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('tanamans.index') }}"><i class="bi bi-tree-fill"></i> Data Tanaman</a>
                <a href="{{ route('rekomendasis.index') }}"><i class="bi bi-lightbulb-fill"></i> Rekomendasi</a>
                <a href="{{ route('pupuk.index-admin') }}"><i class="bi bi-bag-check-fill"></i> Approval</a>
            @else
                <a href="{{ route('lahans.index') }}"><i class="bi bi-tree"></i> Data Lahan</a>
                <a href="{{ route('rekomendasis.index') }}"><i class="bi bi-search"></i> Cari Rekomendasi</a>
                <a href="{{ route('pupuk.index-user') }}"><i class="bi bi-droplet-fill"></i> Pupuk</a>
                <a href="{{ route('cuaca.index') }}"><i class="bi bi-cloud-sun"></i> Cuaca</a>
            @endif
        @endauth
    </div>
    @endif



    <div class="content-wrapper 
        @if (Request::is('login') || Request::is('register') || Request::is('/'))
            auth-page
        @endif" 
        id="contentWrapper">
        @yield('content')
    </div>



    <footer>
        © 2025 AgroRekom | Bangun Pertanian Cerdas Bersama Kita Petani Maju
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const btnToggle = document.getElementById("btnToggle");
        const sidebar = document.getElementById("sidebar");
        const wrapper = document.body;

        btnToggle.addEventListener("click", () => {
            sidebar.classList.toggle("hide");
            wrapper.classList.toggle("collapsed");
        });
    </script>

</body>
</html>
