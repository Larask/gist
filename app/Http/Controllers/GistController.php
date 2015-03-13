<?php
namespace Gist\Http\Controllers;

use Gist\Http\Requests;
use Gist\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gist\Gist;

class GistController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $gists = Gist::with('user')->wherePublic(true)->paginate(20);

//        $gists = $gists->map( function($gist) {
//
//            $routeData = [
//                'username' => $gist->user->username,
//                'gistId' => substr( $gist->id, 0, 7 )
//            ];
//
//            $gist->link = route('gist.show', $routeData);
//
//            return $gist;
//
//        });

		return view('app.gists.gist-index', compact('gists'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('app.gists.gist-create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		dd(\Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user, $gist)
	{
		return [
            'user' => $user,
            'gist' => $gist,
        ];
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
