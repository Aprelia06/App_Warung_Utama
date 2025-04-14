<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            /**
             * Run the database seeds.
             *
             * @return void
             */
                            DB::table('users')->insert([
                    [
                        'name' => 'admin',
                        'email' => 'admin@example.com',
                        'password' => Hash::make('password'),
                        'role' => 'admin',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'pelanggan',
                        'email' => 'pelanggan@example.com',
                        'password' => Hash::make('password'),
                        'role' => 'pelanggan',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'toko',
                        'email' => 'toko@example.com',
                        'password' => Hash::make('password'),
                        'role' => 'toko',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }
        }
            

