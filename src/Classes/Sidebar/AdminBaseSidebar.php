<?php

namespace Giwrgos88\Game\Core\Classes\Sidebar;

use Giwrgos88\Game\Core\Classes\Sidebar\SidebarExtender;
use Illuminate\Contracts\Container\Container;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\ShouldCache;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Traits\CacheableTrait;

class AdminBaseSidebar implements Sidebar, ShouldCache {

	use CacheableTrait;
	/**
	 * @var Menu
	 */
	protected $menu;

	/**
	 * @var Container
	 */
	protected $container;

	/**
	 * @param Menu $menu
	 */
	public function __construct(Menu $menu, Container $container) {
		$this->menu = $menu;
		$this->container = $container;
	}

	/**
	 * Build your sidebar implementation here
	 */
	public function build() {
		$extender = $this->container->make(SidebarExtender::class);

		$this->menu->add(
			$extender->extendWith($this->menu)
		);
	}

	/**
	 * @return Menu
	 */
	public function getMenu() {
		return $this->menu;
	}
}