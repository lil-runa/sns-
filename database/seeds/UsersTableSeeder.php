<?php

use Illuminate\Database\Seeder;

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
            'username' => 'denzel',
            'mail' => 'denzel@hoge.com',
            'password' => 'hoge',
       ]);
    }
}
