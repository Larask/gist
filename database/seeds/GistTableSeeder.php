<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;

class GistTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::times(100)->create('Gist\Gist');
    }

}