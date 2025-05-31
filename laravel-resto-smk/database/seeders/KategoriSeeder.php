<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            'Makanan',
            'Minuman',
            'Jajan'
        ];

        foreach ($kategoris as $kategori) {
            if (!\App\Models\Kategori::where('kategori', $kategori)->exists()) {
                \App\Models\Kategori::create(['kategori' => $kategori]);
            }
        }
    }
}
