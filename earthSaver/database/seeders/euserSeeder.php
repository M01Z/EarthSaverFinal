<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class euserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eusers')->insert([
            'name' => 'Coles',
            'approval_status' => '1',
            'user_type' => 'Vendor',
            'email' => 'admin@coles.com',
            'password' => 'abc123',
        ]);
        DB::table('eusers')->insert([
            'name' => 'Woolworths',
            'approval_status' => '1',
            'user_type' => 'Vendor',
            'email' => 'admin@woolworths.com',
            'password' => 'abc123',
        ]);
        DB::table('eusers')->insert([
            'name' => 'Aldi',
            'approval_status' => '1',
            'user_type' => 'Vendor',
            'email' => 'admin@aldi.com',
            'password' => 'abc123',
        ]);
        DB::table('eusers')->insert([
            'name' => 'Virgin',
            'approval_status' => '1',
            'user_type' => 'Vendor',
            'email' => 'admin@virgin.com',
            'password' => 'abc123',
        ]);
        DB::table('eusers')->insert([
            'name' => 'Qantas',
            'approval_status' => '1',
            'user_type' => 'Vendor',
            'email' => 'admin@qantas.com',
            'password' => 'abc123',
        ]);
    }
}
