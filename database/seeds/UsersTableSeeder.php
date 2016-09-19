<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class, 5)->create();

        factory(User::class)->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => 'password',
            'phone' => '0123456789',
            'avatar' => 'default.jpg',
            'address' => 'BKDN',
            'role' => 1,
        ]);
    }
}
