<?php

namespace App\Listeners;

use App\Events\BatchFinished;
use App\Services\BatchService;

/**
 * Class BatchFinishedListener
 *
 * @package App\Listeners
 */
class BatchFinishedListener
{
	/**
	 * @var BatchService
	 */
	public BatchService $batchService;
	
	/**
	 * BatchFinishedListener constructor.
	 *
	 * @param  BatchService  $batchService
	 */
	public function __construct(BatchService $batchService)
	{
		$this->batchService = $batchService;
	}
	
	/**
	 * @param  BatchFinished  $batchFinished
	 */
	public function handle(BatchFinished $batchFinished)
	{
		$this->batchService->dispatchBatch($batchFinished->batch);
	}
}