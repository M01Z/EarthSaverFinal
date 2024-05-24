<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_categories')->insert([
            'name' => 'Fruits',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Deli',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Dairy',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Meat',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Vegetables',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Beverages',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Car Parts',
        ]);
    }
}
