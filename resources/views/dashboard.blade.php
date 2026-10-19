<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HijauKita - Dashboard</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f8f1;
            color: #294b36;
        }

        /* ================= SIDEBAR ================= */

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
            transition: 0.3s;
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
            background: rgba(255,255,255,0.08);
            color: white;
        }

        .menu a.active {
            background: #568568;
            color: white;

            box-shadow:
                0 7px 18px rgba(0,0,0,0.12);
        }

        .menu-icon {
            width: 25px;
            text-align: center;
            font-size: 15px;
        }

        /* ================= USER ================= */

        .sidebar-bottom {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 20px;
        }

        .user-mini {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px;

            border-radius: 14px;

            background: rgba(255,255,255,0.08);

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

            border: 1px solid rgba(255,255,255,0.1);

            background: rgba(255,255,255,0.05);

            color: #d9e7da;

            padding: 10px;

            border-radius: 10px;

            cursor: pointer;

            font-size: 12px;

            transition: 0.2s;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.12);
            color: white;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 25px 30px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 30px;
        }

        .welcome h1 {
            color: #254f35;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .welcome p {
            color: #718174;
            font-size: 12px;
        }

        .date {
            padding: 10px 15px;

            background: white;

            border: 1px solid #dce8d9;

            border-radius: 12px;

            color: #568568;

            font-size: 12px;
        }

        /* ================= HERO ================= */

        .hero {
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(
                    100deg,
                    rgba(37, 79, 53, 0.96),
                    rgba(86, 133, 104, 0.88)
                );

            border-radius: 22px;

            padding: 30px;

            color: white;

            margin-bottom: 25px;

            box-shadow:
                0 15px 35px rgba(40, 86, 59, 0.15);
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            right: -70px;
            top: -90px;

            border-radius: 50%;

            background: rgba(255,255,255,0.08);
        }

        .hero h2 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .hero p {
            max-width: 650px;

            color: #dcebdc;

            font-size: 13px;

            line-height: 1.7;
        }

        /* ================= STATS ================= */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 17px;

            margin-bottom: 25px;
        }

        .stat-card {
            background: white;

            border: 1px solid #dfe9dc;

            border-radius: 17px;

            padding: 20px;

            transition: 0.25s;
        }

        .stat-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 12px 25px rgba(50, 90, 58, 0.09);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 15px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #e6f0e2;

            color: #568568;

            font-size: 17px;
        }

        .stat-label {
            color: #7d8b80;
            font-size: 11px;
        }

        .stat-number {
            color: #294b36;
            font-size: 25px;
            font-weight: 700;
        }

        .stat-change {
            color: #568568;
            font-size: 10px;
            margin-top: 4px;
        }

        /* ================= CONTENT ================= */

        .content-grid {
            display: grid;

            grid-template-columns:
                1.5fr 1fr;

            gap: 20px;
        }

        .panel {
            background: white;

            border: 1px solid #dfe9dc;

            border-radius: 18px;

            padding: 22px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 20px;
        }

        .panel-header h3 {
            color: #315b3e;
            font-size: 15px;
        }

        .panel-header a {
            color: #568568;
            font-size: 11px;
            text-decoration: none;
        }

        .activity {
            display: flex;
            gap: 12px;

            padding: 13px 0;

            border-bottom: 1px solid #edf2eb;
        }

        .activity:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e7f0e4;

            color: #568568;

            border-radius: 11px;

            flex-shrink: 0;
        }

        .activity-info {
            flex: 1;
        }

        .activity-info strong {
            display: block;

            color: #365b43;

            font-size: 12px;

            margin-bottom: 3px;
        }

        .activity-info span {
            color: #8a958c;
            font-size: 10px;
        }

        /* ================= ACTIONS ================= */

        .actions {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;
        }

        .action {
            display: block;

            padding: 17px;

            background: #f6f9f4;

            border: 1px solid #e0e9dc;

            border-radius: 14px;

            text-decoration: none;

            transition: 0.25s;
        }

        .action:hover {
            background: #edf5ea;

            border-color: #bdd2b9;

            transform: translateY(-2px);
        }

        .action-icon {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .action strong {
            display: block;

            color: #365b43;

            font-size: 12px;

            margin-bottom: 3px;
        }

        .action span {
            color: #8a958c;

            font-size: 9px;

            line-height: 1.4;
        }

        .tanam-pohon {
            background:
                linear-gradient(
                    135deg,
                    #edf6e9,
                    #f7faf5
                );

            border-color: #cfe0ca;
        }

        .tanam-pohon:hover {
            background:
                linear-gradient(
                    135deg,
                    #e3f1df,
                    #f4f9f1
                );

            border-color: #aecaac;
        }

        /* ================= MOBILE ================= */

        .mobile-menu {
            display: none;

            border: none;

            background: #568568;

            color: white;

            width: 40px;
            height: 40px;

            border-radius: 11px;

            cursor: pointer;

            font-size: 18px;
        }

        @media (max-width: 1050px) {

            .stats {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .mobile-menu {
                display: block;
            }

            .topbar {
                gap: 15px;
            }

            .date {
                display: none;
            }
        }

        @media (max-width: 500px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 23px;
            }

            .hero h2 {
                font-size: 20px;
            }

            .actions {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 20px;
            }
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar" id="sidebar">

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

                <a
                    href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'active' : '' }}"
                >

                    <span class="menu-icon">
                        🏠
                    </span>

                    Beranda

                </a>

            </li>


            <li>

                <a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >

                    <span class="menu-icon">
                        ⌂
                    </span>

                    Dashboard

                </a>

            </li>


            <li>

                <a
                    href="{{ route('program-penghijauan.index') }}"
                    class="{{ request()->routeIs('program-penghijauan.*') ? 'active' : '' }}"
                >

                    <span class="menu-icon">
                        🌳
                    </span>

                    Program Penghijauan

                </a>

            </li>


            <!-- PENANAMAN POHON -->

            <li>

                <a
                    href="{{ route('penanaman-pohon.index') }}"
                    class="{{ request()->routeIs('penanaman-pohon.*') ? 'active' : '' }}"
                >

                    <span class="menu-icon">
                        🌱
                    </span>

                    Penanaman Pohon

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        📊
                    </span>

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

                    <span class="menu-icon">
                        👤
                    </span>

                    Profil

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        ⚙
                    </span>

                    Pengaturan

                </a>

            </li>

        </ul>


        <!-- USER -->

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
            >
                ☰
            </button>


            <div class="welcome">

                <h1>

                    Selamat datang,
                    {{ auth()->user()->name }}
                    🌿

                </h1>

                <p>

                    Pantau aktivitas dan kontribusimu
                    untuk kelestarian hutan Kalimantan.

                </p>

            </div>


            <div class="date">

                {{ date('d M Y') }}

            </div>

        </div>


        <!-- HERO -->

        <section class="hero">

            <h2>
                Bersama Hijaukan Kalimantan 🌳
            </h2>

            <p>

                Setiap pohon yang ditanam adalah langkah
                kecil menuju masa depan yang lebih hijau.
                Terima kasih sudah menjadi bagian dari
                gerakan pelestarian hutan Kalimantan.

            </p>

        </section>


        <!-- STATS -->

        <section class="stats">

            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-label">
                        Pohon Ditanam
                    </span>

                    <div class="stat-icon">
                        🌱
                    </div>

                </div>

                <div class="stat-number">
                    128
                </div>

                <div class="stat-change">
                    ↑ 12% bulan ini
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-label">
                        Program Diikuti
                    </span>

                    <div class="stat-icon">
                        🌳
                    </div>

                </div>

                <div class="stat-number">
                    8
                </div>

                <div class="stat-change">
                    ↑ 2 program baru
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-label">
                        Total Kontribusi
                    </span>

                    <div class="stat-icon">
                        ♻
                    </div>

                </div>

                <div class="stat-number">
                    24
                </div>

                <div class="stat-change">
                    Aktivitas selesai
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-label">
                        Poin Hijau
                    </span>

                    <div class="stat-icon">
                        ⭐
                    </div>

                </div>

                <div class="stat-number">
                    2.450
                </div>

                <div class="stat-change">
                    ↑ 180 poin minggu ini
                </div>

            </div>

        </section>


        <!-- CONTENT -->

        <section class="content-grid">


            <!-- AKTIVITAS -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Aktivitas Terbaru
                    </h3>

                    <a href="#">
                        Lihat semua
                    </a>

                </div>


                <div class="activity">

                    <div class="activity-icon">
                        🌱
                    </div>

                    <div class="activity-info">

                        <strong>
                            Menanam 20 pohon
                        </strong>

                        <span>
                            Program Reboisasi Kalimantan
                            • 2 jam lalu
                        </span>

                    </div>

                </div>


                <div class="activity">

                    <div class="activity-icon">
                        🌳
                    </div>

                    <div class="activity-info">

                        <strong>
                            Mengikuti program penghijauan
                        </strong>

                        <span>
                            Hutan Kalimantan Tengah
                            • Kemarin
                        </span>

                    </div>

                </div>


                <div class="activity">

                    <div class="activity-icon">
                        ⭐
                    </div>

                    <div class="activity-info">

                        <strong>
                            Mendapatkan 100 poin hijau
                        </strong>

                        <span>
                            Kontribusi lingkungan
                            • 3 hari lalu
                        </span>

                    </div>

                </div>


                <div class="activity">

                    <div class="activity-icon">
                        ♻
                    </div>

                    <div class="activity-info">

                        <strong>
                            Menyelesaikan tantangan hijau
                        </strong>

                        <span>
                            Tantangan Mingguan
                            • 5 hari lalu
                        </span>

                    </div>

                </div>

            </div>


            <!-- AKSI CEPAT -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Aksi Cepat
                    </h3>

                </div>


                <div class="actions">


                    <!-- TANAM POHON -->

                    <a
                        href="{{ route('penanaman-pohon.index') }}"
                        class="action tanam-pohon"
                    >

                        <div class="action-icon">
                            🌱
                        </div>

                        <strong>
                            Tanam Pohon
                        </strong>

                        <span>
                            Beli bibit pohon yang akan
                            langsung ditanam oleh organisasi.
                        </span>

                    </a>


                    <!-- PROGRAM -->

                    <a
                        href="{{ route('program-penghijauan.index') }}"
                        class="action"
                    >

                        <div class="action-icon">
                            🌳
                        </div>

                        <strong>
                            Program
                        </strong>

                        <span>
                            Temukan program penghijauan
                            di Kalimantan.
                        </span>

                    </a>


                    <!-- LAPORAN -->

                    <a
                        href="#"
                        class="action"
                    >

                        <div class="action-icon">
                            📊
                        </div>

                        <strong>
                            Laporan
                        </strong>

                        <span>
                            Lihat perkembangan
                            kontribusimu.
                        </span>

                    </a>


                    <!-- PROFIL -->

                    <a
                        href="#"
                        class="action"
                    >

                        <div class="action-icon">
                            👤
                        </div>

                        <strong>
                            Profil
                        </strong>

                        <span>
                            Kelola informasi akunmu.
                        </span>

                    </a>

                </div>

            </div>

        </section>

    </main>


    <!-- JAVASCRIPT -->

    <script>

        const mobileMenu =
            document.getElementById("mobileMenu");

        const sidebar =
            document.getElementById("sidebar");

        if (mobileMenu && sidebar) {

            mobileMenu.addEventListener(
                "click",
                function () {

                    sidebar.classList.toggle("open");

                }
            );

        }

    </script>

</body>

</html>
