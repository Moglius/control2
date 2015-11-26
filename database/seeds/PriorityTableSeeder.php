<?php

use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\Priority::create([
           'name' => 'baja',
        ]);

        App\Priority::create([
           'name' => 'media',
        ]);

         App\Priority::create([
           'name' => 'alta',
        ]);

    }
}
