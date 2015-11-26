<?php

use Illuminate\Database\Seeder;

class TagTicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Tag_Ticket::class, 60)->create();
    }
}
