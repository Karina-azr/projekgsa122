<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HijauKita - Donasi</title>

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
        linear-gradient(rgba(35, 75, 52, 0.45), rgba(20, 65, 43, 0.65)),
        url("https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=1920&q=85")
        center/cover no-repeat;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 500px;
    }

    .card {
      background: rgba(245, 250, 241, 0.95);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.55);
      border-radius: 28px;
      padding: 38px;
      box-shadow: 0 25px 60px rgba(17, 57, 37, 0.3);
    }

    .logo {
      width: 58px;
      height: 58px;
      margin: 0 auto 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 18px;
      background: #cfe8c5;
      color: #28563b;
      font-size: 27px;
      font-weight: bold;
    }

    h1 {
      text-align: center;
      color: #28563b;
      font-size: 29px;
      margin-bottom: 7px;
    }

    .subtitle {
      text-align: center;
      color: #6b806f;
      font-size: 14px;
      line-height: 1.55;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 17px;
    }

    label,
    .amount-title {
      display: block;
      color: #365b43;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 7px;
    }

    input,
    select {
      width: 100%;
      padding: 13px 15px;
      border: 1px solid #c9dcc7;
      border-radius: 14px;
      outline: none;
      background: #f8fbf5;
      color: #294b36;
      font-size: 14px;
      transition: 0.25s;
    }

    input:focus,
    select:focus {
      border-color: #83ad82;
      box-shadow: 0 0 0 4px rgba(131, 173, 130, 0.15);
    }

    .amount-options {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 9px;
      margin-bottom: 10px;
    }

    .amount-btn {
      border: 1px solid #c9dcc7;
      background: #f8fbf5;
      color: #477754;
      padding: 11px 5px;
      border-radius: 12px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      transition: 0.25s;
    }

    .amount-btn:hover,
    .amount-btn.active {
      background: #568568;
      color: white;
      border-color: #568568;
    }

    .custom-amount {
      margin-top: 8px;
    }

    .donation-info {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #e7f3e2;
      color: #4c7056;
      padding: 12px 14px;
      border-radius: 13px;
      margin: 20px 0;
      font-size: 12px;
      line-height: 1.5;
    }

    .donation-info span {
      font-size: 18px;
    }

    .btn {
      width: 100%;
      border: none;
      padding: 15px;
      border-radius: 15px;
      background: #568568;
      color: white;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      transition: 0.25s;
      box-shadow: 0 8px 20px rgba(86, 133, 104, 0.25);
    }

    .btn:hover {
      background: #456f55;
      transform: translateY(-2px);
    }

    .message {
      display: none;
      margin-top: 15px;
      padding: 12px;
      border-radius: 12px;
      text-align: center;
      font-size: 13px;
    }

    /* =========================
       PAYMENT
    ========================= */

    .payment-box {
      display: none;
      margin-top: 22px;
      padding: 24px;
      background: white;
      border: 1px solid #d5e5d1;
      border-radius: 20px;
      text-align: center;
      animation: fadeIn 0.35s ease;
    }

    .payment-box h2 {
      color: #28563b;
      font-size: 21px;
      margin-bottom: 6px;
    }

    .payment-box > p {
      color: #718174;
      font-size: 12px;
      line-height: 1.5;
      margin-bottom: 18px;
    }

    .payment-method {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 7px 13px;
      background: #e7f3e2;
      color: #386143;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .qr-wrapper {
      width: 205px;
      height: 205px;
      margin: 0 auto 17px;
      padding: 10px;
      background: white;
      border-radius: 15px;
      border: 1px solid #e0e8de;
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);
    }

    .qr-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .payment-total {
      background: #f0f7ed;
      border-radius: 13px;
      padding: 13px;
      margin-bottom: 15px;
    }

    .payment-total small {
      display: block;
      color: #7b887d;
      font-size: 11px;
      margin-bottom: 3px;
    }

    .payment-total strong {
      color: #28563b;
      font-size: 21px;
    }

    .timer {
      color: #7b887d;
      font-size: 11px;
      margin-bottom: 15px;
    }

    .confirm-btn {
      background: #28563b;
      box-shadow: none;
    }

    .confirm-btn:hover {
      background: #1f4630;
    }

    /* =========================
       VERIFICATION
    ========================= */

    .verification {
      display: none;
      margin-top: 22px;
      background: white;
      padding: 25px;
      border-radius: 20px;
      text-align: center;
      border: 1px solid #d5e5d1;
    }

    .spinner {
      width: 42px;
      height: 42px;
      margin: 0 auto 15px;
      border: 4px solid #dcebd8;
      border-top-color: #568568;
      border-radius: 50%;
      animation: spin 0.9s linear infinite;
    }

    .verification h2 {
      color: #28563b;
      font-size: 19px;
      margin-bottom: 7px;
    }

    .verification p {
      color: #718174;
      font-size: 12px;
    }

    /* =========================
       RECEIPT
    ========================= */

    .receipt {
      display: none;
      margin-top: 22px;
      background: white;
      border-radius: 18px;
      padding: 25px;
      border: 1px solid #d8e5d5;
      animation: fadeIn 0.4s ease;
    }

    .receipt-header {
      text-align: center;
      border-bottom: 1px dashed #cbdac7;
      padding-bottom: 16px;
      margin-bottom: 15px;
    }

    .receipt-logo {
      width: 45px;
      height: 45px;
      margin: 0 auto 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #e7f3e2;
      border-radius: 14px;
      color: #28563b;
      font-size: 21px;
      font-weight: bold;
    }

    .receipt-header h2 {
      color: #28563b;
      font-size: 21px;
    }

    .receipt-header p {
      color: #8a998d;
      font-size: 11px;
      margin-top: 3px;
    }

    .status {
      text-align: center;
      background: #e7f3e2;
      color: #386143;
      border-radius: 10px;
      padding: 9px;
      font-size: 12px;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .receipt-row {
      display: flex;
      justify-content: space-between;
      gap: 15px;
      padding: 7px 0;
      font-size: 13px;
    }

    .receipt-row span:first-child {
      color: #7b887d;
    }

    .receipt-row span:last-child {
      color: #294b36;
      font-weight: 600;
      text-align: right;
      max-width: 65%;
      word-break: break-word;
    }

    .receipt-total {
      border-top: 1px dashed #cbdac7;
      margin-top: 9px;
      padding-top: 14px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .receipt-total span {
      color: #365b43;
      font-weight: 700;
    }

    .receipt-total strong {
      color: #568568;
      font-size: 20px;
    }

    .receipt-note {
      text-align: center;
      color: #718174;
      font-size: 11px;
      line-height: 1.5;
      margin-top: 15px;
    }

    .print-btn {
      margin-top: 15px;
      background: #edf3eb;
      color: #386143;
      box-shadow: none;
    }

    .print-btn:hover {
      background: #dcebd8;
    }

    .back {
      text-align: center;
      margin-top: 21px;
      color: #718174;
      font-size: 14px;
    }

    .back a {
      color: #477754;
      font-weight: 700;
      text-decoration: none;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @media (max-width: 480px) {
      .card {
        padding: 30px 23px;
      }

      h1 {
        font-size: 25px;
      }

      .amount-options {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media print {
      body {
        background: white;
        padding: 0;
      }

      .card {
        box-shadow: none;
        background: white;
        max-width: 500px;
      }

      form,
      .payment-box,
      .verification,
      .back,
      .print-btn {
        display: none !important;
      }

      .receipt {
        display: block !important;
        border: none;
      }
    }
  </style>
</head>

<body>

  <div class="container">

    <div class="card">

      <!-- HEADER -->

      <div class="logo">H</div>

      <h1>Berikan Donasi</h1>

      <p class="subtitle">
        Bersama kita bisa menjaga hutan dan
        menghijaukan kembali Kalimantan.
      </p>


      <!-- FORM DONASI -->

      <form id="donationForm">

        <div class="form-group">
          <label for="name">Nama Lengkap</label>

          <input
            type="text"
            id="name"
            placeholder="Nama lengkap kamu"
            required
          >
        </div>


        <div class="form-group">
          <label for="email">Email</label>

          <input
            type="email"
            id="email"
            placeholder="nama@email.com"
            required
          >
        </div>


        <div class="form-group">

          <div class="amount-title">
            Pilih Nominal Donasi
          </div>

          <div class="amount-options">

            <button
              type="button"
              class="amount-btn"
              data-amount="25000"
            >
              Rp25.000
            </button>

            <button
              type="button"
              class="amount-btn"
              data-amount="50000"
            >
              Rp50.000
            </button>

            <button
              type="button"
              class="amount-btn"
              data-amount="100000"
            >
              Rp100.000
            </button>

            <button
              type="button"
              class="amount-btn"
              data-amount="250000"
            >
              Rp250.000
            </button>

            <button
              type="button"
              class="amount-btn"
              data-amount="500000"
            >
              Rp500.000
            </button>

            <button
              type="button"
              class="amount-btn"
              data-amount="1000000"
            >
              Rp1.000.000
            </button>

          </div>

          <input
            type="number"
            id="amount"
            class="custom-amount"
            placeholder="Atau masukkan nominal sendiri"
            min="10000"
            required
          >

        </div>


        <div class="form-group">

          <label for="payment">
            Metode Pembayaran
          </label>

          <select id="payment" required>

            <option value="">
              Pilih metode pembayaran
            </option>

            <option value="QRIS">
              QRIS
            </option>

            <option value="Transfer Bank">
              Transfer Bank
            </option>

            <option value="E-Wallet">
              E-Wallet
            </option>

          </select>

        </div>


        <div class="donation-info">

          <span>+</span>

          <p>
            Donasi digunakan untuk mendukung penghijauan,
            penanaman pohon, dan pelestarian hutan Kalimantan.
          </p>

        </div>


        <button class="btn" type="submit">
          Donasi Sekarang
        </button>


        <div class="message" id="message"></div>

      </form>


      <!-- PEMBAYARAN -->

      <div class="payment-box" id="paymentBox">

        <div class="payment-method">
          Pembayaran QRIS
        </div>

        <h2>Selesaikan Pembayaran</h2>

        <p>
          Scan kode QR berikut menggunakan aplikasi
          pembayaran yang mendukung QRIS.
        </p>


        <div class="qr-wrapper">

          <img
            id="qrImage"
            alt="Kode Pembayaran"
          >

        </div>


        <div class="payment-total">

          <small>
            Total Pembayaran
          </small>

          <strong id="paymentAmount">
            Rp0
          </strong>

        </div>


        <div class="timer">
          Selesaikan pembayaran dalam
          <strong id="countdown">15:00</strong>
        </div>


        <button
          class="btn confirm-btn"
          id="paidButton"
          type="button"
        >
          Konfirmasi Pembayaran
        </button>

      </div>


      <!-- VERIFIKASI -->

      <div class="verification" id="verification">

        <div class="spinner"></div>

        <h2>Memverifikasi Pembayaran</h2>

        <p>
          Mohon tunggu, sistem sedang memproses
          transaksi donasi kamu.
        </p>

      </div>


      <!-- STRUK -->

      <div class="receipt" id="receipt">

        <div class="receipt-header">

          <div class="receipt-logo">
            H
          </div>

          <h2>HijauKita</h2>

          <p>
            Bukti Donasi Digital
          </p>

        </div>


        <div class="status">
          Pembayaran Berhasil
        </div>


        <div class="receipt-row">
          <span>Nama</span>
          <span id="receiptName">-</span>
        </div>


        <div class="receipt-row">
          <span>Email</span>
          <span id="receiptEmail">-</span>
        </div>


        <div class="receipt-row">
          <span>Metode Pembayaran</span>
          <span id="receiptPayment">-</span>
        </div>


        <div class="receipt-row">
          <span>ID Transaksi</span>
          <span id="receiptId">-</span>
        </div>


        <div class="receipt-row">
          <span>Tanggal</span>
          <span id="receiptDate">-</span>
        </div>


        <div class="receipt-row">
          <span>Waktu</span>
          <span id="receiptTime">-</span>
        </div>


        <div class="receipt-total">

          <span>Total Donasi</span>

          <strong id="receiptAmount">
            Rp0
          </strong>

        </div>


        <p class="receipt-note">
          Terima kasih telah berkontribusi dalam upaya
          pelestarian dan penghijauan hutan Kalimantan.
          Bukti donasi ini dapat disimpan sebagai dokumentasi.
        </p>


        <button
          class="btn print-btn"
          onclick="window.print()"
        >
          Cetak / Simpan Bukti Donasi
        </button>

      </div>


      <p class="back">
        <a href="index.html">
          ← Kembali ke Beranda
        </a>
      </p>

    </div>

  </div>


  <script>

    /* =========================
       PILIH NOMINAL
    ========================= */

    const amountButtons =
      document.querySelectorAll(".amount-btn");

    const amountInput =
      document.getElementById("amount");


    amountButtons.forEach(button => {

      button.addEventListener("click", function () {

        amountButtons.forEach(btn => {
          btn.classList.remove("active");
        });

        this.classList.add("active");

        amountInput.value =
          this.dataset.amount;

      });

    });


    amountInput.addEventListener("input", function () {

      amountButtons.forEach(btn => {
        btn.classList.remove("active");
      });

    });


    /* =========================
       SUBMIT DONASI
    ========================= */

    document
      .getElementById("donationForm")
      .addEventListener("submit", function (e) {

        e.preventDefault();

        const name =
          document.getElementById("name").value.trim();

        const amount =
          Number(
            document.getElementById("amount").value
          );

        const payment =
          document.getElementById("payment").value;

        const message =
          document.getElementById("message");


        if (amount < 10000) {

          message.style.display = "block";

          message.style.background = "#f7dada";

          message.style.color = "#8a4444";

          message.textContent =
            "Minimal donasi adalah Rp10.000.";

          return;

        }


        message.style.display = "none";


        const formattedAmount =
          "Rp" + amount.toLocaleString("id-ID");


        /*
          Data yang dimasukkan ke QR
          merupakan informasi transaksi.
        */

        const transactionCode =
          "HK" +
          Date.now().toString().slice(-10);


        const qrData =
          "HIJAUKITA|" +
          transactionCode +
          "|" +
          amount;


        const qrUrl =
          "https://api.qrserver.com/v1/create-qr-code/?size=400x400&data=" +
          encodeURIComponent(qrData);


        document.getElementById("qrImage").src =
          qrUrl;


        document.getElementById("paymentAmount")
          .textContent =
          formattedAmount;


        document.getElementById("paymentBox")
          .style.display = "block";


        document.getElementById("paymentBox")
          .scrollIntoView({
            behavior: "smooth",
            block: "center"
          });


        startCountdown();

      });


    /* =========================
       COUNTDOWN
    ========================= */

    let countdownInterval;


    function startCountdown() {

      clearInterval(countdownInterval);

      let time = 15 * 60;


      const countdown =
        document.getElementById("countdown");


      function updateTimer() {

        const minutes =
          Math.floor(time / 60);

        const seconds =
          time % 60;


        countdown.textContent =
          String(minutes).padStart(2, "0") +
          ":" +
          String(seconds).padStart(2, "0");


        if (time <= 0) {

          clearInterval(countdownInterval);

          countdown.textContent =
            "00:00";

        }

        time--;

      }


      updateTimer();

      countdownInterval =
        setInterval(updateTimer, 1000);

    }


    /* =========================
       KONFIRMASI PEMBAYARAN
    ========================= */

    document
      .getElementById("paidButton")
      .addEventListener("click", function () {

        const paymentBox =
          document.getElementById("paymentBox");

        const verification =
          document.getElementById("verification");


        paymentBox.style.display = "none";

        verification.style.display = "block";


        verification.scrollIntoView({
          behavior: "smooth",
          block: "center"
        });


        /*
          Simulasi proses verifikasi.
          Setelah 2.5 detik struk ditampilkan.
        */

        setTimeout(showReceipt, 2500);

      });


    /* =========================
       TAMPILKAN STRUK
    ========================= */

    function showReceipt() {

      const name =
        document.getElementById("name").value.trim();

      const email =
        document.getElementById("email").value.trim();

      const amount =
        Number(
          document.getElementById("amount").value
        );

      const payment =
        document.getElementById("payment").value;


      const now = new Date();


      const transactionId =
        "HK-" +
        now.getFullYear() +
        String(now.getMonth() + 1).padStart(2, "0") +
        String(now.getDate()).padStart(2, "0") +
        "-" +
        Math.floor(
          100000 + Math.random() * 900000
        );


      const date =
        now.toLocaleDateString("id-ID", {
          day: "2-digit",
          month: "long",
          year: "numeric"
        });


      const time =
        now.toLocaleTimeString("id-ID", {
          hour: "2-digit",
          minute: "2-digit"
        });


      document.getElementById("receiptName")
        .textContent = name;


      document.getElementById("receiptEmail")
        .textContent = email;


      document.getElementById("receiptPayment")
        .textContent = payment;


      document.getElementById("receiptId")
        .textContent = transactionId;


      document.getElementById("receiptDate")
        .textContent = date;


      document.getElementById("receiptTime")
        .textContent = time;


      document.getElementById("receiptAmount")
        .textContent =
        "Rp" +
        amount.toLocaleString("id-ID");


      document.getElementById("verification")
        .style.display = "none";


      document.getElementById("receipt")
        .style.display = "block";


      document.getElementById("receipt")
        .scrollIntoView({
          behavior: "smooth",
          block: "center"
        });

    }

  </script>

</body>
</html>
```