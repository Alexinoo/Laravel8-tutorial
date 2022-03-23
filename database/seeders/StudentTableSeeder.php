<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'regNo' => 'BIT-001-4164/2010',
            'name' => 'ALEX MWANGI WAKANYI',
            'course' => 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY'
        ]);
    }
}
