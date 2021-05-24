<?php

namespace App\Services;

use App\Events\BatchFinished;
use App\Events\BatchStarted;
use App\Models\Batch;
use App\Models\Consignment;

/**
 * Class BatchService
 *
 * @package App\Services
 */
class BatchService
{
	/**
	 * @var ConsignmentService
	 */
	public ConsignmentService $consignmentService;
	/**
	 * @var Batch
	 */
	private Batch $batch;
	
	/**
	 * BatchService constructor.
	 *
	 * @param  Batch               $batch
	 * @param  ConsignmentService  $consignmentService
	 */
	public function __construct(Batch $batch, ConsignmentService $consignmentService)
	{
		$this->batch              = $batch;
		$this->consignmentService = $consignmentService;
	}
	
	/**
	 * @return Batch
	 */
	public function startNewBatch(): Batch
	{
		$batch = $this->batch::factory()
							 ->create();
		BatchStarted::dispatch($batch);
		
		return $batch;
	}
	
	/**
	 * @return bool
	 */
	public function finishCurrentBatch(): Batch
	{
		$batch = $this->getCurrentBatch();
		$batch->update(['status' => $this->batch::STATUS_INACTIVE]);
		BatchFinished::dispatch($batch->refresh());
		
		return $batch;
	}
	
	/**
	 * @return mixed
	 */
	public function getCurrentBatch(): Batch
	{
		return $this->batch::query()
						   ->today()
						   ->active()
						   ->first(); // if it throws an exception it means that the current Batch is not initialized.
	}
	
	/** Send all the Consignments of the batch
	 *
	 * @param  Batch  $batch
	 */
	public function dispatchBatch(Batch $batch)
	{
		$consignments = $batch->consignments;
		/** @var Consignment $consignment */
		foreach ($consignments as $consignment) {
			$this->consignmentService->send($consignment);
		}
	}
}