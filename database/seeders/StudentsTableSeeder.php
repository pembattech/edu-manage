<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 150; $i++) {
            DB::table('students')->insert([
                'fullname' => $faker->name,
                'dob' => $faker->date('Y-m-d', '2005-12-31'), // Date of birth before 2005
                'gender' => $faker->randomElement(['M', 'F', 'O']), // M for Male, F for Female, O for Other
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'present_qualification' => $faker->randomElement(['High School', 'Bachelor\'s Degree', 'Master\'s Degree']),
                'father_name' => $faker->name('male'),
                'mother_name' => $faker->name('female'),
                'profession' => $faker->jobTitle,
                'parents_phone_number' => $faker->phoneNumber,
                'enrollment_date' => $faker->date('Y-m-d', '2023-12-31'),
            ]);
        }
    }
}
