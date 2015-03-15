<?php
namespace Gist\Repositories\Gist;

use Gist\Repositories\BaseRepository;

interface GistRepository extends BaseRepository
{
    /**
     * Get all public gists with paginate
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublicGistsWithPaginate($paginate = 20, $order = 'DESC');

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createWithUserId(array $attributes, $userId);

}