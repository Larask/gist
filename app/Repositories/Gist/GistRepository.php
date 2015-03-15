<?php
namespace Gist\Repositories\Gist;

use Gist\Repositories\BaseRepository;

interface GistRepository extends BaseRepository
{
    /**
     * Get all public gists with paginate
     *
     * @param int $paginate
     * @param string $order
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublicGistsWithPaginate($paginate = 20, $order = 'DESC');

    /**
     * Create new gist and associate with given user id
     *
     * @param array $attributes
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function createWithUserId(array $attributes, $userId);

    /**
     * Get all gist create by user with paginate
     *
     * @param int $userId
     * @param int $paginate
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByUserIdWithPaginate($userId, $paginate = 20);

}