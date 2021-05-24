<?php

namespace App\Objects\Couriers;

use App\Events\ConsignmentSent;
use App\Models\Consignment;

class RoyalMailCourier
	implements CourierInterface
{
	public function generateNumber(): int
	{
		return rand(100000, 999999);
	}
	
	public function send(Consignment $consignment): bool
	{
		if (true) { // if it's success and the sending via email works
			var_dump('Royal Mail');
			ConsignmentSent::dispatch($consignment);
			return true;
		}
		
		return false;
	}
	
	public function getName(): string
	{
		return self::class;
	}
}