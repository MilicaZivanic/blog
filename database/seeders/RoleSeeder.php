<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $titles = ['admin', 'author', 'user'];

    public function run()
    {
        for($i = 0; $i < count($this->titles); $i++) {
            \DB::table('roles')->insert([
                'title' => $this->titles[$i],
            ]);
        }
    }
}
