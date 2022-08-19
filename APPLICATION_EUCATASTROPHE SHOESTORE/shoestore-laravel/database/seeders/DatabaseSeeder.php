<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sepatu;
use App\Models\Ukuran;
use App\Models\Kategori;
use App\Models\KategoriSepatu;
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

        User::create([
            'name' => 'Naily Khairiya',
            'email' => 'nailylhairiya@gmail.com',
            'username' => 'nailykhry',
            'email_verified_at' => now(),
            'number' =>  ('083821082460'),
            'password' => '$2y$10$DsnQ/ieRW2HBlS0T6y1fHemmXrxpyPbibm00YS3IqUtm2BjV0fwE6',
            'remember_token' => 'leenoece',
            'is_admin' => '1',
        ]);
    
        Kategori::create([
            'k_kategori' => 'sneakers',
        ]);
        Kategori::create([
            'k_kategori' => 'heels',
        ]);
        Kategori::create([
            'k_kategori' => 'flat shoes',
        ]);
        Kategori::create([
            'k_kategori' => 'boots',
        ]);
        

        User::factory(10)->create();
        Sepatu::factory(20)->create();
        Ukuran::factory(100)->create();

        KategoriSepatu::factory(30)->create();
    }
}
