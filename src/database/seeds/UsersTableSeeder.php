<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '二輪太郎',
            'email' => 'bike@examle.com',
            'bike' => 'CB400SF',
            'password' => 'testuser',
        ]);
    }
}
