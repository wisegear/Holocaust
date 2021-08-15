<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For testing

        DB::table('users')->insert([
            'name' => 'Lee Wisener',
            'email' => 'lee@wisener.net',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

        DB::table('users')->insert([
            'name' => 'Banned',
            'email' => 'banned@wisener.net',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);

        DB::table('users')->insert([
            'name' => 'Pending',
            'email' => 'pending@wisener.net',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]); 

        DB::table('users')->insert([
            'name' => 'Member',
            'email' => 'member@wisener.net',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]); 
 
  
  }
}
