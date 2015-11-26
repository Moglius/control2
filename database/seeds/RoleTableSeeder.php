<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('role')->truncate();

        //
        App\Role::create([
           'name' => 'admin',
        ]);

        App\Role::create([
           'name' => 'user',
        ]);

    }
}
