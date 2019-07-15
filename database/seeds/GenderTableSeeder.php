<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift_ngenders')->insert([
            'id' => 1,
            'value' => 'M',
        ]);
        DB::table('shift_ngenders')->insert([
            'id' => 2,
            'value' => 'F',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('shift_ngenders');
    }
}
