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

    /**
     * Get user from request or return anonymous user
     *
     * @param $request \Illuminate\Http\Request
     * @return \Gist\User
     */
    public function getUserFromRequest($request);
}