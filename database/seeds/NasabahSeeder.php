<?php

// use Hash;
use App\Nasabah;
use App\Balance;
use App\Cicilan;
use Illuminate\Database\Seeder;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nasabah = Nasabah::create([
            "rekening" => "8975836485",
            "fullname" => "fahriansyah",
            "email" => "fachryansyah123@gmail.com",
            "address" => "Depok",
            "registration" => "2017-04-25",
            "password" => \Hash::make("asus123"),
            "is_active" => 1
        ]);

        Balance::create([
            "nasabah_id" => $nasabah->id,
            "amount" => 20000000,
            "date" => "2019-04-25"
        ]);

        Cicilan::create([
            "nasabah_id" => $nasabah->id,
            "cicilan" => 2,
            "date" => "2019-04-25"
        ]);
    }
}
