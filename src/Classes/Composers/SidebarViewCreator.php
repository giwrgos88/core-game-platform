<?php
namespace Giwrgos88\Game\Core\Classes\Composers;

use Giwrgos88\Game\Core\Classes\Sidebar\AdminBaseSidebar;
use Maatwebsite\Sidebar\Presentation\SidebarRenderer;

class SidebarViewCreator {
	/**
	 * @var AdminBaseSidebar
	 */
	protected $sidebar;
	/**
	 * @var SidebarRenderer
	 */
	protected $renderer;
	/**
	 * @param AdminBaseSidebar    $sidebar
	 * @param SidebarRenderer $renderer
	 */
	public function __construct(AdminBaseSidebar $sidebar, SidebarRenderer $renderer) {
		$this->sidebar = $sidebar;
		$this->renderer = $renderer;
	}
	public function create($view) {
		$view->prefix = config('core_game.admin-prefix');
		$view->sidebar = $this->renderer->render($this->sidebar);
	}
}