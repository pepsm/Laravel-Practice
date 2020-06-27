<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'job_title' => 'Administrator',
            'password' => Hash::make('password')
            ]
        ]);
    }
}
