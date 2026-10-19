<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HijauKita - Login</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;

      background:
        linear-gradient(
          rgba(25, 65, 43, 0.58),
          rgba(15, 52, 34, 0.72)
        ),
        url("https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=1920&q=85")
        center/cover no-repeat;

      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 440px;
    }

    .card {
      position: relative;

      background: rgba(247, 251, 245, 0.96);
      backdrop-filter: blur(18px);

      border: 1px solid rgba(255, 255, 255, 0.65);
      border-radius: 26px;

      padding: 42px 40px;

      box-shadow:
        0 25px 70px rgba(10, 45, 28, 0.35);

      overflow: hidden;
    }

    .card::before {
      content: "";

      position: absolute;
      top: 0;
      left: 0;
      right: 0;

      height: 4px;

      background: #568568;
    }

    .brand {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo {
      width: 62px;
      height: 62px;

      margin: 0 auto 16px;

      display: flex;
      align-items: center;
      justify-content: center;

      border-radius: 18px;

      background: #dcebd7;

      color: #28563b;

      font-size: 25px;
      font-weight: 700;

      letter-spacing: 1px;

      border: 1px solid #c9dcc7;
    }

    .brand-name {
      color: #28563b;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    h1 {
      text-align: center;

      color: #254f35;

      font-size: 28px;
      font-weight: 700;

      margin-bottom: 9px;
    }

    .subtitle {
      text-align: center;

      color: #718174;

      font-size: 13px;
      line-height: 1.65;

      margin-bottom: 30px;
    }

    .error {
      background: #f8dddd;
      color: #9a4141;

      padding: 12px;

      border-radius: 10px;

      margin-bottom: 20px;

      font-size: 13px;
    }

    .success {
      background: #dcefd7;
      color: #386143;

      padding: 12px;

      border-radius: 10px;

      margin-bottom: 20px;

      text-align: center;

      font-size: 13px;
    }

    .form-group {
      margin-bottom: 19px;
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

      padding: 14px 15px;

      border: 1px solid #c9dcc7;
      border-radius: 13px;

      outline: none;

      background: #f8fbf5;

      color: #294b36;

      font-size: 14px;

      transition: 0.25s;
    }

    input::placeholder {
      color: #a2aea4;
    }

    input:focus {
      border-color: #83ad82;

      background: #ffffff;

      box-shadow:
        0 0 0 4px rgba(131, 173, 130, 0.14);
    }

    .password-wrapper {
      position: relative;
    }

    .password-wrapper input {
      padding-right: 48px;
    }

    .toggle-password {
      position: absolute;

      right: 14px;
      top: 50%;

      transform: translateY(-50%);

      border: none;
      background: none;

      color: #718174;

      cursor: pointer;

      font-size: 12px;
      font-weight: 600;
    }

    .toggle-password:hover {
      color: #365b43;
    }

    .forgot {
      text-align: right;

      margin: -4px 0 22px;
    }

    .forgot a {
      color: #568568;

      font-size: 12px;

      text-decoration: none;
    }

    .forgot a:hover {
      text-decoration: underline;
    }

    .btn {
      width: 100%;

      border: none;

      padding: 15px;

      border-radius: 13px;

      background: #568568;

      color: white;

      font-size: 14px;
      font-weight: 700;

      cursor: pointer;

      transition: 0.25s;

      box-shadow:
        0 8px 20px rgba(86, 133, 104, 0.24);
    }

    .btn:hover {
      background: #456f55;

      transform: translateY(-2px);

      box-shadow:
        0 10px 25px rgba(70, 111, 85, 0.28);
    }

    .btn:active {
      transform: translateY(0);
    }

    .divider {
      display: flex;

      align-items: center;

      gap: 12px;

      margin: 25px 0 21px;

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

    .register {
      text-align: center;

      color: #718174;

      font-size: 13px;
    }

    .register a {
      color: #477754;

      font-weight: 700;

      text-decoration: none;
    }

    .register a:hover {
      text-decoration: underline;
    }

    .footer {
      text-align: center;

      margin-top: 23px;

      color: rgba(255, 255, 255, 0.78);

      font-size: 11px;

      line-height: 1.6;
    }

    @media (max-width: 480px) {

      body {
        padding: 15px;
      }

      .card {
        padding: 35px 25px;
        border-radius: 23px;
      }

      h1 {
        font-size: 25px;
      }

      .subtitle {
        font-size: 12px;
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
        Selamat Datang
      </h1>

      <p class="subtitle">
        Masuk ke akun HijauKita untuk mengikuti
        berbagai kegiatan pelestarian dan penghijauan
        hutan Kalimantan.
      </p>

      {{-- PESAN ERROR --}}

      @if ($errors->any())

        <div class="error">

          <ul style="padding-left: 18px;">

            @foreach ($errors->all() as $error)

              <li>{{ $error }}</li>

            @endforeach

          </ul>

        </div>

      @endif


      {{-- PESAN BERHASIL DAFTAR --}}

      @if (session('success'))

        <div class="success">
          {{ session('success') }}
        </div>

      @endif


      <!-- LOGIN FORM -->

      <form
        action="{{ route('login.process') }}"
        method="POST"
      >

        @csrf

        <div class="form-group">

          <label for="username">
            Username
          </label>

          <input
            type="text"
            id="username"
            name="name"
            value="{{ old('name') }}"
            placeholder="Masukkan username"
            required
          >

        </div>


        <div class="form-group">

          <label for="password">
            Password
          </label>

          <div class="password-wrapper">

            <input
              type="password"
              id="password"
              name="password"
              placeholder="Masukkan password"
              required
            >

            <button
              type="button"
              class="toggle-password"
              id="togglePassword"
            >
              Tampilkan
            </button>

          </div>

        </div>


        <div class="forgot">

          <a href="#">
            Lupa password?
          </a>

        </div>


        <button
          class="btn"
          type="submit"
        >
          Masuk ke Akun
        </button>

      </form>


      <!-- DIVIDER -->

      <div class="divider">
        atau
      </div>


      <!-- REGISTER -->

      <p class="register">

        Belum memiliki akun?

        <a href="{{ route('register') }}">
          Daftar sekarang
        </a>

      </p>

    </div>


    <!-- FOOTER -->

    <div class="footer">

      HijauKita &nbsp;•&nbsp;
      Pelestarian Hutan Kalimantan

    </div>

  </div>


  <script>

    const password =
      document.getElementById("password");

    const toggle =
      document.getElementById("togglePassword");


    toggle.addEventListener("click", function() {

      if (password.type === "password") {

        password.type = "text";

        toggle.textContent = "Sembunyikan";

      } else {

        password.type = "password";

        toggle.textContent = "Tampilkan";

      }

    });

  </script>

</body>
</html>