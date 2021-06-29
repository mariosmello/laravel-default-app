<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'id' => 1,
            'name' => "SP",
            'slug' => 'sp',
        ]);
        DB::table('states')->insert([
            'id' => 2,
            'name' => "RJ",
            'slug' => 'rj',
        ]);
    }
}
