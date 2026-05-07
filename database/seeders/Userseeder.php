<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name'=> 'Ted',
        'email'=> 'ted@example.com', 
        'password'=> bcrypt('123456789'),
        'phone'=>'0765443212',
        'role_id'=> 1,
      ]);
       
      User::create([
        'name'=> 'Joel',
        'email'=> 'joel@example.com', 
        'password'=> bcrypt('123456789'),
        'phone'=> '0119965825',
        'role_id'=> 1,
      ]);

      User::create([
        'name'=> 'Jane',
        'email'=> 'jane@example.com', 
        'password'=> bcrypt('123456789'),
        'phone'=>'0722453212',
        'role_id'=> 2,
      ]);

      User::create([
        'name'=> 'Ashley',
        'email'=> 'ash@example.com', 
        'password'=> bcrypt('123456789'),
        'phone'=>'0722345678',
        'role_id'=> 2,
      ]);
    }

    
}
