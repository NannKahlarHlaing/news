<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make("admin123!@#");
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('admins')->insert([
            'name' => "Admin",
            'email' => "admin@vwxyz.online",
            'role' => 1,
            'password' => $password,
            'remember_token' => Str::random(60),
            'created_at' => now(),
        ]);
    }
}
