<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nip' => '1234',
                'name' => 'DONI',
                'jabatan' => 'direktur',
                'email' => 'doni@example.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
               
            ],
            [
                'nip' => '1235',
                'name' => 'DONO',
                'jabatan' => 'finance',
                'email' => 'dono@example.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
               
            ],
            [
                'nip' => '1236',
                'name' => 'DONA',
                'jabatan' => 'staff',
                'email' => 'dona@example.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
               
            ],
        ]);
        
    }
}
