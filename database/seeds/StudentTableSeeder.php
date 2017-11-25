<?php

use Illuminate\Database\Seeder;
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
        $faker = Faker::create();

        $dataClass = DB::table('class')->pluck('id')->toArray();

        foreach(range(1, 50) as $index) {
            DB::table('students')->insert([
                'class_id' => $faker->randomElement($dataClass),
                'name' => $faker->name,
                'address' => $faker->address,
                'age' => rand(20, 50),
                'email' => $faker->freeEmail
            ]);
        }
    }
}
