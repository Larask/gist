<?php
namespace Gist\Presenters;

use Laracasts\Presenter\Presenter;

class GistPresenter extends Presenter
{
    public function link()
    {
        $routeData = [
            'username' => $this->user->username,
            'gistId' => substr( $this->id, 0, 7 )
        ];
        return route('gist.show', $routeData);
    }

    public function accountAge()
    {
        return $this->created_at->diffForHumans();
    }
}