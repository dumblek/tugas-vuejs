<?php

use Illuminate\Database\Seeder;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measurements')->insert([
            'measurement' => 'Pcs'
        ]);
        DB::table('measurements')->insert([
            'measurement' => 'Roll'
        ]);
        DB::table('measurements')->insert([
            'measurement' => 'Box'
        ]);
        DB::table('measurements')->insert([
            'measurement' => 'Kilogram'
        ]);
        DB::table('measurements')->insert([
            'measurement' => 'Meter'
        ]);
    }
}
