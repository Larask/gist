<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::statement('TRUNCATE TABLE users');
        DB::statement('TRUNCATE TABLE gists');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Model::unguard();

		$this->call(UserTableSeeder::class);
		$this->call(GistTableSeeder::class);
	}

}
