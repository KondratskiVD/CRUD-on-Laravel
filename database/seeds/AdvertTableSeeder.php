<?php

use Illuminate\Database\Seeder;

class AdvertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Adverts::class, 70)->create();
    }
}
