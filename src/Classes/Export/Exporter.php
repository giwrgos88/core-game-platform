<?php

namespace Giwrgos88\Game\Core\Classes\Export;

abstract class Exporter {

	protected static function getFiedls($participants) {
		foreach ($participants as $par_key => $par_value) {
			foreach ($par_value as $key => $value) {
				switch ($key) {
				case 'participant_fullname':
					$participants[$par_key]['Name'] = $value;
					unset($participants[$par_key]['participant_fullname']);
					break;
				case 'participant_email':
					$participants[$par_key]['Email'] = $value;
					unset($participants[$par_key]['participant_email']);
					break;
				case 'participant_phone':
					$participants[$par_key]['Phone'] = $value;
					unset($participants[$par_key]['participant_phone']);
					break;
				}
			}

		}
		return $participants;
	}
}