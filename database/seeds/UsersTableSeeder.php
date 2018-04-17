<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds. Example
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for($i=0; $i<20; $i++) {
        App\User::create([
          'name' => $faker->name,
          'password' => $faker->password,
          'email' => $faker->unique()->postcode,
          
        ]);
      }
    }
}
