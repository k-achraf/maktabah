<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@omega.com',
            'number' => 012345,
            'matricule' => 1,
            'date' => '14-01-1995',
            'password' => bcrypt('123456789'),
            'status' => 1,
            'role_id' => 1,
            'type_id' => 1
        ]);
    }
}
