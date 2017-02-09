<?php

namespace Giwrgos88\Game\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 *
 * @package Giwrgos88\Game\Core\Providers;
 */

class RouteServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * The middleware classes that are use
	 *  on the project.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
		'can' => \Illuminate\Auth\Middleware\Authorize::class,
		'guest' => \Giwrgos88\Game\Core\Http\Middleware\RedirectIfAuthenticated::class,
		'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
		'no_auth' => \Giwrgos88\Game\Core\Http\Middleware\Authentication::class,
		'permission' => \Giwrgos88\Game\Core\Http\Middleware\VerifyPermission::class,
		'force_ssl' => \Giwrgos88\Game\Core\Http\Middleware\ForceSSLMiddleware::class,
	];

	/**
	 * The application's route middleware groups.
	 *
	 * @var array
	 */
	protected $middlewareGroups = [
		'core_user' => [
			\Giwrgos88\Game\Core\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\Giwrgos88\Game\Core\Http\Middleware\VerifyCsrfToken::class,
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
		],
	];

	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Giwrgos88\Game\Core\Http\Controllers';

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();

		/**
		 * Include Package middlewares
		 */
		$this->registerMiddlewares($this->app['router']);
		$this->applyMiddleware($this->app['router']);

		$kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
		$kernel->pushMiddleware('Maatwebsite\Sidebar\Middleware\ResolveSidebars');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
	}

	/**
	 * Register middlewares on routes.
	 *
	 * @param  $router
	 * @return void
	 */
	public function registerMiddlewares($router) {
		foreach ($this->routeMiddleware as $middleware => $class) {
			$router->middleware($middleware, $class);
		}
	}

	/**
	 * Define the routes for the application.
	 *
	 */
	public function map() {
		$this->mapApiRoutes();
		$this->mapWebRoutes();
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes() {
		$middleware = ['core_user', 'installer'];
		if (config('core_game.SSL_ENABLED')) {
			$middleware[] = 'force_ssl';
		}
		Route::group([
			'middleware' => $middleware,
			'namespace' => $this->namespace,
		], function ($router) {
			require dirname(__DIR__, 2) . '/routes/web.php';
		});
	}

	/**
	 * Define the "api" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapApiRoutes() {
		$middleware = ['api'];
		if (config('core_game.SSL_ENABLED')) {
			$middleware[] = 'force_ssl';
		}
		Route::group([
			'middleware' => $middleware,
			'namespace' => $this->namespace,
			'prefix' => 'api',
		], function ($router) {
			require dirname(__DIR__, 2) . '/routes/api.php';
		});
	}

	private function applyMiddleware($route) {
		//$kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
		foreach ($this->middlewareGroups as $group => $middlewares) {
			$route->middlewareGroup($group, $middlewares);
			/*
				foreach ($middlewares as $key => $middleware) {

					$kernel->pushMiddleware($middleware);
			*/
		}
	}
}
