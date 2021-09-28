<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 20; $i++) {
            $id = \DB::table('comments')->insertGetId([
                'comment' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
                'user_id' => rand(1,3),
                'post_id' => rand(1,10)
            ]);
        }
    }
}
