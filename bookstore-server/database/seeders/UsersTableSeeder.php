<?php

namespace Database\Seeders;

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
                'name' => 'Anwar',
                'email' => 'anwar@gmail.com',
                'password' => bcrypt('123456'),
                'roles' => json_encode(['CUSTOMER']),
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Budi',
                'email' => 'budi@gmail.com',
                'password' => bcrypt('123456'),
                'roles' => json_encode(['CUSTOMER']),
                'status' => 'ACTIVE',
            ]);
    }
}
