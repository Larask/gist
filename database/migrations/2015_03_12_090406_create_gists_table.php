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
			$table->increments('id')->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->string('title');
            $table->longText('content');
            $table->tinyInteger('type');
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
