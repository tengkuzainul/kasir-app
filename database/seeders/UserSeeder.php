<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role
        $kepToko = Role::create([
            'name' => 'kepalaToko'
        ]);

        $adminToko = Role::create([
            'name' => 'admin'
        ]);

        $kasirToko = Role::create([
            'name' => 'kasir'
        ]);

        // account
        $kepalaToko = User::create([
            'name' => 'Kepala Toko',
            'email' => 'kepalatoko@gmail.com',
            'password' => bcrypt('kepalatoko123'),
        ]);
        $kepalaToko->assignRole($kepToko);

        $admin = User::create([
            'name' => 'Admin Toko',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole($adminToko);

        $kasir = User::create([
            'name' => 'Kasir Toko',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('kasir123'),
        ]);
        $kasir->assignRole($kasirToko);
    }
}
