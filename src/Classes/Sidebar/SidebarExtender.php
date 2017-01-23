<?php
namespace Giwrgos88\Game\Core\Classes\Sidebar;

use Auth;
use Illuminate\Contracts\Auth\Guard;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender {
	/**
	 * @var Authentication
	 */
	protected $auth;
	/**
	 * @param Authentication $auth
	 *
	 * @internal param Guard $guard
	 */
	public function __construct(Guard $auth) {
	}
	/**
	 * @param Menu $menu
	 *
	 * @return Menu
	 */
	public function extendWith(Menu $menu) {
		$menu->group('', function (Group $group) {
			$group->item(trans('core::core.sidebar.dashboard'), function (Item $item) {
				$item->icon('icon-speedometer');
				$item->weight(1);
				$item->route('Core::admin.dashboard');
			});

			$group->item(trans('core::core.sidebar.participants'), function (Item $item) {
				$item->icon('icon-people');
				$item->weight(10);
				$item->route('Core::admin.participants');

			});
			$group->item(trans('core::core.sidebar.participants'), function (Item $item) {
				$item->icon('icon-people');
				$item->weight(20);
				$item->route('Core::admin.participants');
			});

			$group->item(trans('core::core.sidebar.users'), function (Item $item) {
				$item->icon('icon-user');
				$item->weight(30);
				$item->item(trans('core::core.sidebar.users'), function (Item $item) {
					$item->icon('icon-user');
					$item->weight(0);
					$item->route('Core::admin.users');
				});

				$item->item(trans('core::core.sidebar.new_user'), function (Item $item) {
					$item->icon('icon-user');
					$item->weight(1);
					$item->route('Core::admin.users.new');
				});
				$item->item(trans('core::core.sidebar.roles'), function (Item $item) {
					$item->icon('icon-user');
					$item->weight(2);
					$item->route('Core::admin.users.roles');
				});
			});

			$group->item(trans('core::core.sidebar.export'), function (Item $item) {
				$item->icon('icon-docs');
				$item->weight(40);
				$item->route('Core::admin.export');
			});
		});
		return $menu;
	}
}