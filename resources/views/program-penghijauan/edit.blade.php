```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Program - HijauKita</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            margin: 0;
            background: #f4f8f1;
            color: #294b36;
        }

        .main {
            max-width: 900px;
            margin: auto;
            padding: 35px 25px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            color: #254f35;
            margin-bottom: 5px;
        }

        .header p {
            color: #718174;
            font-size: 13px;
        }

        .card {
            background: white;
            border: 1px solid #dfe9dc;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(40, 86, 59, 0.07);
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #365b43;
            font-size: 12px;
            font-weight: 600;
        }

        input,
        textarea,
        select {
            width: 100%;
            border: 1px solid #d7e4d3;
            border-radius: 11px;
            padding: 12px 13px;
            outline: none;
            color: #294b36;
            background: #fbfdf9;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #568568;
            box-shadow: 0 0 0 3px rgba(86, 133, 104, 0.1);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px;
        }

        .error {
            color: #b44b4b;
            font-size: 11px;
            margin-top: 5px;
        }

        .success {
            background: #e8f5e9;
            color: #2e6b3e;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 10px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-primary {
            background: #568568;
            color: white;
        }

        .btn-primary:hover {
            background: #467257;
        }

        .btn-secondary {
            background: #edf3ea;
            color: #365b43;
        }

        .btn-secondary:hover {
            background: #dfeadd;
        }

        @media (max-width: 600px) {
            .row {
                grid-template-columns: 1fr;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="main">

    <div class="header">
        <h1>🌳 Edit Program Penghijauan</h1>

        <p>
            Perbarui informasi program penghijauan.
        </p>
    </div>

    <div class="card">

        {{-- Pesan berhasil --}}
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error validasi --}}
        @if($errors->any())
            <div class="error" style="margin-bottom: 20px;">
                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('program-penghijauan.update', $programPenghijauan->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            {{-- Nama Program --}}
            <div class="form-group">

                <label for="nama_program">
                    Nama Program
                </label>

                <input
                    type="text"
                    id="nama_program"
                    name="nama_program"
                    value="{{ old('nama_program', $programPenghijauan->nama_program) }}"
                    required
                >

                @error('nama_program')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Lokasi --}}
            <div class="form-group">

                <label for="lokasi">
                    Lokasi
                </label>

                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    value="{{ old('lokasi', $programPenghijauan->lokasi) }}"
                    required
                >

                @error('lokasi')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Deskripsi --}}
            <div class="form-group">

                <label for="deskripsi">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                >{{ old('deskripsi', $programPenghijauan->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Tanggal --}}
            <div class="row">

                <div class="form-group">

                    <label for="tanggal_mulai">
                        Tanggal Mulai
                    </label>

                    <input
                        type="date"
                        id="tanggal_mulai"
                        name="tanggal_mulai"
                        value="{{ old(
                            'tanggal_mulai',
                            $programPenghijauan->tanggal_mulai
                                ? \Carbon\Carbon::parse($programPenghijauan->tanggal_mulai)->format('Y-m-d')
                                : ''
                        ) }}"
                        required
                    >

                    @error('tanggal_mulai')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="tanggal_selesai">
                        Tanggal Selesai
                    </label>

                    <input
                        type="date"
                        id="tanggal_selesai"
                        name="tanggal_selesai"
                        value="{{ old(
                            'tanggal_selesai',
                            $programPenghijauan->tanggal_selesai
                                ? \Carbon\Carbon::parse($programPenghijauan->tanggal_selesai)->format('Y-m-d')
                                : ''
                        ) }}"
                    >

                    @error('tanggal_selesai')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Target & Status --}}
            <div class="row">

                <div class="form-group">

                    <label for="target_pohon">
                        Target Pohon
                    </label>

                    <input
                        type="number"
                        id="target_pohon"
                        name="target_pohon"
                        min="1"
                        value="{{ old('target_pohon', $programPenghijauan->target_pohon) }}"
                        required
                    >

                    @error('target_pohon')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                    >

                        <option
                            value="Akan Datang"
                            {{ old('status', $programPenghijauan->status) == 'Akan Datang' ? 'selected' : '' }}
                        >
                            Akan Datang
                        </option>

                        <option
                            value="Berlangsung"
                            {{ old('status', $programPenghijauan->status) == 'Berlangsung' ? 'selected' : '' }}
                        >
                            Berlangsung
                        </option>

                        <option
                            value="Selesai"
                            {{ old('status', $programPenghijauan->status) == 'Selesai' ? 'selected' : '' }}
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

            </div>


            {{-- Tombol --}}
            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Perubahan
                </button>

                <a
                    href="{{ route('program-penghijauan.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
```
