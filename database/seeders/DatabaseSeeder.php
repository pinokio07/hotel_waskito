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
        \App\Models\User::factory(1)->create();
        \App\Models\Sekolah::create([
          'nama' => 'SMKN 1 Pandeglang',
          'nama_hotel' => 'Edotel Pesona',
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
