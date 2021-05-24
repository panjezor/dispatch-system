<?php

namespace App\Models;

use App\Objects\Couriers\CourierInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Consignment
 *
 * @package App\Models
 */
class Consignment
	extends Model
{
	use HasFactory;
	
	protected $guarded = [];
	/**
	 * @return BelongsTo
	 */
	public function batch(): BelongsTo
	{
		return $this->belongsTo(Batch::class);
	}
	
	/**
	 * @return CourierInterface
	 */
	public function getCourier(): CourierInterface
	{
		return (new $this->courier);
	}
}
