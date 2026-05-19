<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //      DB::table('roles')->insert([
    //     [
    //         'name' => 'admin',
    //         'guard_name' => 'web',
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ],
    //     [
    //         'name' => 'client',
    //         'guard_name' => 'web',
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]
    // ]);

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'client']);

    }
}
