<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::firstOrCreate([
          'nama' => 'Administrator',
          'nis' => 'admin',
          'jenis_kelamin' => 'L',
          'kelas' => 'GURU',
          'password' => '$2y$10$tQIrzTYMREkC4kaLkg9eL.BPB4C3I0DZt565pw10ffiIWxq6ePSgi',
          'role' => 'admin',
        ]);
        \App\Models\Sekolah::firstOrCreate([
          'nama' => 'SMK Waskito',
          'nama_hotel' => 'Hotel Waskito',
        ]);
        \App\Models\RoomType::firstOrCreate([
          'nama' => 'Superior'
        ]);
        \App\Models\RoomType::firstOrCreate([
          'nama' => 'Deluxe'
        ]);
        \App\Models\RoomType::firstOrCreate([
          'nama' => 'Studio'
        ]);
        \App\Models\RoomType::firstOrCreate([
          'nama' => 'Suite'
        ]);
        \App\Models\RoomType::firstOrCreate([
          'nama' => 'President Suite'
        ]);
        \App\Models\RoomType::firstOrCreate([
          'nama' => 'Penthouse'
        ]);
    }
}
