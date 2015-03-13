<?php
namespace Gist;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Gist\Presenters\UserPresenter;
use Laracasts\Presenter\PresentableTrait;

class User extends UuidModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $presenter = UserPresenter::class;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gists()
    {
        return $this->hasMany('Gist\Gist');
    }
}
