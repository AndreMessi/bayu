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
            [
                'role'=>'admin',
                'username'=>'admin',
                'email'=>'admin@email.com',
                'password'=>Hash::make('password'),
                'nama'=>'Administrator',
                'jk'=>'P'
            ],[
                'role'=>'pengguna',
                'username'=>'pengguna1',
                'email'=>'pengguna1@email.com',
                'password'=>Hash::make('password'),
                'nama'=>'Pengguna 1',
                'jk'=>'P'
            ],[
                'role'=>'pengguna',
                'username'=>'pengguna2',
                'email'=>'pengguna2@email.com',
                'password'=>Hash::make('password'),
                'nama'=>'Pengguna 2',
                'jk'=>'L'
            ],
        ]);
    }
}
