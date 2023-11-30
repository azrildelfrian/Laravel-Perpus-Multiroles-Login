<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data role yang sudah ada sebelumnya
        DB::table('admins')->truncate();
        DB::table('roles')->truncate();

        // Tambahkan data role baru
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'anggota'],
        ]);
    }
}
