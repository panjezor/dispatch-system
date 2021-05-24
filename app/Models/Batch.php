<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Batch
 *
 * @package App\Models
 */
class Batch
	extends Model
{
	use HasFactory;
	
	/**
	 *
	 */
	const STATUS_ACTIVE   = 1;
	const STATUS_INACTIVE = 0;
	
	protected $guarded = [];
	/**
	 * @var string[]
	 */
	protected $casts = ['status' => 'boolean'];
	
	/**
	 * @param  string   $date
	 * @param  Builder  $builder
	 *
	 * @return Builder
	 */
	public function scopeForDate(Builder $builder, string $date): Builder
	{
		return $builder->whereDate('date', $date);
	}
	
	/**
	 * @param  Builder  $builder
	 *
	 * @return Builder
	 */
	public function scopeToday(Builder $builder): Builder
	{
		return $builder->forDate(now()->toDateString());
	}
	
	/**
	 * @param  Builder  $builder
	 *
	 * @return Builder
	 */
	public function scopeActive(Builder $builder): Builder
	{
		return $builder->where('status', self::STATUS_ACTIVE);
	}
	
	/**
	 * @param  Builder  $builder
	 *
	 * @return Builder
	 */
	public function scopeInactive(Builder $builder): Builder
	{
		return $builder->where('status', self::STATUS_INACTIVE);
	}
	
	/**
	 * @return HasMany
	 */
	public function consignments(): HasMany
	{
		return $this->hasMany(Consignment::class);
	}
}
