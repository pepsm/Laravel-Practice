<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'profile_image' => 'noimage.jpg'
            ],
            [
            'name' => 'seeder',
            'email' => 'seeder@gmail.com',
            'password' => Hash::make('password'),
            'profile_image' => 'noimage.jpg'
            ],
            [
                'name' => 'tester',
                'email' => 'tester@gmail.com',
                'password' => Hash::make('password'),
                'profile_image' => 'noimage.jpg'
            ]
        ]);
    }
}
