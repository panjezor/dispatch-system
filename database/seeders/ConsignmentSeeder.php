<?php

namespace Database\Seeders;

use App\Models\Consignment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ConsignmentSeeder
	extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @param  null  $batchId
	 *
	 * @return Collection|Consignment[]
	 */
	public function run($batchId = null): Collection
	{
		return Consignment::factory()
						  ->count(5)
						  ->create(['batch_id' => $batchId]);
	}
}
