<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 日本語化
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 100; $i++) {
            App\Student::create([
            'name' => $faker->name,         // 名前
            'email' => $faker->email,       // mail
            'tel' => $faker->phoneNumber,   // tel
            ]);
        }
    }
}
