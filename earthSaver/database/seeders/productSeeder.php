<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Limes Medium Loose | 1 each',
            'carbon_emission' => '0.98',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '1',
            'categoryId' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Limes Medium Loose | 1 each',
            'carbon_emission' => '0.97',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '2',
            'categoryId' => '1',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Limes Medium Loose | 1 each',
            'carbon_emission' => '0.77',
            'discount1' => '4',
            'discount2' => '4',
            'discount3' => '4',
            'vendorId' => '3',
            'categoryId' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Bananas | approx 170g',
            'carbon_emission' => '6.67',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '1',
            'categoryId' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Blueberries Prepacked | 125g',
            'carbon_emission' => '3.62',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '2',
            'categoryId' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Continental Cucumbers Loose | 1 each',
            'carbon_emission' => '0.87',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '1',
            'categoryId' => '2',
        ]);
        DB::table('products')->insert([
            'name' => 'Continental Cucumbers Loose | 1 each',
            'carbon_emission' => '0.75',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '2',
            'categoryId' => '2',
        ]);
        DB::table('products')->insert([
            'name' => 'Continental Cucumbers Loose | 1 each',
            'carbon_emission' => '0.65',
            'discount1' => '4',
            'discount2' => '4',
            'discount3' => '4',
            'vendorId' => '3',
            'categoryId' => '2',
        ]);
        DB::table('products')->insert([
            'name' => 'Baby Broccoli | 1 each',
            'carbon_emission' => '2.69',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '1',
            'categoryId' => '2',
        ]);
        DB::table('products')->insert([
            'name' => 'Brown Onions | 1kg',
            'carbon_emission' => '3.24',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '2',
            'categoryId' => '2',
        ]);
        DB::table('products')->insert([
            'name' => 'Campbells Country Ladle Soup Can Chicken & Sweet Corn | 505grams',
            'carbon_emission' => '9.39',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '1',
            'categoryId' => '3',
        ]); 
        DB::table('products')->insert([
            'name' => 'Campbells Country Ladle Soup Can Chicken & Sweet Corn | 505grams',
            'carbon_emission' => '0.18',
            'discount1' => '3',
            'discount2' => '3',
            'discount3' => '4',
            'vendorId' => '2',
            'categoryId' => '3',
        ]); 
        DB::table('products')->insert([
            'name' => 'Campbells Country Ladle Soup Can Chicken & Sweet Corn | 505grams',
            'carbon_emission' => '5.26',
            'discount1' => '4',
            'discount2' => '4',
            'discount3' => '4',
            'vendorId' => '3',
            'categoryId' => '3',
        ]); 
    }
}
