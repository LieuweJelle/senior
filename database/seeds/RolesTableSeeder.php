<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::create(['name' => 'Senior']);
       Role::create(['name' => 'Vrijwilliger']);
       Role::create(['name' => 'Hulpverlener']);
       Role::create(['name' => 'Admin']);
    }
}
