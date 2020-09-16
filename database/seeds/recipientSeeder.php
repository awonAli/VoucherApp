<?php

use Illuminate\Database\Seeder;

class recipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipients')->insert([
            'email' => Str::random(10).'@gmail.com',
      ]);
    }
}
