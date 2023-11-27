<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin Klasifikasi Stunting',
            'email' => 'admin@kstunting.id',
            'password' => bcrypt('secret')
        ]);
    }
}
