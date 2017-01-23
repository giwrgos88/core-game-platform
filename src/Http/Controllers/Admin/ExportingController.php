<?php

namespace Giwrgos88\Game\Core\Http\Controllers\Admin;

use Giwrgos88\Game\Core\Classes\Factory\ParentFactory;
use Giwrgos88\Game\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportingController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$export = $this->objectFactory->create(ParentFactory::EXPORT)
			->get();
		return view('core::backend.pages.export.export', ['export' => $export]);
	}

	public function export(Request $request) {
		$file = $this->objectFactory->create(ParentFactory::EXPORTFILE)
			->setData($request->all())
			->get();
		if (is_null($file)) {
			return redirect()->back()->withErrors(['msg', 'The Message']);
		}
		dd($request->all());
	}
}
