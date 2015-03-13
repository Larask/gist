<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        TestDummy::create('anonymous');
        TestDummy::times(100)->create('Gist\User');
    }
}