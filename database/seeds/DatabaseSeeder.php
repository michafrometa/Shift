<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('vendor:publish --provider="MartinLindhe\VueInternationalizationGenerator\GeneratorProvider"');
        Artisan::call('vue-i18n:generate');

        $this->call(GenderTableSeeder::class);

        factory(\App\Models\Agreement::class, 25)->create();
        factory(\App\Models\Specialty::class, 25)->create();
        factory(\App\Models\Doctor::class, 25)->create();
        factory(\App\Models\City::class, 25)->create();
        factory(\App\Models\Neighborhood::class, 25)->create();
        factory(\App\Models\Patient::class, 25)->create();
        factory(\App\Models\PostCollection::class, 25)->create();

    }
}
