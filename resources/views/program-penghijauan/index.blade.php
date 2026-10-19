<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Program Penghijauan - HijauKita</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            background: #f4f8f1;
            color: #294b36;
            overflow-x: hidden;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #254f35 0%,
                #315f42 100%
            );

            color: white;
            padding: 25px 18px;
            z-index: 1000;

            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .logo {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dcebd7;
            color: #28563b;
            border-radius: 14px;

            font-size: 20px;
            font-weight: 700;

            flex-shrink: 0;
        }

        .brand {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .brand small {
            display: block;
            font-size: 9px;
            font-weight: 400;
            color: #b9d0bb;
            margin-top: 2px;
        }

        .menu-title {
            color: #a9c2ad;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 12px 13px;

            color: #d9e7da;
            text-decoration: none;

            border-radius: 12px;
            font-size: 13px;

            transition: 0.25s;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
        }

        .menu a.active {
            background: #568568;
            color: white;

            box-shadow:
                0 7px 18px rgba(0, 0, 0, 0.12);
        }

        .menu-icon {
            width: 25px;
            text-align: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            margin-top: 30px;
            padding-bottom: 5px;
        }

        .user-mini {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px;
            border-radius: 14px;

            background: rgba(255, 255, 255, 0.08);
            margin-bottom: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #dcebd7;
            color: #28563b;

            font-weight: 700;
            flex-shrink: 0;
        }

        .user-info {
            min-width: 0;
        }

        .user-info strong {
            display: block;

            color: white;
            font-size: 12px;

            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .user-info span {
            color: #aac1ad;
            font-size: 10px;
        }

        .logout-btn {
            width: 100%;

            border: 1px solid rgba(255, 255, 255, 0.1);

            background: rgba(255, 255, 255, 0.05);

            color: #d9e7da;

            padding: 10px;
            border-radius: 10px;

            cursor: pointer;
            font-size: 12px;

            transition: 0.2s;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.12);
            color: white;
        }

        /* =====================================================
           OVERLAY MOBILE
        ===================================================== */

        .sidebar-overlay {
            display: none;

            position: fixed;
            inset: 0;

            background: rgba(0, 0, 0, 0.35);

            z-index: 999;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;

            width: calc(100% - 250px);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;

            margin-bottom: 25px;
        }

        .title {
            min-width: 0;
        }

        .title h1 {
            color: #254f35;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .title p {
            color: #718174;
            font-size: 12px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: #568568;
            color: white;

            padding: 11px 17px;

            border-radius: 11px;
            text-decoration: none;

            font-size: 12px;
            white-space: nowrap;

            transition: 0.2s;
        }

        .btn-add:hover {
            background: #467257;
            transform: translateY(-2px);
        }

        .alert {
            background: #e5f1e1;
            border: 1px solid #c7dcc2;

            color: #365b43;

            padding: 13px 16px;

            border-radius: 12px;

            margin-bottom: 20px;

            font-size: 12px;
        }

        /* =====================================================
           PROGRAM GRID
        ===================================================== */

        .program-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;
        }

        .program-card {
            background: white;

            border: 1px solid #dfe9dc;

            border-radius: 19px;

            padding: 22px;

            box-shadow:
                0 8px 25px rgba(40, 86, 59, 0.06);

            transition: 0.25s;

            min-width: 0;
        }

        .program-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 30px rgba(40, 86, 59, 0.09);
        }

        .program-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            gap: 10px;

            margin-bottom: 10px;
        }

        .program-header h2 {
            color: #315b3e;
            font-size: 17px;

            overflow-wrap: anywhere;
        }

        .status {
            padding: 5px 9px;

            border-radius: 20px;

            font-size: 9px;
            font-weight: 700;

            white-space: nowrap;
            flex-shrink: 0;
        }

        .status.akan-datang {
            background: #fff4d8;
            color: #9a761f;
        }

        .status.berlangsung {
            background: #e1f1e3;
            color: #3d7750;
        }

        .status.selesai {
            background: #e5e9e6;
            color: #647268;
        }

        .location {
            color: #7b897e;
            font-size: 11px;

            margin-bottom: 12px;

            overflow-wrap: anywhere;
        }

        .description {
            color: #718174;
            font-size: 11px;

            line-height: 1.6;

            margin-bottom: 15px;

            overflow-wrap: anywhere;
        }

        /* =====================================================
           INFO
        ===================================================== */

        .info-row {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;

            margin-bottom: 15px;
        }

        .info-box {
            background: #f6f9f4;

            border: 1px solid #e1e9de;

            border-radius: 11px;

            padding: 10px;

            min-width: 0;
        }

        .info-box small {
            display: block;

            color: #8a958c;
            font-size: 9px;

            margin-bottom: 4px;
        }

        .info-box strong {
            color: #365b43;
            font-size: 13px;

            overflow-wrap: anywhere;
        }

        /* =====================================================
           ACTION
        ===================================================== */

        .program-actions {
            display: flex;
            gap: 8px;

            margin-top: 18px;
        }

        .btn-edit,
        .btn-delete {
            border: none;

            padding: 9px 13px;

            border-radius: 9px;

            font-size: 10px;

            cursor: pointer;

            text-decoration: none;

            transition: 0.2s;
        }

        .btn-edit {
            background: #e7f0e4;
            color: #365b43;
        }

        .btn-edit:hover {
            background: #dcebd7;
        }

        .btn-delete {
            background: #f8e8e6;
            color: #a74d46;
        }

        .btn-delete:hover {
            background: #f2d8d5;
        }

        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {
            background: white;

            border: 1px solid #dfe9dc;

            border-radius: 18px;

            padding: 50px 20px;

            text-align: center;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty h2 {
            color: #365b43;
            font-size: 18px;
            margin-bottom: 7px;
        }

        .empty p {
            color: #8a958c;
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* =====================================================
           MOBILE MENU BUTTON
        ===================================================== */

        .mobile-menu {
            display: none;

            border: none;

            background: #568568;
            color: white;

            width: 42px;
            height: 42px;

            border-radius: 11px;

            cursor: pointer;

            font-size: 18px;

            flex-shrink: 0;
        }

        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1100px) {

            .program-grid {
                grid-template-columns: 1fr;
            }

        }

        /* =====================================================
           TABLET KECIL
        ===================================================== */

        @media (max-width: 760px) {

            .sidebar {
                transform: translateX(-100%);
                box-shadow: 8px 0 30px rgba(0, 0, 0, 0.15);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            .mobile-menu {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .topbar {
                display: grid;

                grid-template-columns: auto 1fr;
                grid-template-areas:
                    "menu title"
                    "button button";

                align-items: center;

                gap: 14px;

                margin-bottom: 20px;
            }

            .mobile-menu {
                grid-area: menu;
            }

            .title {
                grid-area: title;
            }

            .title h1 {
                font-size: 21px;
            }

            .title p {
                font-size: 11px;
            }

            .btn-add {
                grid-area: button;

                width: 100%;
                padding: 12px;
            }

            .program-grid {
                grid-template-columns: 1fr;
            }

            .program-card {
                padding: 18px;
            }

        }

        /* =====================================================
           HP
        ===================================================== */

        @media (max-width: 550px) {

            .main {
                padding: 15px;
            }

            .title h1 {
                font-size: 18px;
            }

            .title p {
                font-size: 10px;
            }

            .program-card {
                border-radius: 15px;
                padding: 16px;
            }

            .program-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .program-header h2 {
                font-size: 16px;
            }

            .status {
                font-size: 9px;
            }

            .info-row {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .info-box {
                padding: 11px;
            }

            .info-box small {
                font-size: 9px;
            }

            .info-box strong {
                font-size: 12px;
            }

            .program-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .btn-edit,
            .btn-delete {
                width: 100%;
                text-align: center;

                padding: 11px 8px;
            }

            .empty {
                padding: 40px 15px;
            }

            .empty h2 {
                font-size: 16px;
            }

        }

        /* =====================================================
           HP SANGAT KECIL
        ===================================================== */

        @media (max-width: 380px) {

            .main {
                padding: 12px;
            }

            .topbar {
                gap: 10px;
            }

            .mobile-menu {
                width: 38px;
                height: 38px;
            }

            .title h1 {
                font-size: 16px;
            }

            .title p {
                display: none;
            }

            .program-card {
                padding: 14px;
            }

            .program-actions {
                grid-template-columns: 1fr;
            }

        }
    </style>
</head>

<body>

    <!-- OVERLAY MOBILE -->
    <div
        class="sidebar-overlay"
        id="sidebarOverlay">
    </div>


    <!-- SIDEBAR -->
    <aside
        class="sidebar"
        id="sidebar"
    >

        <div class="sidebar-header">

            <div class="logo">
                H
            </div>

            <div class="brand">

                HijauKita

                <small>
                    Pelestarian Hutan Kalimantan
                </small>

            </div>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>


        <ul class="menu">

            <li>
                <a href="{{ route('home') }}">
                    <span class="menu-icon">🏠</span>
                    Beranda
                </a>
            </li>


            <li>
                <a href="{{ route('dashboard') }}">
                    <span class="menu-icon">⌂</span>
                    Dashboard
                </a>
            </li>


            <li>
                <a
                    href="{{ route('program-penghijauan.index') }}"
                    class="{{ request()->routeIs('program-penghijauan.*') ? 'active' : '' }}"
                >
                    <span class="menu-icon">🌳</span>
                    Program Penghijauan
                </a>
            </li>


            <!-- PENANAMAN POHON -->
            <li>
                <a
                    href="{{ route('penanaman-pohon.index') }}"
                    class="{{ request()->routeIs('penanaman-pohon.*') ? 'active' : '' }}"
                >
                    <span class="menu-icon">🌱</span>
                    Penanaman Pohon
                </a>
            </li>


            <li>
                <a href="#">
                    <span class="menu-icon">📊</span>
                    Laporan
                </a>
            </li>

        </ul>


        <div
            class="menu-title"
            style="margin-top: 25px;"
        >
            Lainnya
        </div>


        <ul class="menu">

            <li>
                <a href="#">
                    <span class="menu-icon">👤</span>
                    Profil
                </a>
            </li>


            <li>
                <a href="#">
                    <span class="menu-icon">⚙</span>
                    Pengaturan
                </a>
            </li>

        </ul>


        <div class="sidebar-bottom">

            <div class="user-mini">

                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Pengguna HijauKita
                    </span>

                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    class="logout-btn"
                    type="submit"
                >
                    Keluar dari akun
                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <div class="topbar">

            <button
                class="mobile-menu"
                id="mobileMenu"
                type="button"
                aria-label="Buka menu"
            >
                ☰
            </button>


            <div class="title">

                <h1>
                    🌳 Program Penghijauan
                </h1>

                <p>
                    Pantau program dan perkembangan penanaman pohon.
                </p>

            </div>


            <a
                href="{{ route('program-penghijauan.create') }}"
                class="btn-add"
            >
                + Tambah Program
            </a>

        </div>


        @if(session('success'))

            <div class="alert">
                🌿 {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="alert">
                ⚠️ {{ session('error') }}
            </div>

        @endif


        @if($programs->count() > 0)

            <div class="program-grid">

                @foreach($programs as $program)

                    <div class="program-card">

                        <div class="program-header">

                            <h2>
                                {{ $program->nama_program }}
                            </h2>


                            <span
                                class="status
                                @if($program->status === 'Akan Datang')
                                    akan-datang
                                @elseif($program->status === 'Berlangsung')
                                    berlangsung
                                @else
                                    selesai
                                @endif"
                            >
                                {{ $program->status }}
                            </span>

                        </div>


                        <div class="location">
                            📍 {{ $program->lokasi }}
                        </div>


                        @if($program->deskripsi)

                            <div class="description">
                                {{ $program->deskripsi }}
                            </div>

                        @endif


                        <div class="info-row">

                            <div class="info-box">

                                <small>
                                    Target
                                </small>

                                <strong>
                                    {{ number_format($program->target_pohon, 0, ',', '.') }}
                                </strong>

                                <small>
                                    pohon
                                </small>

                            </div>


                            <div class="info-box">

                                <small>
                                    Mulai
                                </small>

                                <strong>
                                    {{ $program->tanggal_mulai->format('d/m/Y') }}
                                </strong>

                            </div>


                            <div class="info-box">

                                <small>
                                    Selesai
                                </small>

                                <strong>

                                    @if($program->tanggal_selesai)

                                        {{ $program->tanggal_selesai->format('d/m/Y') }}

                                    @else

                                        -

                                    @endif

                                </strong>

                            </div>

                        </div>


                        <div class="program-actions">

                            <a
                                href="{{ route('program-penghijauan.edit', $program->id) }}"
                                class="btn-edit"
                            >
                                ✏️ Edit
                            </a>


                            <form
                                action="{{ route('program-penghijauan.destroy', $program->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus program ini?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                >
                                    🗑️ Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">
                    🌱
                </div>

                <h2>
                    Belum ada program penghijauan
                </h2>

                <p>
                    Yuk buat program penghijauan pertamamu.
                </p>

                <a
                    href="{{ route('program-penghijauan.create') }}"
                    class="btn-add"
                >
                    + Buat Program
                </a>

            </div>

        @endif

    </main>


    <script>

        const mobileMenu =
            document.getElementById('mobileMenu');

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            sidebar.classList.add('open');

            sidebarOverlay.classList.add('show');

            document.body.style.overflow = 'hidden';

        }


        function closeSidebar() {

            sidebar.classList.remove('open');

            sidebarOverlay.classList.remove('show');

            document.body.style.overflow = '';

        }


        if (mobileMenu) {

            mobileMenu.addEventListener(
                'click',
                function () {

                    if (sidebar.classList.contains('open')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }

                }
            );

        }


        if (sidebarOverlay) {

            sidebarOverlay.addEventListener(
                'click',
                function () {

                    closeSidebar();

                }
            );

        }


        const sidebarLinks =
            sidebar.querySelectorAll('.menu a');


        sidebarLinks.forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    if (window.innerWidth <= 760) {
                        closeSidebar();
                    }

                }
            );

        });


        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth > 760) {
                    closeSidebar();
                }

            }
        );

    </script>

</body>

</html>
