<?php
namespace Gist\Http\Controllers;

use Gist\Http\Requests;
use Gist\Http\Controllers\Controller;
use Gist\Http\Requests\Web\Gist\GistCreateRequest;
use Gist\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gist\Gist;

class GistController extends Controller
{
    /**
     * @var Gist
     */
    private $gist;

    /**
     * @param Gist $gist
     */
    public function __construct(Gist $gist)
    {
        $this->gist = $gist;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $gists = Gist::with('user')
                    ->wherePublic(true)
                    ->latest()
                    ->paginate(20);

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
        // TODO: Hacker love this
        $gist = $this->gist->fill($request->all());
        $gist->public = (boolean) $request->public;
        $user = $request->user();

        if ( ! $user )
        {
            #TODO: Refactor this to repository
            $user = User::whereUsername('anonymous')->first();
        }
        $gist->user()->associate($user);
        if ($gist->save())
        {
            return redirect($gist->present()->link);
        }
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
