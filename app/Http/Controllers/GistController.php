<?php
namespace Gist\Http\Controllers;

use Gist\Http\Requests;
use Gist\Http\Controllers\Controller;
use Gist\Http\Requests\Web\Gist\GistCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gist\Repositories\Gist\GistRepository as Gist;
use Gist\Repositories\User\UserRepository as User;

class GistController extends Controller
{
    /**
     * @var Gist
     */
    private $gist;
    /**
     * @var User
     */
    private $user;

    /**
     * @param Gist $gist
     * @param User $user
     */
    public function __construct(Gist $gist, User $user)
    {
        $this->gist = $gist;
        $this->user = $user;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $gists = $this->gist->with('user')->getPublicGistsWithPaginate();

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
	public function store(GistCreateRequest $request)
	{
        $user = $this->user->getUserFromRequest($request);

        $gist = $this->gist->createWithUserId($request->all(), $user->id);

        return redirect($gist->present()->link);
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
