<?php
namespace Gist\Repositories\Gist;

use Debugbar;
use Gist\Gist;
use Gist\Repositories\EloquentBaseRepository;

class EloquentGistRepository extends EloquentBaseRepository implements GistRepository
{
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

    /**
     * Get all public gists with paginate
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublicGistsWithPaginate($paginate = 20, $order = 'DESC')
    {
        return $this->model->wherePublic(true)->orderBy('created_at', $order)->paginate($paginate);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createWithUserId(array $attributes, $userId)
    {
        if (is_null($userId))
        {
            throw new \BadMethodCallException('UserId can not be null');
        }
        $gist = $this->model;

        $gist->content = $attributes['content'];
        $gist->title = ($attributes['title']) ?: 'Untitled';
        $gist->public = (boolean) $attributes['public'];
        $gist->user_id = $userId;
        $gist->save();

        return $gist;
    }

    /**
     * Get all gist create by user with paginate
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByUserIdWithPaginate($userId, $paginate = 20)
    {
        return $this->model->whereUserId($userId)->paginate($paginate);
    }
}