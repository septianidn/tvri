<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'Admin',
                'address' => Str::random(10),
                'role' => 'admin',
                'phone'=> Str::random(12),
                'email' => Str::random(15).'@gmail.com',
                'password' => 'admin123',
            ]);

        for ($i=1; $i<=10; $i++){

            DB::table('users')->insert([
                'name' => 'Anggota '.$i.'',
                'address' => Str::random(10),
                'role' => 'anggota',
                'phone'=> Str::random(12),
                'email' => Str::random(15).'@gmail.com',
                'password' => 'admin123',
            ]);
        }
    }
}
