<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data', function (Blueprint $table) {
			$table->integer('id',true);
			$table->string('name');
			$table->string('dni');
			$table->timestamps();
		});

		DB::table('data')->insert([
			'name' => 'name1',
			'dni' => '11'
		]);

		DB::table('data')->insert([
			'name' => 'name2',
			'dni' => '22'
		]);

		DB::table('data')->insert([
			'name' => 'name3',
			'dni' => '33'
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('data');
	}
};
