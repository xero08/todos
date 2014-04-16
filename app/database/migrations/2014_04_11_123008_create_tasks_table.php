<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks',function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title',32);
			$table->string('description',512);
			$table->timestamp('deadline');
			$table->string('priority',6);
			$table->integer('complete',1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
