<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Consignment;
use App\Objects\Couriers\CourierInterface;
use App\Objects\Couriers\ANCCourier;
use App\Objects\Couriers\RoyalMailCourier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    	/** @var CourierInterface $courier */
    	$courier = $this->faker->randomElement([new ANCCourier(), new RoyalMailCourier()]);
    	
        return [
            'content'=>$this->faker->sentences(5, true),
			'courier'=>$courier->getName(),
			'number'=>$courier->generateNumber(),
			'batch_id'=>Batch::factory()
        ];
    }
}
