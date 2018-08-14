<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //add role
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administration',
                'description' => 'ini admin',
            ],
            [
                'name' => 'user',
                'display_name' => 'User Terdaftar',
                'description' => 'Access for registed user',
            ],
        ];

        foreach ($roles as $key => $value) {
                    Role::create($value);
                }

//add user
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@movie.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@movie.com',
                'password' => bcrypt('user123'),
            ],
        ];
        $n=1;
        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }
    }
}
