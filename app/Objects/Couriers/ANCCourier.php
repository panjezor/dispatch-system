<?php

namespace App\Objects\Couriers;

use App\Events\ConsignmentSent;
use App\Models\Consignment;

class ANCCourier
	implements CourierInterface
{
	public function generateNumber(): int
	{
		return rand(10000, 99999);
	}
	
	public function send(Consignment $consignment): bool
	{
		if (true) { // if it's success and the sending via anonymous FTP works
			var_dump('ANC');
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