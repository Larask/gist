<?php namespace Gist\Http\Controllers;

use Gist\Http\Requests;
use Gist\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller {

	/**
	 * Show snippet editor
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

    public function save(Request $request)
    {
        dd($request->all());
    }

}
