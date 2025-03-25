<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'firstname' => 'admin_f_name',
            'lastname' =>'admin_l_name',
            'gender' => 'male',
            'phone' => '0780000000',
            'email' => 'admin@gmail.com',
            'image' => 'user.png',
            'dob' => '2000-12-20',
            'password' => bcrypt('bugarama123@'),
        ]);
    }
}
