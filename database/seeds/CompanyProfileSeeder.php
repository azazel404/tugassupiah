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
            'content' => "<h1>Edit Tentang perusahaan kamu disini</h1>",
        ]);
    }
}
