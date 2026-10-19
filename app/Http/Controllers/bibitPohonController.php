<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BibitPohonController extends Controller
{
    /**
     * Daftar bibit pohon.
     */
    private function daftarBibit()
    {
        return [
            [
                'id' => 1,
                'nama' => 'Bibit Sengon',
                'jenis' => 'Sengon',
                'harga' => 15000,
                'gambar' => 'images/bibit/bibit-sengon.jpg',
                'deskripsi' => 'Bibit sengon yang cocok untuk program reboisasi dan penghijauan.',
            ],
            [
                'id' => 2,
                'nama' => 'Bibit Trembesi',
                'jenis' => 'Trembesi',
                'harga' => 20000,
                'gambar' => 'images/bibit/bibit-trembesi.jpg',
                'deskripsi' => 'Bibit trembesi yang memiliki tajuk luas dan cocok untuk penghijauan.',
            ],
            [
                'id' => 3,
                'nama' => 'Bibit Meranti',
                'jenis' => 'Meranti',
                'harga' => 25000,
                'gambar' => 'images/bibit/bibit-meranti.jpg',
                'deskripsi' => 'Bibit meranti untuk membantu menjaga kelestarian hutan Kalimantan.',
            ],
            [
                'id' => 4,
                'nama' => 'Bibit Mahoni',
                'jenis' => 'Mahoni',
                'harga' => 18000,
                'gambar' => 'images/bibit/bibit-mahoni.jpg',
                'deskripsi' => 'Bibit mahoni yang cocok digunakan dalam kegiatan penghijauan.',
            ],
        ];
    }

    /**
     * Menampilkan marketplace bibit.
     */
    public function index()
    {
        $bibit = $this->daftarBibit();

        return view('bibit.index', compact('bibit'));
    }

    /**
     * Menampilkan detail bibit.
     */
    public function show($id)
    {
        $bibit = collect($this->daftarBibit())
            ->firstWhere('id', (int) $id);

        if (!$bibit) {
            abort(404);
        }

        return view('bibit.show', compact('bibit'));
    }
}