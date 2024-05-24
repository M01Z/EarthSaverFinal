<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class flightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert([
            'departure' => 'Brisbane',
            'destination' => 'Seoul',
            'carbon_emission' => '1529.52',
            'discount1' => '5',
            'discount2' => '7',
            'discount3' => '9',
            'vendorId' => '4',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Brisbane',
            'destination' => 'Seoul',
            'carbon_emission' => '1213.39',
            'discount1' => '6',
            'discount2' => '7',
            'discount3' => '8',
            'vendorId' => '5',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Seoul',
            'destination' => 'Brisbane',
            'carbon_emission' => '1836.71',
            'discount1' => '5',
            'discount2' => '7',
            'discount3' => '9',
            'vendorId' => '4',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Seoul',
            'destination' => 'Brisbane',
            'carbon_emission' => '1825.12',
            'discount1' => '6',
            'discount2' => '7',
            'discount3' => '8',
            'vendorId' => '5',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Brisbane',
            'destination' => 'Melbourne',
            'carbon_emission' => '276.01',
            'discount1' => '5',
            'discount2' => '7',
            'discount3' => '9',
            'vendorId' => '4',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Brisbane',
            'destination' => 'Melbourne',
            'carbon_emission' => '215.70',
            'discount1' => '6',
            'discount2' => '7',
            'discount3' => '8',
            'vendorId' => '5',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Melbourne',
            'destination' => 'Brisbane',
            'carbon_emission' => '253.98',
            'discount1' => '5',
            'discount2' => '7',
            'discount3' => '9',
            'vendorId' => '4',
        ]);
        DB::table('flights')->insert([
            'departure' => 'Melbourne',
            'destination' => 'Brisbane',
            'carbon_emission' => '251.66',
            'discount1' => '6',
            'discount2' => '7',
            'discount3' => '8',
            'vendorId' => '5',
        ]);
    }
}
