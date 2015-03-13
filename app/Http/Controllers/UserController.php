<?php
namespace Gist\Http\Controllers;

use Gist\Gist;
use Gist\Http\Requests;
use Gist\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gist\User;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users =  User::all();

        $result = $users->map(function($user)
                {
                    $user = $user->toArray();
                    $user['profile_link'] = route('user.show', $user['username']);

                    return $user;
                });

        return $result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user)
	{
        // For paginated list
        $gists = Gist::where('user_id', '=', $user->id)->paginate(20);

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
