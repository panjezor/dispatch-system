<?php

use App\Models\Batch;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsignmentsTable
	extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(
			'consignments',
			function (Blueprint $table)
			{
				$table->id();
				$table->longText('content');
				$table->string('courier');
				$table->integer('number'); // would need to be big int depending on possible formats, I assume that integer is fine.
				$table->foreignIdFor(Batch::class)
					  ->constrained()
					  ->cascadeOnUpdate()
					  ->nullOnDelete();
				$table->timestamps();
				$table->timestamp('sent_at');
			}
		);
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('consignments');
	}
}
