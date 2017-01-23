<?php

namespace Giwrgos88\Game\Core\Providers;

use Giwrgos88\Game\Core\Classes\Sidebar\AdminBaseSidebar;
use Giwrgos88\Game\Core\Classes\Sidebar\SidebarCreator;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Sidebar\SidebarManager;
use View;

/**
 * Class CoreServiceProvider
 *
 * @package Giwrgos88\Game\Core\Providers;
 */

class SidebarServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot(SidebarManager $manager) {
		if ($this->onBackend() === true) {
			$manager->register(AdminBaseSidebar::class);
		}
		View::creator(
			'core::backend.partials.sidebar',
			SidebarCreator::class
		);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
	}

	private function onBackend() {
		$url = request()->url();
		if (str_contains($url, config('core_game.admin-prefix'))) {
			return true;
		}
		return false;
	}
}
