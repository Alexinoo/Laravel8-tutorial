<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //INSERT MULTIPLE RECORDS

        $faker = Faker::create();

        foreach (range(1, 20)  as $index) {

            DB::table('students')->insert([
                'regNo' => Str::of($faker->word(3))->upper(),
                'name' => $faker->name,
                'course' =>  Str::of($faker->sentence(1))->slug('-')
            ]);
        }

        //INSERT SINGLE RECORD

        // DB::table('students')->insert([
        //     'regNo' => 'BIT-001-4164/2010',
        //     'name' => 'ALEX MWANGI WAKANYI',
        //     'course' => 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY'
        // ]);

    }
}
