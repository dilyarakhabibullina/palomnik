<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run(): void
    {
        DB::table('admins')->insert([

            // Admin
            [
                'id' => '1',
                'name' => 'Admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('111'),
                'photo' => 'admin.jpg',
                'token' => ' ',
            ],

        ]);
    }
}

