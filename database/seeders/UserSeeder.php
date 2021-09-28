<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 10; $i++) {
            $id = \DB::table('users')->insertGetId([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => $faker->password(10),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]);
        }
    }
}
