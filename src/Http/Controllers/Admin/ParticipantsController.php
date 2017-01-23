<?php

namespace Giwrgos88\Game\Core\Http\Controllers\Admin;

use Giwrgos88\Game\Core\Classes\Factory\ParentFactory;
use Giwrgos88\Game\Core\Http\Controllers\Controller;
use Giwrgos88\Game\Core\Models\Admin\Participants;

class ParticipantsController extends Controller {

	protected $participants;

	public function __construct(Participants $participants) {
		parent::__construct();
		$this->participants = $participants;
	}

	public function index() {
		/*
			Add search features
		*/
		$participants = $this->participants->orderBy('id', 'ASC')->paginate(20);

		return view('core::backend.pages.participants.participants', ['participants' => $participants]);
	}

	public function show($id) {
		$participant = $this->objectFactory->create(ParentFactory::PARTICIPANTVIEW)
			->setData(['id' => $id])
			->get();

		if (is_null($participant)) {
			abort('404', 'Page not found.');
		}
		return view('core::backend.pages.participants.view', ['participant' => $participant]);
	}
}
