<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        \App\User::create([
        	'id'=>1,
            'email' => 'teste@email',
            'password' => Hash::make('senha')
        ]);
        \App\User::create([
        	'id'=>2,
            'email' => 'teste2@email',
            'password' => Hash::make('senha')
        ]);
    }
}
