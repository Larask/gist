<?php
namespace Gist\Repositories;

interface BaseRepository
{
    public function all();

    public function create();

    public function update();

    public function delete();
}