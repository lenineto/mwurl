<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCreated = false;

        while (! $userCreated) {
            $faker = Faker\Factory::create();
            $fname = $faker->firstName;
            $lname = $faker->lastName;
            $email = strtolower(substr($fname, 0, 1) . '.' . "$lname@" . $faker->safeEmailDomain);

            try {
                $userCreated = DB::table('users')->insert([
                    'name' => "$fname $lname",
                    'email' => $email,
                    'password' => Hash::make('password'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            } catch (Exception $ex) {
                continue;
            }
        }

    }
}
