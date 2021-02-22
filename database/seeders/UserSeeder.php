<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SAdmin = User::create([
            'name' => 'Super Admin',
            'username' => 'SAdmin',
            'email' => 'sadmin@system.com',
            'password' => bcrypt('rahasia'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'roles_id' => 1,
        ]);

        $SAdmin->assignRole('Supermin');
        $SAdmin->givePermissionTo('Supermin');
    }
}
