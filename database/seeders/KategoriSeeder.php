<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Ikan Tawar',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In quam quasi praesentium eius. Rem minus alias quia perspiciatis deserunt, ullam vel quae, rerum totam ea labore ut earum molestias laborum.'
            ],
            [
                'nama_kategori' => 'Ikan Laut',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In quam quasi praesentium eius. Rem minus alias quia perspiciatis deserunt, ullam vel quae, rerum totam ea labore ut earum molestias laborum.'
            ],
            [
                'nama_kategori' => 'Ikan Tambak',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In quam quasi praesentium eius. Rem minus alias quia perspiciatis deserunt, ullam vel quae, rerum totam ea labore ut earum molestias laborum.'
            ]
        ]);
    }
}
