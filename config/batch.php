<?php
return [
	/**
	 * Timeframes at which we operate.
	 */
	'start'  => env('BATCH_START', '09:00'), // we dont want these values in .env by default, unless we want to override them.
	'finish' => env('BATCH_FINISH', '21:00'),
];
