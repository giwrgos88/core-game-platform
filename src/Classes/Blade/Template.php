<?php
namespace Giwrgos88\Game\Core\Classes\Blade;

class Template {

	public static function participant_image(array $participantMetaList = [], $size = 'large') {

		$key = config('core_game.participant_meta_key');

		if (!is_null($key)) {
			if (array_key_exists($key, $participantMetaList)) {
				return 'https://graph.facebook.com/' . $participantMetaList[$key] . '/picture?type=' . $size;
			}
		}
		return '/backend/img/default_avatar.jpg';
	}

	public static function formatDate($date, $format = 'M d, Y') {
		return date($format, strtotime($date));
	}

	public static function status($status) {

		switch (ucfirst($status)) {
		case trans('core::core.status.active'):
			return '<span class="tag tag-success">' . trans('core::core.status.active') . '</span>';
		case trans('core::core.status.pending'):
			return '<span class="tag tag-warning">' . trans('core::core.status.pending') . '</span>';
		case trans('core::core.status.banned'):
			return '<span class="tag tag-danger">' . trans('core::core.status.banned') . '</span>';
		case trans('core::core.status.inactive'):
			return '<span class="tag tag-default">' . trans('core::core.status.inactive') . '</span>';
		default:
			return '';
		}
	}
}