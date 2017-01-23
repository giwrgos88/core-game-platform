<?php

namespace Giwrgos88\Game\Core\Classes\Export;

use Carbon\Carbon;
use Excel;
use Giwrgos88\Game\Core\Classes\Export\Exporter;

class CSVExporter extends Exporter {

	public static function generate($participants) {
		$participants = self::getFiedls($participants);

		return Excel::create(config('core.application-name') . '_participants_generated_on_' . Carbon::today()->format('d-m-Y'), function ($excel) use ($participants) {
			$excel->setTitle(config('core.application-name') . ' Participants List');
			$excel->setDescription('An excel file that contains the participants of the ' . config('core.application-name'));
			$excel->sheet('Participants List', function ($sheet) use ($participants) {
				$sheet->fromArray($participants);
			});
		})->download('csv');
	}
}