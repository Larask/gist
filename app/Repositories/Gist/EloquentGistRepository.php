<?php
namespace Gist\Repositories\Gist;

use Gist\Gist;
use Gist\Repositories\EloquentBaseRepository;

class EloquentGistRepository extends EloquentBaseRepository implements GistRepository{
    /**
     * @var Gist
     */
    protected $model;

    /**
     * @param Gist $model
     */
    public function __construct(Gist $model)
    {
        $this->model = $model;
    }
}