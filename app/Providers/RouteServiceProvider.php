<?php
namespace Gist\Providers;

use Gist\Gist;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Gist\User;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Gist\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $this->bindUsername($router);

        $router->bind('gistId', function($gistId)
        {
            // TODO: Weird stuff. Can't pass it via route pattern
            if ( ! preg_match('/^[a-z0-9]{7,7}$/', $gistId) )
                abort(404);

            $gist = Gist::where('id','like', $gistId . '%')->first();

            if ( is_null($gist) )
                abort(404);

            return $gist;
        });
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

    /**
     * @param Router $router
     */
    private function bindUsername(Router $router)
    {
        $router->bind('username', function ($username) {
            $user = User::where('username', '=', $username)->first();

            if (is_null($user)) {
                abort(404);
            }

            return $user;
        });
    }

}
