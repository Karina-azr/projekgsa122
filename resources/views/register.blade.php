<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HijauKita - Register</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;

            background:
                linear-gradient(
                    rgba(25, 65, 43, 0.58),
                    rgba(15, 52, 34, 0.72)
                ),
                url("https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=1920&q=85")
                center/cover no-repeat;
        }

        .container {
            width: 100%;
            max-width: 440px;
        }

        .card {
            background: rgba(247, 251, 245, 0.96);
            border-radius: 26px;
            padding: 42px 40px;
            box-shadow: 0 25px 70px rgba(10, 45, 28, 0.35);
        }

        .brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo {
            width: 62px;
            height: 62px;
            margin: auto;
            margin-bottom: 15px;

            display: flex;
            justify-content: center;
            align-items: center;

            border-radius: 18px;
            background: #dcebd7;
            color: #28563b;

            font-size: 25px;
            font-weight: bold;
        }

        .brand-name {
            color: #28563b;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        h1 {
            text-align: center;
            color: #254f35;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #718174;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .error {
            background: #f8dddd;
            color: #9a4141;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            color: #365b43;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 14px;

            border: 1px solid #c9dcc7;
            border-radius: 13px;

            outline: none;
            background: #f8fbf5;
            color: #294b36;
        }

        input:focus {
            border-color: #83ad82;
            background: white;
        }

        .password {
            position: relative;
        }

        .password input {
            padding-right: 90px;
        }

        .show {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);

            border: none;
            background: none;

            color: #568568;
            font-size: 12px;
            font-weight: bold;

            cursor: pointer;
        }

        .btn {
            width: 100%;
            padding: 15px;

            border: none;
            border-radius: 13px;

            background: #568568;
            color: white;

            font-weight: bold;
            cursor: pointer;

            transition: .2s;
        }

        .btn:hover {
            background: #456f55;
            transform: translateY(-2px);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;

            margin: 25px 0 20px;

            color: #9aa69c;
            font-size: 11px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #d8e4d5;
        }

        .login {
            text-align: center;
            color: #718174;
            font-size: 13px;
        }

        .login a {
            color: #477754;
            font-weight: bold;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 23px;
            color: white;
            font-size: 11px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="brand">

            <div class="logo">
                H
            </div>

            <div class="brand-name">
                HijauKita
            </div>

        </div>

        <h1>
            Buat Akun
        </h1>

        <p class="subtitle">
            Bergabung dengan HijauKita dan ikut
            menjaga kelestarian hutan Kalimantan.
        </p>

        @if ($errors->any())

            <div class="error">
                <ul style="padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        <form action="{{ route('register.process') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="name">
                    Nama
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="password">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="show"
                        onclick="togglePassword('password', this)"
                    >
                        Tampilkan
                    </button>

                </div>

            </div>

            <div class="form-group">

                <label for="password_confirmation">
                    Konfirmasi Password
                </label>

                <div class="password">

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                    >

                    <button
                        type="button"
                        class="show"
                        onclick="togglePassword('password_confirmation', this)"
                    >
                        Tampilkan
                    </button>

                </div>

            </div>

            <button type="submit" class="btn">
                Buat Akun
            </button>

        </form>

        <div class="divider">
            atau
        </div>

        <div class="login">

            Sudah memiliki akun?

            <a href="{{ route('login') }}">
                Masuk sekarang
            </a>

        </div>

    </div>

    <div class="footer">
        HijauKita &nbsp;•&nbsp;
        Pelestarian Hutan Kalimantan
    </div>

</div>

<script>

function togglePassword(id, button) {

    const input = document.getElementById(id);

    if (input.type === "password") {

        input.type = "text";
        button.innerText = "Sembunyikan";

    } else {

        input.type = "password";
        button.innerText = "Tampilkan";

    }

}

</script>

</body>
</html>
