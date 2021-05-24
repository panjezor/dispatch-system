<?php

namespace App\Events;

use App\Models\Batch;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BatchFinished
{
	use Dispatchable, SerializesModels;
	
	/**
	 * @var Batch
	 */
	public Batch $batch;
	
	public function __construct(Batch $batch)
	{
		$this->batch = $batch;
	}
}