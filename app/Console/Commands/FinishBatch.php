<?php

namespace App\Console\Commands;

use App\Services\BatchService;
use Illuminate\Console\Command;

class FinishBatch
	extends Command
{
	/**
	 * @var BatchService
	 */
	public BatchService $batchService;
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'batch:finish';
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Finish a batch';
	
	/**
	 * Create a new command instance.
	 *
	 * @param  BatchService  $batchService
	 */
	public function __construct(BatchService $batchService)
	{
		parent::__construct();
		$this->batchService = $batchService;
	}
	
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->batchService->finishCurrentBatch();
	}
}