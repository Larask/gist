<?php
namespace Gist\Repositories\User;

use Gist\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
    /**
     * Find anonymous user
     *
     * @return \Gist\User
     */
    public function getAnonymousUser();
}