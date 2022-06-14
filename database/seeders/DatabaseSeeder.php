<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name'  => 'admin panel',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('10001000'),
            'email_verified_at' => '2021-12-14 16:16:38',
        ]);

        // $this->call(categorySeeder::class);
    }
}
