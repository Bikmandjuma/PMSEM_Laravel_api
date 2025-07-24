<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'john',
            'lastname' => 'Doe',
            'email' => 'user@gmail.com',
            'image' => 'default.png',
            'gender' => 'male',
            'phone' => '0781234567',
            'birthdate' => '1998-01-01',
            'bike_model' => 'Honda',
            'plate_number' => 'RAB123C',
            'password' => bcrypt('secret123'),
        ]);
    }
}
