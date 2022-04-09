<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // populated 10 records in Users table
        // \App\Models\User::factory(10)->create();
        // populated data in students table
        // $this->call([StudentTableSeeder::class]);

        //populate data in movies table
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->text(40),
                'description' => $faker->text(300),
            ]);
        }
    }
}
