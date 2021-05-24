<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BatchTest
	extends TestCase
{
	use RefreshDatabase;
	
	public function testCanStartANewBatch()
	{
		$service = app()->make(\App\Services\BatchService::class);
		$service->startNewBatch();
		$this->assertDatabaseHas('batches',
								 [
									 'date'   => now()->toDateString(),
									 'status' => \App\Models\Batch::STATUS_ACTIVE,
								 ]
		);
	}
	
	public function testCanGetCurrentBatch()
	{
		$service = app()->make(\App\Services\BatchService::class);
		$service->startNewBatch();
		$this->assertDatabaseHas('batches',
								 [
									 'date'   => now()->toDateString(),
									 'status' => \App\Models\Batch::STATUS_ACTIVE,
								 ]
		);
		$this->assertTrue(filled($service->getCurrentBatch()));
	}
	
	public function testCanFinishBatch()
	{
		$service = app()->make(\App\Services\BatchService::class);
		$service->startNewBatch();
		$this->assertDatabaseHas('batches',
								 [
									 'date'   => now()->toDateString(),
									 'status' => \App\Models\Batch::STATUS_ACTIVE,
								 ]
		);
		$this->assertTrue(filled($service->getCurrentBatch()));
		$service->finishCurrentBatch();
		$this->assertDatabaseHas('batches',
								 [
									 'date'   => now()->toDateString(),
									 'status' => \App\Models\Batch::STATUS_INACTIVE,
								 ]
		);
	}
}