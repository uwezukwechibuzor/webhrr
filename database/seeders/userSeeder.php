<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=> 'chibuzor',
            'email'=> 'chibuzor1@gmail.com',
            'role'=> 'superadmin',
            'password'=>Hash::make('12345678')
        ],
        [
            'name'=> 'daniel',
            'email'=> 'chibuzor@gmail.com',
            'role'=> 'admin',
            'password'=>Hash::make('12345678')
        ],
        
           [
            'name'=> 'daniel',
            'email'=> 'daniel@gmail.com',
            'role'=> 'staff',
            'password'=>Hash::make('12345678')
           ]);
    }
}
