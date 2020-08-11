<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'nama' => 'Admin',
            // 'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'nama' => 'Member',
            // 'username' => 'member123',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member123')
        ]);
        DB::table('users')->insert([
            'role_id' => 3,
            'nama' => 'public',
            'email' => 'public@gmail.com',
            'password' => bcrypt('public123')
        ]);
    }
}
