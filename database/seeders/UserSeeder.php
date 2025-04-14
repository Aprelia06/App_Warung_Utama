<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
                User::insert([
                    [
                        'name' => 'Admin User',
                        'email' => 'admin@example.com',
                        'password' => Hash::make('password'),
                        'role' => 'admin',
                    ],
                    [
                        'name' => 'Toko User',
                        'email' => 'toko@example.com',
                        'password' => Hash::make('password'),
                        'role' => 'toko',
                    ],
                    [
                        'name' => 'Pelanggan User',
                        'email' => 'pelanggan@example.com',
                        'password' => Hash::make('password'),
                        'role' => 'pelanggan',
                    ],
                ]);
            }
        }
        

