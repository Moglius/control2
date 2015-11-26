<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PriorityTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(TagTicketTableSeeder::class);


        Model::reguard();
    }
}
