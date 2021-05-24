<?php

namespace App\Listeners;

use App\Events\ConsignmentSent;

/**
 * Class ConsignmentSentListener
 *
 * @package App\Listeners
 */
class ConsignmentSentListener
{
	/**
	 * ConsignmentSentListener constructor.
	 */
	public function __construct()
	{
	}
	
	/**
	 * @param  ConsignmentSent  $consignmentSent
	 */
	public function handle(ConsignmentSent $consignmentSent)
	{
		// in case we want to do something about it
	}
}