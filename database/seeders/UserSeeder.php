<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role_ventas = Role::where('name', 'ventas')->first()->id;
        $role_admin = Role::where('name', 'admin')->first()->id;                   

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('12345678');
        $user->role_id = $role_ventas;
        $user->save();
        
        $user = new User();
        $user->name = 'Jose Gosne';
        $user->email = 'gosnejose7@gmail.com';
        $user->password = bcrypt('12345678');
        $user->role_id = $role_admin;
        $user->save();
     }
}
