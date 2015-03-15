<?php
namespace Gist\Repositories\User;

use Gist\Repositories\EloquentBaseRepository;
use Gist\User;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Find anonymous user
     *
     * @return \Gist\User
     */
    public function getAnonymousUser()
    {
        $user = $this->model->whereUsername('anonymous')->first();

        if (is_null($user)) {
            throw new \Exception('No anonymous user');
        }

        return $user;
    }

    /**
     * Get user from request or return anonymous user
     *
     * @param $request \Illuminate\Http\Request
     * @return \Gist\User
     */
    public function getUserFromRequest($request)
    {
        if ($user = $request->user()) {
            return $user;
        }

        return $this->getAnonymousUser();
    }
}