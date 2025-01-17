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
        \DB::table('users')->insert([
            'name' => 'Admin',
            'phone' => '1234567890',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('admin'),
        ]);

    }
}
