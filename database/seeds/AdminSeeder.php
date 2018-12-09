<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'is_super_admin' => true,
            'is_active' => true,
            'password' => bcrypt('asus123'),
        ]);
    }
}
