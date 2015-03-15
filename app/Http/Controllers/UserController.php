<?php
namespace Gist\Http\Controllers;

use Gist\Http\Requests;
use Gist\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gist\Repositories\Gist\GistRepository as Gist;
use Gist\Repositories\User\UserRepository as User;

class UserController extends Controller
{
    /**
     * @var UserController
     */
    private $user;
    /**
     * @var Gist
     */
    private $gist;

    /**
     * @param UserController $user
     * @param Gist $gist
     */
    public function __construct(User $user, Gist $gist)
    {
        $this->user = $user;
        $this->gist = $gist;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users =  $this->user->all();

        return $users;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \Gist\User $user
	 * @return Response
	 */
	public function show($user)
	{
        $gists = $this->gist->getByUserIdWithPaginate($user->id);

        return view('app.users.user-show', compact('user','gists'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}
}
