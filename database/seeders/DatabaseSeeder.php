<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Users::create([
            "name" => "muhammad Irfan.Ar",
            "username" => "irfan1991",
            "password" => bcrypt("1234567890"),
            "level" => "admin"
        ]);

        Users::create([
            "name" => "Adam Syafieq",
            "username" => "adam2019",
            "password" => bcrypt("1234567890"),
            "level" => "admin"
        ]);
    }
}
