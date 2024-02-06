<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $faker->title,
            'description' => $faker->description,
            'start_date' => $faker->start_date,
            'deadline' => $faker->deadline,
            'budget' => $faker->randomFloat(2,1000,10000),
            'status' => $faker->randomElement([0,1,2,3]),
            'image' => $faker->imageUrl(),
        ];


    }


}
