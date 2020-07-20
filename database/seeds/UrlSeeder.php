<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lastUser = DB::table('users')->latest()->first(['id','name', 'email']);
        $faker = Faker\Factory::create();


        DB::table('urls')->insert([
            'user_id' => $lastUser->id,
            'long_url' => $faker->url(),
            'url_token' => Str::slug(Str::random(9), '-'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
