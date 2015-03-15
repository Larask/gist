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
} 