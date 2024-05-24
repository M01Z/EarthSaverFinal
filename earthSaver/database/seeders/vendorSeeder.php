<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vendors')->insert([
            'userId' => '1',
            'address' => '800 Toorak Road Hawthorn East, VIC 3123',
            'website' => 'https://www.colesgroup.com.au/',
            'carbonStrategy' => '100% renewable electricity by end of June 2025, buy renewable electricity , installing solar power in supermarkets, supporting the community, against climate impacts.',
            'industryId' => '2',
        ]);
        DB::table('vendors')->insert([
            'userId' => '2',
            'address' => 'PO Box 8000 Baulkham Hills NSW 2153',
            'website' => 'https://www.woolworthsgroup.com.au/',
            'carbonStrategy' => '1 natural gas for refrigators, delivery trucks and fleet cars, achieving a 63% reduction in emissions by 2030, partnership with  suppliers, industry and government for cross strategies.',
            'industryId' => '2',
        ]);
        DB::table('vendors')->insert([
            'userId' => '3',
            'address' => '68 Kremzow Rd, Brendale QLD 4500',
            'website' => 'https://corporate.aldi.com.au/',
            'carbonStrategy' => '100% renewable electricity by the end of 2021 - 85% reduction in ALDI’s carbon emissions , solar panels across ALDI stores and distribution centres, They prevent over 244,000 tonnes of carbon dioxide emissions from entering the atmosphere annually.',
            'industryId' => '2',
        ]);
        DB::table('vendors')->insert([
            'userId' => '4',
            'address' => 'Level 11, 275 Grey Street, South Brisbane, Brisbane, Queensland, 4101',
            'website' => 'https://www.virginaustralia.com/',
            'carbonStrategy' => 'net zero 2050 commitment, Boeing 737-8s which will produce 15 per cent lower emissions per journey, 25 Boeing 737-10s which will reduce emissions by 17 per cent per seat trip, F100 aircraft used in our VARA business, to be replaced by more fuel efficient 737-700 aircraft',
            'industryId' => '1',
        ]);
        DB::table('vendors')->insert([
            'userId' => '5',
            'address' => '247 Adelaide St. Brisbane Queensland 4000.',
            'website' => 'https://www.qantas.com/',
            'carbonStrategy' => ' Reduce their carbon emissions by 25% by 2030,   decarbonisation and waste reduction to nature,  Working with partners, including the Great Barrier Reef Foundation, to protect our natural assets for the next generation,',
            'industryId' => '1',
        ]);
    }
}
