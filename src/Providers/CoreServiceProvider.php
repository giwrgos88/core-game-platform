<?php

namespace Giwrgos88\Game\Core\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use URL;

/**
 * Class CoreServiceProvider
 *
 * @package Giwrgos88\Game\Core\Providers;
 */

class CoreServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * The provider classes that are use on the project.
	 *
	 * @var array
	 */
	protected $providers = [
		\Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
		\Collective\Html\HtmlServiceProvider::class,
		\Ultraware\Roles\RolesServiceProvider::class,
		\Maatwebsite\Sidebar\SidebarServiceProvider::class,
		\Jenssegers\Agent\AgentServiceProvider::class,
		\Laracasts\Utilities\JavaScript\JavaScriptServiceProvider::class,
		\Giwrgos88\Game\Core\Providers\AssetsServiceProvider::class,
		\Giwrgos88\Game\Core\Providers\RouteServiceProvider::class,
		\Giwrgos88\Game\Core\Providers\SidebarServiceProvider::class,
		\Maatwebsite\Excel\ExcelServiceProvider::class,
		\Giwrgos88\Installer\Providers\InstallerServiceProvider::class,
		\Giwrgos88\Game\Front\Providers\AssetsServiceProvider::class,
	];

	/**
	 * The faced array that are use on the project.
	 *
	 * @var array
	 */
	protected $facadeAliases = [
		'Form' => \Collective\Html\FormFacade::class,
		'Html' => \Collective\Html\HtmlFacade::class,
		'Input' => \Illuminate\Support\Facades\Input::class,
		'Agent' => \Jenssegers\Agent\Facades\Agent::class,
		'Template' => \Giwrgos88\Game\Core\Classes\Facades\Template::class,
		'Excel' => \Maatwebsite\Excel\Facades\Excel::class,
	];

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		if (config('core_game.SSL_ENABLED')) {
			URL::forceSchema('https');
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		/**
		 * Bind Package providers to Laravel's IOC container
		 */
		$this->registerProviders();

		$this->registerAlias();

		App::bind('Template', function () {
			return new \Giwrgos88\Game\Core\Classes\Blade\Template;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return [];
	}

	/**
	 * Bind Package Providers to Laravel's IOC container.
	 */
	private function registerProviders() {
		foreach ($this->providers as $key => $provider) {
			$this->app->register($provider);
		}
	}

	/**
	 * Define the routes for the application.
	 *
	 */
	public function map() {
	}

	/**
	 * Register Allias
	 */
	public function registerAlias() {

		foreach ($this->facadeAliases as $alias => $facade) {
			$this->app->alias($alias, $facade);
		}
	}
}
