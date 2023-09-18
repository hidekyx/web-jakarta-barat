<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('aname')->nullable();
			$table->string('password')->nullable();
			$table->string('nama')->nullable();
			$table->string('email')->unique();
			$table->string('telp')->nullable();
			$table->string('avatar')->nullable();
			$table->rememberToken();
			$table->timestamp('lastlog')->nullable();
			$table->string('ipog')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
