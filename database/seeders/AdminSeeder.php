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
         $admin = [
        'name' => 'admin',
        'email' => 'mhakash5000@gmail.com',
        'password' => bcrypt('3800580ak')
    ];
        Admin::create($admin);
    }
}
