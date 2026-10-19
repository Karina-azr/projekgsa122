<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .kalkulator {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        button {
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .hasil {
            margin-top: 20px;
            padding: 15px;
            background: #eee;
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>

<body>

<div class="kalkulator">

    <h2>Kalkulator</h2>

    <form action="/latihan/hitung" method="POST">

        @csrf

        <input
            type="number"
            name="angka1"
            placeholder="Angka pertama"
            required
        >

        <select name="operator">
            <option value="+">+</option>
            <option value="-">−</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select>

        <input
            type="number"
            name="angka2"
            placeholder="Angka kedua"
            required
        >

        <button type="submit">
            Hitung
        </button>

    </form>

    @isset($hasil)

        <div class="hasil">
            {{ $angka1 }} 
            {{ $operator }} 
            {{ $angka2 }} 
            = 
            <strong>{{ $hasil }}</strong>
        </div>

    @endisset

</div>

</body>
</html>