<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Program - HijauKita</title>

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

        .main {
            min-height: 100vh;
            padding: 35px;
        }

        .container {
            max-width: 850px;
            margin: 0 auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #568568;
            text-decoration: none;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .back:hover {
            color: #315f42;
        }

        .header {
            background:
                linear-gradient(
                    100deg,
                    rgba(37, 79, 53, 0.96),
                    rgba(86, 133, 104, 0.88)
                );

            color: white;
            padding: 27px 30px;
            border-radius: 20px 20px 0 0;
        }

        .header h1 {
            font-size: 23px;
            margin-bottom: 6px;
        }

        .header p {
            color: #dcebdc;
            font-size: 12px;
        }

        .form-card {
            background: white;
            border: 1px solid #dfe9dc;
            border-top: none;
            padding: 30px;
            border-radius: 0 0 20px 20px;
            box-shadow:
                0 15px 35px rgba(40, 86, 59, 0.08);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            color: #365b43;
            font-size: 11px;
            font-weight: 700;
        }

        label span {
            color: #d35c5c;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dce7d9;
            background: #f9fbf8;
            border-radius: 11px;
            color: #365b43;
            outline: none;
            font-size: 12px;
            transition: 0.2s;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            background: white;
            border-color: #7ba589;
            box-shadow:
                0 0 0 3px rgba(86, 133, 104, 0.10);
        }

        .error {
            color: #c95555;
            font-size: 10px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #edf2eb;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-cancel {
            background: #f0f3ef;
            color: #657267;
        }

        .btn-submit {
            background: #568568;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-submit:hover {
            background: #467457;
            box-shadow:
                0 7px 15px rgba(50, 100, 65, 0.15);
        }

        @media (max-width: 650px) {

            .main {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .header,
            .form-card {
                padding: 22px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn {
                text-align: center;
            }

        }

    </style>

</head>


<body>

<main class="main">

    <div class="container">

        <a
            href="{{ route('program-penghijauan.index') }}"
            class="back"
        >
            ← Kembali ke Program
        </a>


        <div class="header">

            <h1>
                Tambah Program Penghijauan 🌱
            </h1>

            <p>
                Tambahkan kegiatan penghijauan baru
                ke dalam sistem HijauKita.
            </p>

        </div>


        <div class="form-card">

            <form
                action="{{ route('program-penghijauan.store') }}"
                method="POST"
            >

                @csrf


                <div class="form-grid">

                    <div class="form-group full">

                        <label>
                            Nama Program <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="nama_program"
                            value="{{ old('nama_program') }}"
                            placeholder="Contoh: Reboisasi Hutan Kalimantan Tengah"
                            required
                        >

                        @error('nama_program')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Lokasi <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh: Palangka Raya"
                            required
                        >

                        @error('lokasi')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Target Pohon <span>*</span>
                        </label>

                        <input
                            type="number"
                            name="target_pohon"
                            value="{{ old('target_pohon', 1000) }}"
                            min="1"
                            placeholder="Contoh: 1000"
                            required
                        >

                        @error('target_pohon')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Tanggal Mulai <span>*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="{{ old('tanggal_mulai', date('Y-m-d')) }}"
                            required
                        >

                        @error('tanggal_mulai')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            value="{{ old('tanggal_selesai') }}"
                        >

                        @error('tanggal_selesai')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label>
                            Status <span>*</span>
                        </label>

                        <select name="status" required>

                            <option
                                value="Akan Datang"
                                {{ old('status') == 'Akan Datang' ? 'selected' : '' }}
                            >
                                Akan Datang
                            </option>

                            <option
                                value="Berlangsung"
                                {{ old('status', 'Berlangsung') == 'Berlangsung' ? 'selected' : '' }}
                            >
                                Berlangsung
                            </option>

                            <option
                                value="Selesai"
                                {{ old('status') == 'Selesai' ? 'selected' : '' }}
                            >
                                Selesai
                            </option>

                        </select>

                        @error('status')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group full">

                        <label>
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            placeholder="Jelaskan mengenai program penghijauan ini..."
                        >{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                <div class="actions">

                    <a
                        href="{{ route('program-penghijauan.index') }}"
                        class="btn btn-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-submit"
                    >
                        🌱 Simpan Program
                    </button>

                </div>

            </form>

        </div>

    </div>

</main>

</body><!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Program - HijauKita</title>


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

            background:
                linear-gradient(
                    180deg,
                    #254f35 0%,
                    #315f42 100%
                );

            color: white;

            padding: 25px 18px;

            z-index: 1000;
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

            padding: 35px;
        }


        .container {
            max-width: 850px;

            margin: 0 auto;
        }


        .back {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: #568568;

            text-decoration: none;

            font-size: 12px;

            margin-bottom: 18px;
        }


        .back:hover {
            color: #315f42;
        }


        .header {
            background:
                linear-gradient(
                    100deg,
                    rgba(37, 79, 53, 0.96),
                    rgba(86, 133, 104, 0.88)
                );

            color: white;

            padding: 27px 30px;

            border-radius: 20px 20px 0 0;
        }


        .header h1 {
            font-size: 23px;
            margin-bottom: 6px;
        }


        .header p {
            color: #dcebdc;
            font-size: 12px;
        }


        .form-card {
            background: white;

            border: 1px solid #dfe9dc;

            border-top: none;

            padding: 30px;

            border-radius: 0 0 20px 20px;

            box-shadow:
                0 15px 35px rgba(40, 86, 59, 0.08);
        }


        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }


        .form-group {
            display: flex;

            flex-direction: column;

            gap: 7px;
        }


        .form-group.full {
            grid-column: 1 / -1;
        }


        label {
            color: #365b43;

            font-size: 11px;

            font-weight: 700;
        }


        label span {
            color: #d35c5c;
        }


        input,
        textarea,
        select {
            width: 100%;

            padding: 12px 13px;

            border: 1px solid #dce7d9;

            background: #f9fbf8;

            border-radius: 11px;

            color: #365b43;

            outline: none;

            font-size: 12px;

            transition: 0.2s;
        }


        textarea {
            min-height: 120px;

            resize: vertical;
        }


        input:focus,
        textarea:focus,
        select:focus {
            background: white;

            border-color: #7ba589;

            box-shadow:
                0 0 0 3px rgba(86, 133, 104, 0.10);
        }


        .error {
            color: #c95555;
            font-size: 10px;
        }


        .actions {
            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #edf2eb;
        }


        .btn {
            border: none;

            padding: 11px 18px;

            border-radius: 10px;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            text-decoration: none;

            transition: 0.2s;
        }


        .btn-cancel {
            background: #f0f3ef;
            color: #657267;
        }


        .btn-submit {
            background: #568568;
            color: white;
        }


        .btn:hover {
            transform: translateY(-2px);
        }


        .btn-submit:hover {
            background: #467457;

            box-shadow:
                0 7px 15px rgba(50, 100, 65, 0.15);
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


        @media (max-width: 760px) {

            .sidebar {
                transform: translateX(-100%);
                transition: 0.3s;
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

        }


        @media (max-width: 650px) {

            .form-grid {
                grid-template-columns: 1fr;
            }


            .form-group.full {
                grid-column: auto;
            }


            .header,
            .form-card {
                padding: 22px;
            }


            .actions {
                flex-direction: column-reverse;
            }


            .btn {
                text-align: center;
            }

        }

    </style>

</head>


<body>


    <!-- ================= SIDEBAR ================= -->

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

                    <span class="menu-icon">
                        🏠
                    </span>

                    Beranda

                </a>

            </li>


            <li>

                <a href="{{ route('dashboard') }}">

                    <span class="menu-icon">
                        ⌂
                    </span>

                    Dashboard

                </a>

            </li>


            <li>

                <a
                    href="{{ route('program-penghijauan.index') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        🌳
                    </span>

                    Program Penghijauan

                </a>

            </li>


            <li>

                <a href="#">

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


    <!-- ================= MAIN ================= -->

    <main class="main">


        <div class="container">


            <button
                class="mobile-menu"
                id="mobileMenu"
                type="button"
            >
                ☰
            </button>


            <a
                href="{{ route('program-penghijauan.index') }}"
                class="back"
            >
                ← Kembali ke Program
            </a>


            <div class="header">

                <h1>
                    Tambah Program Penghijauan 🌱
                </h1>

                <p>
                    Tambahkan kegiatan penghijauan baru
                    ke dalam sistem HijauKita.
                </p>

            </div>


            <div class="form-card">


                <form
                    action="{{ route('program-penghijauan.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="form-grid">


                        <div class="form-group full">

                            <label>
                                Nama Program <span>*</span>
                            </label>


                            <input
                                type="text"
                                name="nama_program"
                                value="{{ old('nama_program') }}"
                                placeholder="Contoh: Reboisasi Hutan Kalimantan Tengah"
                                required
                            >


                            @error('nama_program')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label>
                                Lokasi <span>*</span>
                            </label>


                            <input
                                type="text"
                                name="lokasi"
                                value="{{ old('lokasi') }}"
                                placeholder="Contoh: Palangka Raya"
                                required
                            >


                            @error('lokasi')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label>
                                Target Pohon <span>*</span>
                            </label>


                            <input
                                type="number"
                                name="target_pohon"
                                value="{{ old('target_pohon', 0) }}"
                                min="0"
                                placeholder="Contoh: 1000"
                                required
                            >


                            @error('target_pohon')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label>
                                Tanggal Mulai <span>*</span>
                            </label>


                            <input
                                type="date"
                                name="tanggal_mulai"
                                value="{{ old('tanggal_mulai') }}"
                                required
                            >


                            @error('tanggal_mulai')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label>
                                Tanggal Selesai
                            </label>


                            <input
                                type="date"
                                name="tanggal_selesai"
                                value="{{ old('tanggal_selesai') }}"
                            >


                            @error('tanggal_selesai')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label>
                                Status <span>*</span>
                            </label>


                            <select name="status" required>

                                <option
                                    value="Akan Datang"
                                    {{ old('status') == 'Akan Datang' ? 'selected' : '' }}
                                >
                                    Akan Datang
                                </option>


                                <option
                                    value="Berlangsung"
                                    {{ old('status') == 'Berlangsung' ? 'selected' : '' }}
                                >
                                    Berlangsung
                                </option>


                                <option
                                    value="Selesai"
                                    {{ old('status') == 'Selesai' ? 'selected' : '' }}
                                >
                                    Selesai
                                </option>

                            </select>


                            @error('status')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group full">

                            <label>
                                Deskripsi
                            </label>


                            <textarea
                                name="deskripsi"
                                placeholder="Jelaskan mengenai program penghijauan ini..."
                            >{{ old('deskripsi') }}</textarea>


                            @error('deskripsi')

                                <div class="error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>


                    <div class="actions">


                        <a
                            href="{{ route('program-penghijauan.index') }}"
                            class="btn btn-cancel"
                        >
                            Batal
                        </a>


                        <button
                            type="submit"
                            class="btn btn-submit"
                        >
                            🌱 Simpan Program
                        </button>


                    </div>


                </form>


            </div>


        </div>


    </main>


    <script>

        const mobileMenu =
            document.getElementById('mobileMenu');

        const sidebar =
            document.getElementById('sidebar');


        if (mobileMenu && sidebar) {

            mobileMenu.addEventListener(
                'click',
                function () {

                    sidebar.classList.toggle('open');

                }
            );

        }

    </script>


</body>

</html>

</html>
