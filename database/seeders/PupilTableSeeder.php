<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PupilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50)  as $index) {

            DB::table('pupils')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'salary' => $faker->numberBetween(20000, 50000),
                'department' =>  $faker->randomElement(array('Accounts', 'Marketing', 'Sales', 'Quality'))
            ]);
        }
    }
}
