<?php

use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('company_profiles')->insert([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'is_super_admin' => true,
            'is_active' => true,
            'password' => bcrypt('asus123'),
        ]);
    }
}
