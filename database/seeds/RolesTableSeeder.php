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
       Role::create(['name' => 'Huishoudelijke hulp']);
       Role::create(['name' => 'Thuisbezoeker']);
       Role::create(['name' => 'Boodschapper']);
       Role::create(['name' => 'Klusser']);
       Role::create(['name' => 'Hulpverlener']);
       Role::create(['name' => 'Administrator']);
    }
}
