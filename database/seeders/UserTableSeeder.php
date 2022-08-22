<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'PIETER',
            'toegewezen' => 'NEE',
            'bril_id' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'HENK',
            'toegewezen' => 'NEE',
            'bril_id' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'FREEK',
            'toegewezen' => 'NEE',
            'bril_id' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'GERARD',
            'toegewezen' => 'JA',
            'bril_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'JASON',
            'toegewezen' => 'NEE',
            'bril_id' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'MARK',
            'toegewezen' => 'JA',
            'bril_id' => 2
        ]);
    }
}
