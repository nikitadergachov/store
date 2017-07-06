<?php

use Illuminate\Database\Seeder;

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
            'username'    => 'nikita',
            'email'       => 'nikitadergachov@gmail.com',
            'password'    => Hash::make('monster8811'),
            'verified'    => 1,
            'admin'       => 1,
        ]);


    }
}
