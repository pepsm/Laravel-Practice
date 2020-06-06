<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Post 01',
                'body' =>  'This is the body of my post'
            ],
            [
                'title' => 'Post 02',
                'body' =>  'This is the body of my post'
            ],
            [
                'title' => 'Post 03',
                'body' =>  'This is the body of my post'
            ]
        ]);
    }
}
