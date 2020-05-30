<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [['role_name' => 'Manager'], ['role_name' => "Driver"]];

        DB::table('roles')->insert($roles);
    }
}
