<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'name' => 'Pier',
                'role' => 1,//admin
                'email' => 'p.rojas@electo.pe',
                'email_verified_at' => Carbon\Carbon::now(),
                'password' => Hash::make('admin'),
            ],
        ]);
    }
}
