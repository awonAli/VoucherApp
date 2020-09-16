<?php

use Illuminate\Database\Seeder;

class vouchersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('vouchers')->insert([
                'code' => Str::random(10),
                'exp_date' => date('Y-m-d'),
                'recipient_id' => 1,
                'offer_id' => 1
            ]);
        }
    
    }
}
