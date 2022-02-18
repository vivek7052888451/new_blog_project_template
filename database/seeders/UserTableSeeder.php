<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin=User::create([
           'userid'=>'admin101',
           'name'=>'admin',
           'role_id'=>1,
           'email'=>'admin@gmail.com',
           'password'=> bcrypt('admin'),
       ]);

       $user=User::create([
        'userid'=>'user101',
        'name'=>'user',
        'role_id'=>2,
        'email'=>'user@gmail.com',
        'password'=> bcrypt('user'),
       ]);
    }
}
