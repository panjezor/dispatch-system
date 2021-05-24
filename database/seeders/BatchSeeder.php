<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return Batch
     */
    public function run(): Batch
	{
        return Batch::factory()->create();
    }
}
