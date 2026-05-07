<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
           'name'=> 'Admin',
           'description'=>'to manage the application',
        ]);

        Role::create([
           'name'=> 'User',
           'description'=>'to interact with the application',
        ]);
    }
}
