<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        $faker = \Faker\Factory::create();
        $password = Hash::make('secret');

        // -- Create an administrator with predictable password
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@somewhere.com',
            'password' => $password
        ]);

        // -- Generate 100 users
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }

    }
}
