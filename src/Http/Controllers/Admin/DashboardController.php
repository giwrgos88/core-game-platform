<?php

namespace Giwrgos88\Game\Core\Http\Controllers\Admin;

use Giwrgos88\Game\Core\Classes\Factory\ParentFactory;
use Giwrgos88\Game\Core\Http\Controllers\Controller;

class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dashboard = $this->objectFactory->create(ParentFactory::DASHBOARD)
			->get();
		return view('core::backend.pages.dashboard.dashboard', ['dashboard' => $dashboard]);
	}
}
