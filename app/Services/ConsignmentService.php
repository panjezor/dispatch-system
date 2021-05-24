<?php

namespace App\Services;

use App\Models\Consignment;
use App\Objects\Couriers\CourierInterface;

/**
 * Class ConsignmentService
 *
 * @package App\Services
 */
class ConsignmentService
{
	/**
	 * @var Consignment
	 */
	private Consignment $consignment;
	
	/**
	 * ConsignmentService constructor.
	 *
	 * @param  Consignment  $consignment
	 */
	public function __construct(Consignment $consignment) // sendable model that we relate to. Could interface it further, but thats out of scope.
	{
		$this->consignment = $consignment;
	}
	
	/** Add new order to our current batch.
	 * @param                    $content
	 * @param  CourierInterface  $courier
	 *
	 * @return Consignment|null
	 */
	public function takeOrder($content, CourierInterface $courier): Consignment
	{
		if (blank($courier)) {
			// a default one should be passed over via dependency injection, of course if we have any and we assume that the sender might not have
			// picked the courier. This 'if' here would not be needed in production environment.
		}
		
		return $this->consignment::factory()
								 ->create(
									 [
										 'content' => $content,
										 'courier' => $courier->getName(),
										 // would use ::class, but i dont have 8.0 on this laptop.
										 'number'  => $courier->generateNumber(),
									 ]
								 );
	}
	
	/**
	 * @param  Consignment  $consignment
	 */
	public function send(Consignment $consignment)
	{
		/** @var CourierInterface $courier */
		$courier = new $consignment->courier;
		$courier->send($consignment);
	}
}