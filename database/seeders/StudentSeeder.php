<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'f_name' => 'Varuna',
            'l_name' => 'Prageeth',
            'initials' => 'E.R',
            'reg_no' => 'STU-00001',
            'address' => 'Galkotuwa, Waldeniya, Kegalle',
            'dob' => '1995-05-25',
            'gender' => 'M',
            'guardian' => 'Liyanage',
            'grade_id' => 1,
        ]);
    }
}