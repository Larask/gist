<?php
namespace Gist\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function link()
    {
        return route('user.show', $this->username);
    }
}