<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'kasra',
            'email'=>'keshvardoost@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
    }
}
