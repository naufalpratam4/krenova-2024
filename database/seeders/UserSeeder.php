<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id ID');
        $existingUser = User::where('nama_lengkap')->exists();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'nama_lengkap' => $faker->name,
                'email' => 'example@gmail.com',
                'username' => $faker->userName,
                'password' => Hash::make('123456'),
                'provinsi' => $faker->state,
                'kota' => $faker->city,
                'kecamatan' => $faker->city,
                'kode_pos' => $faker->postcode,
                'no_hp' => $faker->phoneNumber,
                'gambar_profil' => $faker->imageUrl,
                'role_id' => Role::inRandomOrder()->first()->id
            ]);
        }
    }
}
