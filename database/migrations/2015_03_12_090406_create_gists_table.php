<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gists', function(Blueprint $table)
		{
            $table->string('id',36)->index()->unique();
            $table->primary('id');
            $table->string('user_id',36)->nullable()->index();
            $table->string('title');
            $table->binary('content');
            $table->boolean('public');
			$table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gists');
	}

}
