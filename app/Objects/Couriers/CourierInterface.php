<?php

namespace App\Objects\Couriers;

use App\Models\Consignment;

/**
 * Interface CourierInterface
 *
 * @package App\Objects\Couriers
 */
interface CourierInterface
{
	/** Algorithm that generates a consignment number
	 *
	 * @return int
	 */
	public function generateNumber(): int;
	
	/** Method that performs the sending over
	 *
	 * @param  Consignment  $consignment
	 *
	 * @return bool
	 */
	public function send(Consignment $consignment): bool;
	
	/** Provide reference to the classname
	 *
	 * @return string
	 */
	public function getName(): string;
}