<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	['name' => 'role-list', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Role'],
        	['name' => 'role-create', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Role'],
			['name' => 'role-edit', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Role'],
			['name' => 'role-delete', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Role'],
			['name' => 'user-list', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Users'],
			['name' => 'user-create', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Users'],
			['name' => 'user-edit', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Users'],
			['name' => 'user-delete', 'guard_name'=> 'web', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now(), 'group'=>'Users']]
		);
    }
}
