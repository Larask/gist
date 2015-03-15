<?php
namespace Gist\Repositories;

interface BaseRepository
{
    public function all();

    public function create(array $attributes = array());

    public function update(array $attributes = array());

    /**
     * @return bool|null
     */
    public function delete();

    /**
     * Eager loading relations
     *
     * @param $relations
     * @return $this
     */
    public function with($relations);
}