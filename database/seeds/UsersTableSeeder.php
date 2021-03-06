<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Uruappan App',
            'email' => 'uruappan.app@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Uruappan_0920'),
            'role'=>\App\User::ADMIN,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //factory(App\User::class,20)->create();
    }
}
