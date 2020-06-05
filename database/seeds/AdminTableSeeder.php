<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@123'),
            'mobile'=>'1234567890',
            'image'=>'https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg'
        ]);
    }
}
