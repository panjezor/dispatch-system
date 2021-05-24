<?php

namespace App\Console\Commands;

use App\Services\BatchService;

class StartBatch
	extends \Illuminate\Console\Command
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
	protected $signature = 'batch:start';
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Start a batch';
	
	/**
	 * Create a new command instance.
	 *
	 * @return void
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
		$this->batchService->startNewBatch();
	}
}