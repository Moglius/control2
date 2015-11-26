<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class)->create([
            'name' => 'admin',
            'password' => 'secret',
            'email' => 'admin@admin.com',
            'id_role' => '1',
        ]);

        factory(App\User::class, 49)->create();
    }
}
