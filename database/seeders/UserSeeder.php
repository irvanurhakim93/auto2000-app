<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [        'name' => 'admin',
        'email' => 'admin@mail.com',
        'password' => Hash::make('1234'),
         'created_at' => now(),
        'updated_at' => now()],
        ['name' => 'user',
        'email' => 'user@mail.com',
        'password' => Hash::make('kucing'),
         'created_at' => now(),
        'updated_at' => now(),]
        ]);
    }
}
