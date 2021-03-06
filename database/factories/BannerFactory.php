<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['引导页', 'Banner']),
            'image_url' => $this->faker->imageUrl(),
            'priority' => $this->faker->numberBetween(0, 9999)
        ];
    }
}
