<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Status::create([
           'name' => 'Abierto',
        ]);

        App\Status::create([
           'name' => 'Cerrado',
        ]);

    }
}
