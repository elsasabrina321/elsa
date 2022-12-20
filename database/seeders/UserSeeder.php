<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
               'name'=>'Admin',
               'email'=>'admin@google.com',
                'role'=>'admin',
               'password'=> bcrypt('123123'),
            ],
            [
                'username' => 'alumni',
               'name'=>'Alumni',
               'email'=>'alumni@google.com',
                'role'=>'alumni',
               'password'=> bcrypt('123123'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
