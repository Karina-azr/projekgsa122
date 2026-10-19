<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BibitSeeder extends Seeder
{
    /**
     * Seed data bibit pohon.
     */
    public function run(): void
    {
        DB::table('bibits')->insert([

            [
                'nama' => 'Bibit Sengon',

                'deskripsi' =>
                    'Bibit sengon yang cocok untuk reboisasi dan pertumbuhan cepat.',

                'harga' => 15000,

                'stok' => 100,

                'gambar' => 'images/bibit/bibit-sengon.jpg',

                'aktif' => true,

                'created_at' => now(),

                'updated_at' => now(),
            ],

            [
                'nama' => 'Bibit Trembesi',

                'deskripsi' =>
                    'Pohon trembesi dengan tajuk lebar yang baik untuk penghijauan.',

                'harga' => 20000,

                'stok' => 100,

                'gambar' => 'images/bibit/bibit-trembesi.jpg',

                'aktif' => true,

                'created_at' => now(),

                'updated_at' => now(),
            ],

            [
                'nama' => 'Bibit Meranti',

                'deskripsi' =>
                    'Bibit meranti yang sesuai untuk pemulihan kawasan hutan.',

                'harga' => 25000,

                'stok' => 100,

                'gambar' => 'images/bibit/bibit-meranti.jpg',

                'aktif' => true,

                'created_at' => now(),

                'updated_at' => now(),
            ],

            [
                'nama' => 'Bibit Mahoni',

                'deskripsi' =>
                    'Bibit mahoni untuk penghijauan dan pemulihan lingkungan.',

                'harga' => 18000,

                'stok' => 100,

                'gambar' => 'images/bibit/bibit-mahoni.jpg',

                'aktif' => true,

                'created_at' => now(),

                'updated_at' => now(),
            ],

        ]);
    }
}
