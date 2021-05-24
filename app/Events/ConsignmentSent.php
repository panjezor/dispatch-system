<?php

namespace App\Events;

use App\Models\Consignment;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConsignmentSent
{
	use Dispatchable, SerializesModels;
	
	public function __construct(Consignment $consignment)
	{
		$this->consignment = $consignment;
	}
}