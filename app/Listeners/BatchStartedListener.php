<?php

namespace App\Listeners;

use App\Events\BatchStarted;

/**
 * Class BatchStartedListener
 *
 * @package App\Listeners
 */
class BatchStartedListener
{
	/**
	 * BatchStartedListener constructor.
	 */
	public function __construct()
	{
	}
	
	/**
	 * @param  BatchStarted  $batchStarted
	 */
	public function handle(BatchStarted $batchStarted)
	{
		// in case we want to do something about it
	}
}