<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'nama' => 'Kelompok FAMA',
            'password' => bcrypt('12345'),
            'email' => 'kelfama@mail.com',
        ]);
    }
}
