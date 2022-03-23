<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        foreach (range(1, 100)  as $index) {

            DB::table('students')->insert([
                'regNo' => $faker->sentence(17),
                'name' => $faker->sentence(15),
                'course' => $faker->paragraph(1)
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
