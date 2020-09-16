<?php

use Illuminate\Database\Seeder;

class offerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            'name' => 'offer'.Str::random(10),
            'exp_date' => date('Y-m-d'),
            'fixed_percentage' => 10        ]);
    }
}
