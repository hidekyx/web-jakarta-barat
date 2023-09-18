<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;
use Spatie\Permission\Traits\HasRoles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
	        'aname'	=> 'Super Admin',
	        'email'	=> 'superadmin@admin.com',
	        'password'	=> Hash::make('admin'),
	        // 'email_verified_at' => \Carbon\Carbon::now()
		]);
		$user->assignRole('Super Admin');
    }
}
