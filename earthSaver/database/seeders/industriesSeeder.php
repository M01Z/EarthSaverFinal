<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class industriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            'name' => 'Airlines',
        ]);
        DB::table('industries')->insert([
            'name' => 'Supermarket',
        ]);
        DB::table('industries')->insert([
            'name' => 'Furniture Chain',
        ]);
    }
}
